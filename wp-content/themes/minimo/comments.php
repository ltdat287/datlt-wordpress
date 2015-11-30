<!-- wrap for styling -->
<div class="wrap">
	
	<!-- post padding for styling -->
    <div class="padding">
	
		<!-- comment list -->
		<ul class="nolist" id="comments">
			<h2 class="comments-title">
				<?php printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'minimo' ),
						number_format_i18n( get_comments_number() ), get_the_title() );
				?>
			</h2>
			<?php $comment_avatar = wp_list_comments( array( 'avatar_size' => 50 ) ); ?>
		</ul>
		<!-- /comment list -->
		
		<!-- pagination -->
		<?php if ( get_option( 'page_comments' ) ) : ?>
		    <div class="pagination">
		      	<?php paginate_comments_links(); ?> 
		    </div>
		<?php endif; ?>
		<!-- /pagination -->
		
		<!-- comment form -->
		<?php comment_form(); ?>
		<!-- /comment form -->
	
    </div>
    <!-- /post padding -->
	
</div>
<!-- /wrap -->