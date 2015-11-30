<?php
/*
Plugin Name: LoveThemes Minimo Theme Shortcodes
Plugin URI: http://demo.lovethemes.co/minimo/

Description: Creates the Shortcodes for the LoveThemes Minimo WordPress theme.

Author: LoveThemes
Author URI: http://lovethemes.co

License: GPL
License URI: http://demo.lovethemes.co/minimo

Version: 1.0
*/

// boxed
function lovethemes_boxed_shortcode($atts, $content = null)
{
   return '<div class="boxed">'.do_shortcode($content).'</div>';
}
add_shortcode('boxed', 'lovethemes_boxed_shortcode');

// wrap
function lovethemes_wrap_shortcode($atts, $content = null)
{
   return '<div class="wrap">'.do_shortcode($content).'</div>';
}
add_shortcode('wrap', 'lovethemes_wrap_shortcode');

// center 
function lovethemes_center_shortcode($atts, $content = null)
{
   return '<div class="aligncenter textcenter">'.do_shortcode($content).'</div>';
}
add_shortcode('center', 'lovethemes_center_shortcode');

// padding
function lovethemes_padding_shortcode($atts, $content = null)
{
   return '<div class="padding">'.do_shortcode($content).'</div>';
}
add_shortcode('padding', 'lovethemes_padding_shortcode');

// columns
function lovethemes_one_full_shortcode($atts, $content = null)
{
	extract(shortcode_atts(array(
		"np"  => '',
	), $atts));
	
	if ( $np ) 
	{
		return '<div class="one-full np">'.do_shortcode($content).'</div>';	
	}
	else
	{
		return '<div class="one-full">'.do_shortcode($content).'</div>';
	}
}
add_shortcode('one full', 'lovethemes_one_full_shortcode');

function lovethemes_one_half_shortcode($atts, $content = null)
{
   	extract(shortcode_atts(array(
		"np"  => '',
	), $atts));
	
	if ( $np ) 
	{
		return '<div class="one-half np">'.do_shortcode($content).'</div>';	
	}
	else
	{
		return '<div class="one-half">'.do_shortcode($content).'</div>';
	}
}
add_shortcode('one half', 'lovethemes_one_half_shortcode');

function lovethemes_one_third_shortcode($atts, $content = null)
{
   	extract(shortcode_atts(array(
		"np"  => '',
	), $atts));
	
	if ( $np ) 
	{
		return '<div class="one-third np">'.do_shortcode($content).'</div>';	
	}
	else
	{
		return '<div class="one-third">'.do_shortcode($content).'</div>';
	}
}
add_shortcode('one third', 'lovethemes_one_third_shortcode');

function lovethemes_two_third_shortcode($atts, $content = null)
{
   	extract(shortcode_atts(array(
		"np"  => '',
	), $atts));
	
	if ( $np ) 
	{
		return '<div class="two-third np">'.do_shortcode($content).'</div>';	
	}
	else
	{
		return '<div class="two-third">'.do_shortcode($content).'</div>';
	}
}
add_shortcode('two third', 'lovethemes_two_third_shortcode');

function lovethemes_one_quarter_shortcode($atts, $content = null)
{
   	extract(shortcode_atts(array(
		"np"  => '',
	), $atts));
	
	if ( $np ) 
	{
		return '<div class="one-quarter np">'.do_shortcode($content).'</div>';	
	}
	else
	{
		return '<div class="one-quarter">'.do_shortcode($content).'</div>';
	}
}
add_shortcode('one quarter', 'lovethemes_one_quarter_shortcode');

function lovethemes_one_fifth_shortcode($atts, $content = null)
{
   	extract(shortcode_atts(array(
		"np"  => '',
	), $atts));
	
	if ( $np ) 
	{
		return '<div class="one-fifth np">'.do_shortcode($content).'</div>';	
	}
	else
	{
		return '<div class="one-fifth">'.do_shortcode($content).'</div>';
	}
}
add_shortcode('one fifth', 'lovethemes_one_fifth_shortcode');

function lovethemes_two_fifth_shortcode($atts, $content = null)
{
   	extract(shortcode_atts(array(
		"np"  => '',
	), $atts));
	
	if ( $np ) 
	{
		return '<div class="two-fifth np">'.do_shortcode($content).'</div>';	
	}
	else
	{
		return '<div class="two-fifth">'.do_shortcode($content).'</div>';
	}
}
add_shortcode('two fifth', 'lovethemes_two_fifth_shortcode');

