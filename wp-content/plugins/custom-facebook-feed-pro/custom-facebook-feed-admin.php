<?php 
function cff_menu() {
    add_menu_page('Settings', 'Custom Facebook Feed', 'manage_options', 'cff-top', 'cff_settings_page');
}
add_action('admin_menu', 'cff_menu');

//Add license page
function cff_license_menu() {
    add_submenu_page('cff-top', 'License', 'License', 'manage_options', 'cff-license', 'cff_license_page');
}
add_action('admin_menu', 'cff_license_menu');

//Create License Page
function cff_license_page() {
    $license = get_option( 'cff_license_key' );
    $status  = get_option( 'cff_license_status' );
    ?>

    <div class="wrap">
        
        <h2><?php _e('Plugin License Options'); ?></h2>
        <form method="post" action="options.php">
            
            <?php settings_fields('cff_license'); ?>
            
            <table class="form-table">
                <tbody>
                    <tr valign="top">   
                        <th scope="row" valign="top">
                            <?php _e('License Key'); ?>
                        </th>
                        <td>
                            <input id="cff_license_key" name="cff_license_key" type="text" class="regular-text" value="<?php esc_attr_e( $license ); ?>" />

                            <?php if( false !== $license ) { ?>
                                <?php if( $status !== false && $status == 'valid' ) { ?>
                                    <?php wp_nonce_field( 'cff_nonce', 'cff_nonce' ); ?>
                                    <input type="submit" class="button-secondary" name="cff_license_deactivate" value="<?php _e('Deactivate License'); ?>"/>
                                    <span style="color:green;"><?php _e('Active'); ?></span>
                                <?php } else {
                                    wp_nonce_field( 'cff_nonce', 'cff_nonce' ); ?>
                                    <input type="submit" class="button-secondary" name="cff_license_activate" value="<?php _e('Activate License'); ?>"/>
                                    <span style="color:red;"><?php _e('Inactive'); ?></span>
                                <?php } ?>
                            <?php } ?>
                            <br />
                            <i style="color: #666; font-size: 11px;">The license key you received when you purchased the plugin.</i> <a href="http://smashballoon.com/custom-facebook-feed/support" target="_blank">Renew my license</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php submit_button(); ?>
        
        </form>
    <?php
}

function cff_register_option() {
    // creates our settings in the options table
    register_setting('cff_license', 'cff_license_key', 'cff_sanitize_license' );
}
add_action('admin_init', 'cff_register_option');

function cff_sanitize_license( $new ) {
    $old = get_option( 'cff_license_key' );
    if( $old && $old != $new ) {
        delete_option( 'cff_license_status' ); // new license has been entered, so must reactivate
    }
    return $new;
}

