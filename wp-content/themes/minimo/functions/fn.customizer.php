<?php

// hook
add_action( 'customize_register', 'lovethemes_customize_register' );

// register customizer
function lovethemes_customize_register( $wp_customize )
{
    // custom classes extending WP_Customize_Control
    class Lovethemes_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
     
        public function render_content() 
        {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
            <?php
        }
    }
   
    
    /************************************************
     ***************** logo section *****************
     ************************************************/
    $wp_customize->add_section(
        'lovethemes_logo',

        array(
            'title'    => __( 'Logo', 'lt' ),
            'priority' => 130,
        )
    );
    $wp_customize->add_setting( 
        'lovethemes_logo[image]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( 
            $wp_customize, 
            'logo', 
            
            array(
                'label'    => __( 'Logo', 'lt'),
                'section'  => 'lovethemes_logo',
                'settings' => 'lovethemes_logo[image]',
            ) 
        ) 
    );
    
    
    /************************************************
     ************** styling section *****************
     ************************************************/
    $wp_customize->add_section(
        'lovethemes_styling',

        array(
            'title'    => __( 'Styling', 'lt' ),
            'priority' => 132,
        )
    );
    
    // accent color
    $wp_customize->add_setting(
        'lovethemes_styling[accent_color]',

        array(
            'default'    => '#ABAD23',//#E4352C
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'accent_color',

            array(
                'label'    => __( 'Accent Color', 'lt' ),
                'section'  => 'lovethemes_styling',
                'settings' => 'lovethemes_styling[accent_color]',
                'priority' => 10,
            )
        )
    );
    
    
    /************************************************
     **************** newsletter ********************
     ************************************************/
    $wp_customize->add_section(
        'lovethemes_newsletter',

        array(
            'title'    => __( 'Newsletter', 'lt' ),
            'priority' => 133,
        )
    );
    
    $wp_customize->add_setting( 
        'lovethemes_newsletter[text]', 
        
        array(
            'default'    => '<h4>Don\'t miss a thing!</h4><p>Join our mailing list to keep up to date on new products,<br>sales, offers and more.</p>',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_html',
        ) 
    );
    $wp_customize->add_control(
        'newslettertext', 
        
        array(
            'label'      => __( 'Text for the newsletter. Leave blank to disable.', 'lt' ),
            'section'    => 'lovethemes_newsletter',
            'settings'   => 'lovethemes_newsletter[text]',
            'priority'   => 10,
    ));
    
    
     /************************************************
     **************** products page ******************
     ************************************************/
    $wp_customize->add_section(
        'lovethemes_products',

        array(
            'title'    => __( 'Products Page', 'lt' ),
            'priority' => 134,
        )
    );
    // american express
    $wp_customize->add_setting( 
        'lovethemes_products[categories]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'displaycategories', 
        
        array(
            'label'      => __('Display Category Navigation', 'lt'),
            'section'    => 'lovethemes_products',
            'settings'   => 'lovethemes_products[categories]',
            'type'     => 'checkbox',
            'priority'   => 10,
    ));

    
    /************************************************
     **************** social section ****************
     ************************************************/
    $wp_customize->add_section(
        'lovethemes_social',

        array(
            'title'    => __( 'Social', 'lt' ),
            'priority' => 136,
        )
    );
    // facebook
    $wp_customize->add_setting( 
        'lovethemes_social[facebook]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'facebook', 
        
        array(
            'label'      => __('Facebook', 'lt'),
            'section'    => 'lovethemes_social',
            'settings'   => 'lovethemes_social[facebook]',
            'priority'   => 10,
    ));
    // twitter
    $wp_customize->add_setting( 
        'lovethemes_social[twitter]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'twitter', 
        
        array(
            'label'      => __('Twitter', 'lt'),
            'section'    => 'lovethemes_social',
            'settings'   => 'lovethemes_social[twitter]',
            'priority'   => 11,
    ));
    // gplus
    $wp_customize->add_setting( 
        'lovethemes_social[gplus]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'gplus', 
        
        array(
            'label'      => __('Google+', 'lt'),
            'section'    => 'lovethemes_social',
            'settings'   => 'lovethemes_social[gplus]',
            'priority'   => 12,
    ));
    // instagram
    $wp_customize->add_setting( 
        'lovethemes_social[instagram]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'instagram', 
        
        array(
            'label'      => __('Instagram', 'lt'),
            'section'    => 'lovethemes_social',
            'settings'   => 'lovethemes_social[instagram]',
            'priority'   => 12,
    ));
    // linkedin
    $wp_customize->add_setting( 
        'lovethemes_social[linkedin]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'linkedin', 
        
        array(
            'label'      => __('LinkedIn', 'lt'),
            'section'    => 'lovethemes_social',
            'settings'   => 'lovethemes_social[linkedin]',
            'priority'   => 13,
    ));
    // dribbble
    $wp_customize->add_setting( 
        'lovethemes_social[dribbble]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'dribbble', 
        
        array(
            'label'      => __('Dribbble', 'lt'),
            'section'    => 'lovethemes_social',
            'settings'   => 'lovethemes_social[dribbble]',
            'priority'   => 14,
    ));
    // pinterest
    $wp_customize->add_setting( 
        'lovethemes_social[pinterest]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'pinterest', 
        
        array(
            'label'      => __('Pinterest', 'lt'),
            'section'    => 'lovethemes_social',
            'settings'   => 'lovethemes_social[pinterest]',
            'priority'   => 15,
    ));
    // youtube
    $wp_customize->add_setting( 
        'lovethemes_social[youtube]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'youtube', 
        
        array(
            'label'      => __('Youtube', 'lt'),
            'section'    => 'lovethemes_social',
            'settings'   => 'lovethemes_social[youtube]',
            'priority'   => 16,
    ));
    // vimeo
    $wp_customize->add_setting( 
        'lovethemes_social[vimeo]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'vimeo', 
        
        array(
            'label'      => __('Vimeo', 'lt'),
            'section'    => 'lovethemes_social',
            'settings'   => 'lovethemes_social[vimeo]',
            'priority'   => 17,
    ));
    // skype
    $wp_customize->add_setting( 
        'lovethemes_social[skype]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'skype', 
        
        array(
            'label'      => __('Skype', 'lt'),
            'section'    => 'lovethemes_social',
            'settings'   => 'lovethemes_social[skype]',
            'priority'   => 18,
    ));
    
    
    
    /************************************************
     ******************* live js ********************
     ************************************************/
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    // preview js
    function lovethemes_customize_preview()
    {
        ?>
        <script type="text/javascript">
            (function($)
            {
                // accent color
                wp.customize( 'lovethemes_styling[accent_color]', function( value ) {
                    value.bind( function( newval ) {
                        $('.accent,#articles a,#page a,#primary ul li a:hover,#primary ul li.current_page_item a,#pageslide ul li a:hover,footer#footer a:hover,#articles [class^="icon-"]:before,#articles [class*=" icon-"]:before,#page [class^="icon-"]:before,#page [class*=" icon-"]:before,.post h2 a:hover,#aside .widget a:hover,#aside a.aside-close,#twitter ul li a,.products .onsale,.woo-single .product_meta .posted_in a,.woo-single .product_meta .tagged_as a,.woo-single .woocommerce-tabs ul li a:hover').css('color', newval );
                    });
                });
                
                // accent background
                wp.customize( 'lovethemes_styling[accent_color]', function( value ) {
                    value.bind( function( newval ) {
                        $('.tagcloud a,ul#comments .reply a,.pagination a:hover,a.button:hover,a:hover.button,.button:hover,button:hover,input[type="reset"]:hover,input[type="submit"]:hover,input[type="button"]:hover,.postnavi a:hover,.stars .active,.stars span a:hover,span.cart-count,.ui-slider .ui-slider-handle,.ui-slider-horizontal').css('background', newval );
                    });
                });
                
                // secondary background
                wp.customize( 'lovethemes_styling[secondary_color]', function( value ) {
                    value.bind( function( newval ) {
                        $('#topnav,a.cart-button,a.aside-open,.button,a.button,button,input[type="reset"],input[type="submit"],input[type="button"] ').css('background', newval );
                    });
                });

                // site title
                wp.customize( 'blogname', function( value ) {
                    value.bind( function( newval ) {
                        $( '#logo h1' ).html( newval );
                    });
                });
                
                // site description
                wp.customize( 'blogdescription', function( value ) {
                    value.bind( function( newval ) {
                        $( '#header h1' ).html( newval );
                    });
                });

            })( jQuery )
        </script>
        <?php
    }

    // load only in preview and not frontend
    if ( $wp_customize->is_preview() && ! is_admin() )
    {
        add_action( 'wp_footer', 'lovethemes_customize_preview', 21 );
    }
}

