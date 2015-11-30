<!-- social share -->
<ul id="social-share" class="nolist">
	<?php esc_html_e( "Share This: ", "lt" ); ?>
	
	<li><a class="social-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( wp_get_shortlink() ); ?>" target="_blank"><i class="icon-facebook"></i></a></li>
    <li><a class="social-twitter" href="http://twitter.com/share?url=<?php echo esc_url( wp_get_shortlink() ); ?>&text=<?php the_title(); ?>&hashtags=<?php echo esc_html( bloginfo( 'name' ) ); ?>" target="_blank"><i class="icon-twitter"></i></a></li>
    <li><a class="social-google" href="https://plus.google.com/share?url=<?php echo esc_url( wp_get_shortlink() ); ?>" target="_blank"><i class="icon-google"></i></a></li>
</ul>
<!-- /social share -->