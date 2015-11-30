<?php get_header(); ?>
    <?php if ( is_single() ) : ?>
        <div id="woo" class="woo-single">
            <?php woocommerce_content(); ?>	
        </div>
    <?php else : ?>
    	
    	<?php $cats = get_option( 'lovethemes_products' );  if ( $cats ) : get_template_part( 'inc/store-categories' ); endif; ?>
        
        <div id="woo" class="grid">
            <?php woocommerce_content(); ?>	
        </div>
    <?php endif; ?>
<?php get_footer(); ?>