function cff_activate_license() {

    // listen for our activate button to be clicked
    if( isset( $_POST['cff_license_activate'] ) ) {

        // run a quick security check 
        if( ! check_admin_referer( 'cff_nonce', 'cff_nonce' ) )   
            return; // get out if we didn't click the Activate button

        // retrieve the license from the database
        $license = trim( get_option( 'cff_license_key' ) );
            

        // data to send in our API request
        $api_params = array( 
            'edd_action'=> 'activate_license', 
            'license'   => $license, 
            'item_name' => urlencode( WPW_SL_ITEM_NAME ) // the name of our product in EDD
        );
        
        // Call the custom API.
        $response = wp_remote_get( add_query_arg( $api_params, WPW_SL_STORE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

        // make sure the response came back okay
        if ( is_wp_error( $response ) )
            return false;

        // decode the license data
        $license_data = json_decode( wp_remote_retrieve_body( $response ) );
        
        // $license_data->license will be either "active" or "inactive"

        update_option( 'cff_license_status', $license_data->license );
    }
}
add_action('admin_init', 'cff_activate_license');

function cff_deactivate_license() {

    // listen for our activate button to be clicked
    if( isset( $_POST['cff_license_deactivate'] ) ) {

        // run a quick security check 
        if( ! check_admin_referer( 'cff_nonce', 'cff_nonce' ) )   
            return; // get out if we didn't click the Activate button

        // retrieve the license from the database
        $license = trim( get_option( 'cff_license_key' ) );
            

        // data to send in our API request
        $api_params = array( 
            'edd_action'=> 'deactivate_license', 
            'license'   => $license, 
            'item_name' => urlencode( WPW_SL_ITEM_NAME ) // the name of our product in EDD
        );
        
        // Call the custom API.
        $response = wp_remote_get( add_query_arg( $api_params, WPW_SL_STORE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

        // make sure the response came back okay
        if ( is_wp_error( $response ) )
            return false;

        // decode the license data
        $license_data = json_decode( wp_remote_retrieve_body( $response ) );
        
        // $license_data->license will be either "deactivated" or "failed"
        if( $license_data->license == 'deactivated' )
            delete_option( 'cff_license_status' );
    }
}
add_action('admin_init', 'cff_deactivate_license'); 

//Create Settings page
function cff_settings_page() {

    //Declare variables for fields
    $hidden_field_name  = 'cff_submit_hidden';
    $access_token       = 'cff_access_token';
    $page_id            = 'cff_page_id';
    $num_show           = 'cff_num_show';
    $cff_title_length   = 'cff_title_length';
    $cff_body_length    = 'cff_body_length';

    // Read in existing option value from database
    $access_token_val = get_option( $access_token );
    $page_id_val = get_option( $page_id );
    $num_show_val = get_option( $num_show );
    $cff_title_length_val = get_option( $cff_title_length );
    $cff_body_length_val = get_option( $cff_body_length );

    // See if the user has posted us some information. If they did, this hidden field will be set to 'Y'.
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $access_token_val = $_POST[ $access_token ];
        $page_id_val = $_POST[ $page_id ];
        $num_show_val = $_POST[ $num_show ];
        $cff_title_length_val = $_POST[ $cff_title_length ];
        $cff_body_length_val = $_POST[ $cff_body_length ];

        // Save the posted value in the database
        update_option( $access_token, $access_token_val );
        update_option( $page_id, $page_id_val );
        update_option( $num_show, $num_show_val );
        update_option( $cff_title_length, $cff_title_length_val );
        update_option( $cff_body_length, $cff_body_length_val );

        // Put an settings updated message on the screen 
    ?>
    <div class="updated"><p><strong><?php _e('Settings saved.', 'custom-facebook-feed' ); ?></strong></p></div>

    <?php } ?> 
 
    <div class="wrap">

        <h2><?php _e('Custom Facebook Feed'); ?></h2>

        <form name="form1" method="post" action="">

            <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

            <p><b>Reminder:</b> Don't forget to activate your license on the License settings page to receive automatic updates.</p>

            <h3><?php _e('Feed Settings'); ?></h3>


            <table class="form-table">

                <tbody>

                    <tr valign="top">

                        <th scope="row"><?php _e('Access Token'); ?></th>

                        <td>

                            <input name="cff_access_token" type="text" value="<?php esc_attr_e( $access_token_val ); ?>" size="60" />

                            <a href="http://smashballoon.com/custom-facebook-feed/access-token/" target="_blank">How to get an Access Token</a>

                        </td>

                    </tr>

                    <tr valign="top">

                        <th scope="row"><?php _e('Page ID'); ?></th>

                        <td>

                            <input name="cff_page_id" type="text" value="<?php esc_attr_e( $page_id_val ); ?>" size="60" />

                            <a href="http://smashballoon.com/custom-facebook-feed/faq/" target="_blank">What's my Page ID?</a>

                        </td>

                    </tr>

                    <tr valign="top">

                        <th scope="row"><?php _e('Number of posts to display'); ?></th>

                        <td>

                            <input name="cff_num_show" type="text" value="<?php esc_attr_e( $num_show_val ); ?>" size="4" />

                        </td>

                    </tr>

                </tbody>

            </table>

            <br />
            <h3><?php _e('Post Formatting'); ?></h3>


            <table class="form-table">

                <tbody>

                    <tr valign="top">

                        <th scope="row"><?php _e('Maximum Post Text Length'); ?></th>

                        <td>

                            <input name="cff_title_length" type="text" value="<?php esc_attr_e( $cff_title_length_val ); ?>" size="4" /> <span>Characters.</span> <i style="color: #666; font-size: 11px; margin-left: 5px;">(Leave empty to set no maximum length)</i>

                        </td>

                    </tr>

                    <tr valign="top">

                        <th scope="row"><?php _e('Maximum Link/Event Description Length'); ?></th>

                        <td>

                            <input name="cff_body_length" type="text" value="<?php esc_attr_e( $cff_body_length_val ); ?>" size="4" /> <span>Characters.</span> <i style="color: #666; font-size: 11px; margin-left: 5px;">(Leave empty to set no maximum length)</i>

                        </td>

                    </tr>

                </tbody>

            </table>


            <?php submit_button(); ?>

        </form>

        <hr />

        <h4>Displaying your Feed</h4>

        <p>Copy and paste this shortcode directly into the page, post or widget where you'd like the feed to show up:</p>

        <input type="text" value="[custom-facebook-feed]" size="23" />

        <p>You can override the settings above directly in the shortcode like so:</p>

        <p>[custom-facebook-feed <b>id=Your_Page_ID show=3 titlelength=100 bodylength=150</b>]</p>

        <br /><br /><a href="http://smashballoon.com/custom-facebook-feed/" target="_blank">Plugin Support</a>

<?php 
} //End Settings_Page 

?>