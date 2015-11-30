<?php
function lovethemes_setup()
{
    // add theme support
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'title-tag' );
	
	// add image size
	add_image_size( 'lovethemes_blog', 960, 800, true );
	
    // content width
    if ( ! isset( $content_width ) )
    {
    	$content_width = 1280;
    }

    // localization support
    load_theme_textdomain( 'minimo', get_template_directory_uri() . '/language' );
}
add_action( 'after_setup_theme', 'lovethemes_setup' );

// load individual function files
require_once( get_template_directory() . '/functions/fn.customizer.php' );
require_once( get_template_directory() . '/functions/fn.menus.php' );
require_once( get_template_directory() . '/functions/fn.widgets.php' );
require_once( get_template_directory() . '/functions/fn.minify.php' );

// load theme stuff for frontend only
if ( ! is_admin() )
{
    // remove default woocommerce css and use our own
    add_filter( 'woocommerce_enqueue_styles', '__return_false' );
    
    // function to check if woocommerce is active
    function lovethemes_iswoo() 
    {
        if ( function_exists ( "is_woocommerce" ) && is_woocommerce() )
        {
        	return true;
        }
        
        $woocommerce_keys = array( 
        	"woocommerce_shop_page_id",
            "woocommerce_terms_page_id",
            "woocommerce_cart_page_id",
            "woocommerce_checkout_page_id",
            "woocommerce_pay_page_id",
            "woocommerce_thanks_page_id",
            "woocommerce_myaccount_page_id",
            "woocommerce_edit_address_page_id",
            "woocommerce_view_order_page_id",
            "woocommerce_change_password_page_id",
            "woocommerce_logout_page_id",
            "woocommerce_lost_password_page_id" 
        );
        
        foreach ( $woocommerce_keys as $wc_page_id ) 
        {
            if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) 
            {
                return true ;
            }
        }
        return false;
	}
    
    // unset additional info tab
    function lovethemes_remove_product_tabs( $tabs ) 
    {
        unset( $tabs['additional_information'] );
        return $tabs;
    }
    add_filter( 'woocommerce_product_tabs', 'lovethemes_remove_product_tabs', 98 );
	
	// related products
	function lovethemes_related_products_limit() 
	{
        global $product;
    	$args['posts_per_page'] = 6;
    	return $args;
    }
    
    function lovethemes_related_products_args( $args ) 
    {
    	$args['posts_per_page'] = 4;
    	$args['columns'] = 1;
    	return $args;
    }
    add_filter( 'woocommerce_output_related_products_args', 'lovethemes_related_products_args' );

    // word count
    function lovethemes_show_post_word_count()
    { 
        ob_start(); 
        the_content(); 
        $content = ob_get_clean(); 
        return sizeof( explode( " ", $content ) ); 
    }
    
    if ( ! function_exists( 'est_read_time' ) ) : 
        function lovethemes_est_read_time( $return = false) 
        { 
            $wordcount    = round( str_word_count( get_the_content() ), -2 ); 
            $minutes_fast = ceil( $wordcount / 250 ); 
            $minutes_slow = ceil( $wordcount / 150 ); 
            $output = sprintf(__(" around %s minute(s)", "lt"), $minutes_fast, $minutes_slow); 
            echo esc_html( $output ); 
        } 
    endif; 
    
    if ( ! function_exists( 'est_the_content' ) ) : 
        function lovethemes_est_the_content( $orig ) 
        {
            return lovethemes_est_read_time(true) . "\n\n" . $orig; 
        } 
    endif;

    // excerpt length for display purposes
    function lovethemes_excerpt_length( $length )
    {
    	return 25;
    }
    add_filter( 'excerpt_length', 'lovethemes_excerpt_length', 999 );

    // excerpt more
    function lovethemes_excerpt_more( $more )
    {
    	return '...';
    }
    add_filter('excerpt_more', 'lovethemes_excerpt_more');

    // Search Function
    function lovethemes_search_filter( $query )
    {
    	if ( $query->is_search )
    	{
    		$query->set( 'post_type', array( 'post', 'product' ) );
    	}
    	return $query;
    }
    add_filter( 'pre_get_posts', 'lovethemes_search_filter' );

    // Enqueue styles
    function lovethemes_theme_styles()
    {
	    // if you would like to add Google fonts, simply uncomment the line below, add the font  nae after ?family= and reference the typeface in assets/css/typography.css
        // wp_enqueue_style( 'fonts', "//fonts.googleapis.com/css?family=Lora:400,700", '', 'lovethemes', 'screen' );
        wp_enqueue_style( 'style', get_stylesheet_uri(), '', 'lovethemes_1.0.0', 'screen', true );
    }
    add_action( 'wp_enqueue_scripts', 'lovethemes_theme_styles' );

    // Enqueue scripts
	function lovethemes_theme_scripts()
	{
    	// wp_enqueue_script() syntax, $handle, $src, $deps, $version, $in_footer(boolean)
 		wp_enqueue_script( 'lovethemes_plugins', get_template_directory_uri() . '/assets/js/plugins.js', array( 'jquery' ), '1.0.0', true );
 		wp_enqueue_script( 'lovethemes_application', get_template_directory_uri() . '/assets/js/application.js', array( 'jquery' ), '1.0.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'lovethemes_theme_scripts');
}