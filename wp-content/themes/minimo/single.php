<?php get_header(); ?>	
	
	<!-- articles wrapper -->
    <div id="articles">   
	    
	    <!-- wrap to make page narrower for styling -->
        <div class="wrap">
	        
	        <!-- loop -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $lt_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog' ); ?>
                <article <?php post_class( 'h-entry post' ); ?> id="post-<?php the_ID(); ?>">  
	                              
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
    				
    				<!-- post padding for styling -->
    				<div class="padding">
	    				
	    				<!-- post title -->
                        <h2 class="p-name entry-title"><?php the_title(); ?></h2>
                        <!-- /post title -->
                        
                        <!-- postmeta -->
                        <?php get_template_part( 'inc/postmeta' ); ?>
        				<!-- /postmeta -->
        				
        				<!-- post content -->
                        <div class="e-content entry-content"><?php the_content(); ?></div>
                        <!-- /post content -->
                        
                        <!-- microformats for seo, hidden for styling, available for screenreaders -->
        				<div class="updated entry-date visuallyhidden" title="<?php the_date( "d-m-Y G:i:s" ); ?>"><?php the_date( "d-m-Y G:i:s" ); ?></div>
        				<!-- /microformats -->
        				
        				<!-- post sharing -->
                        <?php get_template_part( 'inc/sharing' ); ?>
                        <!-- /post sharing -->
                        
    				</div>
    				<!-- /post padding -->
    				
                </article>
            <?php endwhile; endif; ?>
            <!-- /loop -->
			
        </div>
        <!-- /wrap -->
        
        <!-- comments -->
        <?php if ( comments_open() || get_comments_number() ) : ?>
            <div id="commentbox">
                <?php comments_template(); ?>
            </div>
        <?php endif; ?>
        <!-- /comments -->
        
    </div>
    <!-- /articles wrapper -->
    
<?php get_footer(); ?>