// load lovethemes css into wp_head
function lovethemes_css()
{
    $styling = get_option( 'lovethemes_styling' );
?>
<!-- lovethemes options css -->
<style type="text/css">    
    .loading-spin
    {
        border-top-color: <?php echo esc_html( $styling['accent_color'] ); ?>;
    }
    
	.accent,
	#primary li a:hover,
    #articles a,
    #page a,
    #pageslide ul li a:hover,
    footer#footer a:hover,
    #articles [class^="icon-"]:before,
    #articles [class*=" icon-"]:before,
    #page [class^="icon-"]:before,
    #page [class*=" icon-"]:before,
    #aside .widget a:hover,
    #aside a.aside-close,
    #aside .widget a:hover,
    #aside .widget a:hover span,
    #twitter ul li a,
    .woo-single .product_meta .posted_in a,
	.woo-single .product_meta .tagged_as a,
	.woo-single .woocommerce-tabs ul li a:hover,
	.products .onsale,
	ul#store-cat li a:hover,
	ul#store-cat li a.current,
	.woocommerce-breadcrumb a:hover
    {
        color: <?php echo esc_html( $styling['accent_color'] ); ?>;
    }
    
    .post h2 a:hover
    {
        color: <?php echo esc_html( $styling['accent_color'] ); ?>!important;
    }
    
    .tagcloud a,
    ul#comments .reply a,
    .pagination a:hover,
    .button,
    a.button,
    button,
	input[type="reset"],
	input[type="submit"],
	input[type="button"],
	.postnavi a:hover,
	.stars .active,
	.stars span a:hover,
	span.cart-count,
	.ui-slider .ui-slider-handle,
	.ui-slider-horizontal,
	.woocommerce-pagination a:hover
    {
        background: <?php echo esc_html( $styling['accent_color'] ); ?>;
    }
</style>
<!-- /lovethemes options css -->
<?php
}
add_action( 'wp_head', 'lovethemes_css', 21);