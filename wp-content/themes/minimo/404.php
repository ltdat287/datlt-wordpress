<?php get_header(); ?>
	
	<!-- 404 wrapper, classes for styling -->
    <div id="fourohfour" class="aligncenter textcenter">

	    <!-- logo -->
        <div id="logo">
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
        
        <!-- 404 title -->
        <h4><?php esc_html_e( "Not Found, aka 404", "minimo" ); ?></h4> 
        <!-- /404 title -->
        
        <!-- 404 content -->
        <p><?php esc_html_e( "It appears that you've lost your way, either through an outdated link or a typo on the page you were trying to reach.", "minimo" ); ?></p>
        <!-- /404 content -->
        
        <!-- back link -->
        <a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="textcenter aligncenter">
            <?php esc_html_e( "Back Home", "minimo" ); ?>
        </a>
        <!-- /back link -->
        
    </div>
    <!-- /404 wrapper -->
    
<?php get_footer(); ?>