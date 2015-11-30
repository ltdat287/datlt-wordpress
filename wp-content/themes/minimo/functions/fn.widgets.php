<?php
// Widgets
if ( function_exists( 'register_sidebar' ) ) 
{
    function lovethemes_theme_widgets_init() 
    {
    	register_sidebar(
    		array(
    			'name'			=> esc_html( "Sidebar Widgets", "minimo" ),
    			'id' 			=> 'sidebar_widgets',
    			'before_widget' => '<div id="%1$s" class="widget">',
    			'after_widget' 	=> '</div>',
    			'before_title' 	=> '<h6>',
    			'after_title' 	=> '</h6>',
    		)
    	);
	}
	add_action( 'widgets_init', 'lovethemes_theme_widgets_init' );
}