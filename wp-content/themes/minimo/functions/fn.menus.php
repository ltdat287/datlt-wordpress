<?php
// menu support
add_theme_support( 'menus' );

// register menu
add_action( 'init', 'lovethemes_register_menus' );

function lovethemes_register_menus() 
{
	register_nav_menus(
		array(
			'primary_menu' => esc_html( "Primary Menu", "minimo" ),
			'footer_menu'  => esc_html( "Footer Menu", "minimo" )
		)	
	);
}