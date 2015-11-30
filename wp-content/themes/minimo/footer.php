	    <?php if ( ! is_404() ) : ?>
	    		</div>
	        </div>
	        <!-- /wrapper -->
	        
	        <!-- postnavi -->
	        <?php if ( is_single() ) : get_template_part( 'inc/postnavi' ); endif; ?>
	        <!-- /postnavi -->
		    
		    <!-- footer -->
	        <footer id="footer">  
		        
		        <!-- box the content -->  
	            <div class="boxed">
					
					<!-- wrap section for styling -->
					<div class="two-third alignleft">
						
			            <!-- footer navigation -->
			            <nav class="navigation">
			                <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'nav', 'theme_location' => 'footer_menu', 'items_wrap' => '<ul id="footernav" class="%2$s">%3$s</ul>', ) ); ?>
			            </nav>
			            <!-- /footer navigation -->
			            
			            <!-- grab social settings from theme options  -->
		                <?php $social = get_option( 'lovethemes_social' ); if ( $social ) : get_template_part( 'inc/social' ); endif; ?>
		                <!-- /social -->
	
		                <!-- copyright -->
		                <div id="copyright">
		                    <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( bloginfo( 'name' ) ); ?>&nbsp;<?php esc_html_e( "All Rights Reserved", "minimo" ); ?></p>
		                </div>
		                <!-- /copyright -->
	                
					</div>
					<!-- /wrap section for styling -->
	                
	                <!-- newsletter, scaffolding class for styling -->
	                <div class="one-third alignright">
				        <?php get_template_part( 'inc/newsletter' ); ?>
	                </div>
			        <!-- /newsletter -->

	            </div>
	            <!-- /box the content -->
	            
	        </footer>
	        <!-- /footer -->
        
        </div>
        <!-- /push div that controls the sidebar slideout -->
        
        <!-- get the sidebar, displayed via the toggle in the primary menu, contents called from sidebar.php -->
        <?php get_sidebar(); ?>
        <!-- /sidebar -->
		
		<?php if ( ! is_single() && ! is_search() && ! is_404() ) : ?>
            <script type="text/javascript">(function($){$(window).load(function(){setTimeout(function(){$("#main-preloader").fadeOut(500);},2000);});})(jQuery);</script>
        <?php endif; ?>
    <?php endif; ?>
    
    <!-- wp footer hook -->
	<?php wp_footer(); ?>
</body> 
</html>