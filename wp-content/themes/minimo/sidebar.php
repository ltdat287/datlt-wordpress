<aside id="aside">
    <!-- mobile nav, pulls items from primary menu -->
    <div id="mobile" class="widget">
	    <h6><?php esc_html_e( "Navigate", "minimo" ); ?></h6>
	    <nav class="navigation">
            <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'nav', 'theme_location' => 'primary_menu', 'items_wrap' => '<ul id="asidenav" class="%2$s">%3$s</ul>', ) ); ?>
        </nav>
    </div>
    <!-- /mobile nav -->
	
	<!-- widgets -->
	<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'Sidebar Widgets' ) ) : ?>
		<?php // widgets load here ?>
	<?php endif; ?>
	<!-- /widgets -->
</aside>