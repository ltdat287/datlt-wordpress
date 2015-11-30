<?php get_header(); ?>	
	
	<!-- articles wrapper -->
	<div id="articles">
		
		<!-- wrap to make page narrower for styling -->
        <div class="wrap">
			
			<!-- check if we have posts -->
			<?php if ( have_posts() ) : ?>
				
				<!-- posts result -->
				<article class="search hentry h-entry post">
					<div class="post-padding">
						<h4 class="p-name">
							<?php 
								esc_html_e( "Search Results for ", "minimo" ); 
								
								$allsearch = new WP_Query("s=$s&showposts=-1"); 
								$key = esc_html($s, 1); $count = $allsearch->post_count; 
								
								print( '<span class="highlight">'.$key.'</span> ' ); 
								print( '<span class="search-count">'.$count.' article(s) found.</span>' ); 
							?>
						</h4>
					</div>
				</article>
				<!-- /posts results -->
				
				<!-- loop -->
				<?php while ( have_posts() ) : the_post(); $lt_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lovethemes_blog' ); ?>
					<article <?php post_class( 'post h-entry' ); ?> id="post-<?php the_ID(); ?>">
						
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
	    				</div>
	    				<!-- /post padding -->
	                </article>
				<?php endwhile; else : ?>
				
					<!-- post results -->
					<article class="search hentry h-entry post">
						<div class="padding">
							<h4 class="p-name">
								<?php 
									esc_html_e( "Search Results for ", "minimo" ); 
									
									$allsearch = new WP_Query("s=$s&showposts=-1"); 
									$key = esc_html($s, 1);
									
									print( '<span class="highlight">'.$key.'</span> ' ); 
									print( '<span class="search-count">0 article(s) found. Maybe these may be of interest instead?</span>' ); 
								?>
							</h4>
						</div>
					</article>
					<!-- /post results -->
					
					<!-- if 0 posts show random -->
					<?php
						$args = array(
							'posts_per_page' => 6,
							'orderby'        => 'rand',
							'post__not_in'   => get_option( 'sticky_posts' )
						);
						$rand = new WP_Query( $args );
					?>
					<?php while( $rand->have_posts() ) : $rand->the_post(); $lt_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lovethemes_blog' ); ?>
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
		    				</div>
		    				<!-- /post padding -->
		    				
		                </article>
		                
					<?php endwhile; ?>
			<?php endif; ?>
			<!-- /loop -->
			
			<!-- pagination -->
			<?php get_template_part( 'inc/pagination' ); ?>
			<!-- /pagination -->
			
		</div>
		<!-- /wrap -->
		
	</div>
	<!-- /articles wrapper -->
	
<?php get_footer(); ?>