function lovethemes_three_fifth_shortcode($atts, $content = null)
{
   	extract(shortcode_atts(array(
		"np"  => '',
	), $atts));
	
	if ( $np ) 
	{
		return '<div class="three-fifth np">'.do_shortcode($content).'</div>';	
	}
	else
	{
		return '<div class="three-fifth">'.do_shortcode($content).'</div>';
	}
}
add_shortcode('three fifth', 'lovethemes_three_fifth_shortcode');

function lovethemes_four_fifth_shortcode($atts, $content = null)
{
   	extract(shortcode_atts(array(
		"np"  => '',
	), $atts));
	
	if ( $np ) 
	{
		return '<div class="four-fifth np">'.do_shortcode($content).'</div>';	
	}
	else
	{
		return '<div class="four-fifth">'.do_shortcode($content).'</div>';
	}
}
add_shortcode('four fifth', 'lovethemes_four_fifth_shortcode');

// icons
function lovethemes_icon_shortcode($atts) {
	extract(shortcode_atts(array(
		"type"  => '',
		"size"  => '',
	), $atts));

    return '<i class="icon-'.$type.'" style="font-size:'.$size.'px;"></i>';
}
add_shortcode( "icon", "lovethemes_icon_shortcode" );

// Contact Form
function lovethemes_contact_form_shortcode( $atts )
{
    extract(shortcode_atts(array(
        "email"     => ''
	), $atts ) );

    $form = '
    <div id="contactform">
        <form id="contact_form" name="contact_form" method="post" action="'.get_template_directory_uri().'/inc/contact-form.php" enctype="multipart/form-data">
            <input name="subject" value="'.get_the_title().'" type="hidden" />
            <input name="recipient" value="'.$email.'" type="hidden" />

            <div id="form-messages"></div>

            <input type="text" id="firstname" name="firstname" placeholder="First Name" required />
    		<input type="text" id="lastname" name="lastname" placeholder="Last Name" required />
    	    <input type="text" id="email" name="email" placeholder="hello@example.com" required />
    		<input type="text" id="phone" name="phone" placeholder="01234567890" required />
    	    <textarea id="message" name="message" placeholder="Enter your message" required></textarea>
    		<input class="button" type="submit" id="send_message" name="send_message" value="Send Message" />
        </form>
    </div>
	';

	$form .=
	"<script type='text/javascript'>
	    (function($) {

            $('#contact_form').submit(function(e)
            {
                e.preventDefault();

                $.ajax({
                    type : 'POST',
                    url  : $('#contact_form').attr('action'),
                    data : $('#contact_form').serialize()
                })
                .done(function(response) {
                    $('#form-messages').removeClass('alert alert-error');
                    $('#form-messages').addClass('alert alert-success');

                    $('#form-messages').text(response).delay(2000).fadeOut(800);

                    $('#contact_form input[type=text]').val('');
                    $('#contact_form input[type=number]').val('');
                    $('#contact_form textarea').val('');

                })
                .fail(function(data) {
                    $('#form-messages').removeClass('alert alert-success');
                    $('#form-messages').addClass('alert alert-error');

                    if (data.responseText !== '')
                    {
                        $('#form-messages').text(data.responseText);
                    }
                    else
                    {
                        $('#form-messages').text('An error occured and your message could not be sent.');
                    }
                });
            });
        })(jQuery);
    </script>
    ";

    return $form;
}
add_shortcode( 'contact-form', 'lovethemes_contact_form_shortcode' );

// Google map
function lovethemes_google_map_shortcode( $atts )
{
    extract(shortcode_atts(array(
        "zip" => ''
	), $atts ) );

    if ( $zip ) :
    	$form = '
    	<div id="gmap">
    	    <div id="map-overlay" class="map-overlay"></div>
            <iframe width="100%" height="100%" src="//maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q='.$zip.'&amp;ie=UTF8&amp;&amp;z=12&amp;iwloc=near&amp;output=embed"></iframe>
        </div>
        ';
    endif;

    return $form;
}
add_shortcode( 'google-map', 'lovethemes_google_map_shortcode' );

// Video
function lovethemes_video_shortcode($atts) {
	extract(shortcode_atts(array(
		"src" => '',
	), $atts));
	
	return '<iframe src="'.$src.'" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
}
add_shortcode("video", "lovethemes_video_shortcode");