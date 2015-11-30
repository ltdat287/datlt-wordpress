<?php get_header(); ?>

	<!-- page wrapper -->
    <div id="page">
	    
	    <!-- loop -->
        <?php 
            if ( have_posts()) : 
        	    while ( have_posts() ) : the_post();
                    global $more; $more = 0; the_content();	
                endwhile; 
            endif;
        ?>
        <!-- /loop -->
        
        <!-- comments on pages are now mandatory, you can turn off on a per-page basis from wp-admin -->
        <?php if ( ! is_front_page() && comments_open() ) : ?>
            <div id="commentbox">
                <?php comments_template(); ?>
            </div>
        <?php endif; ?>
        <!-- /comments -->
        
    </div>
    <!-- /page wrapper -->
    
<?php get_footer(); ?>