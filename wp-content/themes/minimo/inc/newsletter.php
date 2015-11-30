<!-- get newsletter settings from theme options -->
<?php $newsletter = get_option( 'lovethemes_newsletter' ); ?>

<!-- newsletter -->
<div id="newsletterform">
	
	<!-- form -->
    <form id="newsletter_form" name="newsletter_form" method="post" action="<?php echo get_template_directory_uri(); ?>/inc/newsletter-form.php" enctype="multipart/form-data">
	    
	    <!-- recipient email pulled from wp-admin -->
        <input name="recipient" value="<?php echo get_option( 'admin_email' ); ?>" type="hidden" />
		
		<!-- form messages -->
        <div id="news-form-messages"></div>
        <!-- /form messages -->
        
        <!-- content from theme options -->
        <p><?php echo esc_html( $newsletter['text'] ); ?></p>
		<!-- /content -->
		
		<!-- text field wrapped with two-third scaffolding class -->
		<div class="two-third">
		    <input type="text" id="newsemail" name="newsemail" placeholder="hello@example.com" autocomplete="on" required />
		</div>
		<!-- /text field -->
		
		<!-- submit button wrapped with one-third scaffolding class -->
		<div class="one-third">
			<input class="button" type="submit" id="subscribe" name="subscribe" value="<?php esc_attr_e( "Subscribe", "minimo" ); ?>" />
		</div>
		<!-- submit button -->
		
    </form>
    <!-- /form -->
    
</div>
<!-- /newsletter -->

<script type='text/javascript'>
    (function($) {   
	    "use strict";
        
        // newsletter form submission
        $( "#newsletter_form" ).submit( function(e)
        {
            // prevent default click action
            e.preventDefault();

            $.ajax({
                type : 'POST',
                url  : $( "#newsletter_form" ).attr( "action" ),
                data : $( "#newsletter_form" ).serialize()
            })
            .done( function(response) 
            {
                // alert css classes
                $( "#news-form-messages" ).removeClass( "alert alert-error" );
                $( "#news-form-messages" ).addClass( "alert alert-success" );
                
                // set message
                $( "#news-form-messages" ).text(response).delay( 2500 ).fadeOut( 500 );
                
                // return form
                $( "#newsletter_form input[type=text]" ).val( "" );
            })
            .fail( function(data) 
            {
                // alert css classes
                $( "#news-form-messages" ).removeClass( "alert alert-success" );
                $( "#news-form-messages" ).addClass( "alert alert-error" );
                
                // throw error
                if (data.responseText !== '')
                {
                    $( "#news-form-messages" ).text( data.responseText ).delay( 2500 ).fadeOut( 500 );
                }
                else
                {
                    $( "#news-form-messages" ).text( "Sorry, an error occured during your sign up. Please try later." ).delay( 2500 ).fadeOut( 500 );
                }
            });
        });
    })(jQuery);
</script>