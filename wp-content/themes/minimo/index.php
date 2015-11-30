<?php get_header(); ?>	
	
	<!-- articles wrapper, masonry class for layout -->
    <div id="articles" class="masonry">
		
		<!-- loop -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $lt_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lovethemes_blog' );  ?>
            <article <?php post_class( 'h-entry one-quarter masonry-item' ); ?> id="post-<?php the_ID(); ?>">
	            
	            <!-- check for featured image, if set, show it -->
                <?php if ( $lt_featured_image[0] ) : ?>
				    <figure>
				    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	       			    	<img class="featured u-photo" src="<?php echo esc_url( $lt_featured_image[0] ); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
				    	</a>
	       			 </figure>
				<?php endif; ?>
				<!-- /featured image -->
				
				<div class="clearfix"></div>
				
				<!-- post title -->
                <h2 class="p-name entry-title"><?php if ( is_sticky() ) : ?><i class="icon-paperclip"></i><?php endif; ?><a class="u-url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <!-- /post title -->
                
                <!-- postmeta -->
                <?php get_template_part( 'inc/postmeta' ); ?>
    			<!-- /postmeta -->
				
				<!-- post excerpt -->
                <div class="p-summary entry-summary"><?php the_excerpt(); ?><p><a class="u-url" href="<?php the_permalink(); ?>"><?php esc_html_e( "read more...", "minimo" ); ?></a></p></div>
                <!-- /post excerpt -->
                
                <!-- microformats for seo, hidden for styling, available for screenreaders -->
                <div class="updated entry-date visuallyhidden" title="<?php the_date( "d-m-Y G:i:s" ); ?>"><?php the_date( "d-m-Y G:i:s" ); ?></div>
                <div class="vcard author entry-author visuallyhidden"><span class="fn"><?php the_author(); ?></span></div>
                <!-- /microformats -->
                
                <!-- post reading time -->
                <div class="reading-time">
                	<?php esc_html_e( "This article is", "minimo" ); ?> <?php echo esc_html( lovethemes_show_post_word_count() ); ?> <?php esc_html_e( "words long. It will take", "minimo" ); ?> <?php echo esc_html( lovethemes_est_read_time() ); ?> <?php esc_html_e( "to read.", "minimo" ); ?>
                </div>
                <!-- /post reading time -->

            </article>
        <?php endwhile; else : ?>
        	<!-- if 0 posts set alert -->
            <div class="alert alert-warning">
                <?php esc_html_e( "Sorry, there are no articles he just yet, pop back soon!", "minimo" ); ?>
            </div>
        <?php endif; ?>
        <!-- /loop -->
            
    </div>
    <!-- /articles wrapper -->
    
    <!-- pagination -->
    <?php get_template_part( 'inc/pagination' ); ?>
    <!-- /pagination -->
    
<?php get_footer(); ?>