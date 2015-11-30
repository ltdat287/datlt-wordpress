<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    
    <!-- meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	
    <!-- wp head -->
    <?php if ( is_singular() ) { wp_enqueue_script('comment-reply'); } wp_head(); ?>
</head>
<!-- /head -->

<body id="index" <?php if ( lovethemes_iswoo() && is_single() ) { body_class( 'woo-single-page' ); } else { body_class(); } ?>>
    
    <!-- push div that controls the sidebar slideout -->
    <div id="push">
	    
	    <!-- we don't want certain things on 404 page -->
	    <?php if ( ! is_404() ) : ?>
	        
	        <?php if ( ! is_single() && ! is_search() ) : ?>
	            <!-- preloader -->
	            <div id="main-preloader" class="preloader">
	                <div class="loading">
	                    <div class="loading-spin"></div>
	                </div>
	            </div>
	            <!-- /preloader -->
	        <?php endif; ?>

	        <!-- setup vars -->
	        <?php if ( ! is_search() ) : $lt_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); endif; ?>
	        <!-- /setup vars -->
			
			<!-- header wrapper for fixed positioning -->
			<div id="header-wrapper">
	    	        
	    		<!-- header -->
	    		<header id="main">
		    		<div class="boxed">
	    
		    			<!-- logo -->
		    	        <div id="site-logo">
		    	    	    <?php $logo = get_option( 'lovethemes_logo' ); if ( $logo['image'] ) : ?>
		    	    	        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		    	    	            <img src="<?php echo esc_url( $logo['image'] ); ?>" alt="<?php echo esc_html( bloginfo( 'name' ) ); ?>" />
		    	    	            <p class="desc"><?php echo esc_html( bloginfo( 'description' ) ); ?></p>
		    	    	        </a>
		    	    	    <?php else : ?>
		    	    			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		    	    				<h1><?php echo esc_html( bloginfo( 'name' ) ); ?></h1>
		    	    				<p class="desc"><?php echo esc_html( bloginfo( 'description' ) ); ?></p>
		    	    			</a>
		    	            <?php endif; ?>
		    	    	</div>
		    	    	<!-- /logo -->
		    	    	
		    	        <!-- primary nav area -->
		    	    	<div id="primary">
			    	    	
			    	    	<!-- menu -->
		    	            <nav class="navigation">
		    	                <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'nav', 'theme_location' => 'primary_menu', 'items_wrap' => '<ul id="mainnav" class="%2$s">%3$s</ul>', ) ); ?>
		    	            </nav>
		    	            <!-- /menu -->
		    	            
		    	            <!-- sidebar toggle -->
		    	            <a class="aside-open alignright" href="#"><i class="icon-navicon"></i></a>
		    	            <!-- /sidebar toggle -->
		    	            
		    	            <!-- cart link -->
		                    <?php if ( class_exists( 'WooCommerce' ) ) : global $woocommerce; ?>
		                        <a class="cart-button alignright" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>">
		                            <i class="icon-shopping-cart"></i>
		                            <?php if ( $woocommerce->cart->cart_contents_count > 0 ) : ?>
		                                <span class="cart-count">
		                                    <?php echo esc_html( sprintf( _n( "%d", "%d", $woocommerce->cart->cart_contents_count, "minimo" ), $woocommerce->cart->cart_contents_count ) ); ?>
		                                </span>
		                            <?php endif; ?>
		                        </a>
		                    <?php endif; ?>
		                    <!-- /cart link -->
		    	            
		    	            <!-- search form button -->
			                <a class="search-button alignright" href="#"><i class="icon-search"></i></a>
			                <?php get_search_form(); ?>
							<!-- /search form button -->
		    	        </div>
		    	        <!-- /primary nav area -->
					
		    		</div>
	    		</header>
	    		<!-- /header -->

			</div>
			<!-- /header wrapper -->
	    
		    <!-- wrapper -->
		    <div id="wrapper">
			    
			    <!-- if we're not on the homepage, let's show the page title -->
				<?php if ( ! is_front_page() && is_page() ) : ?>
		    		<h1 class="main-title"><i class="icon-slack"></i> <?php the_title(); ?></h1>
		        <?php endif; ?>
		        <!-- /page title -->
				
				<!-- box the content -->
			    <div class="boxed">
				    
		<?php endif; ?>
		<!-- /404 check -->