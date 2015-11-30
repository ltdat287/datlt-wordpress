<div id="social">
	<?php $social = get_option( 'lovethemes_social' ); ?>
	<ul class="nolist">
	    <?php if (  ! empty( $social['facebook'] ) ) : ?>
	        <li class="facebook"><a href="<?php echo esc_url( $social['facebook'] ); ?>"><i class="icon-facebook"></i></a></li>
	    <?php endif; ?>
	    
	    <?php if (  ! empty( $social['twitter'] ) ) : ?>
	        <li class="twitter"><a href="<?php echo esc_url( $social['twitter'] ); ?>"><i class="icon-twitter"></i></a></li>
	    <?php endif; ?>
	    
	    <?php if (  ! empty( $social['gplus'] ) ) : ?>
	        <li class="googleplus"><a href="<?php echo esc_url( $social['gplus'] ); ?>"><i class="icon-google"></i></a></li>
	    <?php endif; ?>
	    
	    <?php if (  ! empty( $social['instagram'] ) ) : ?>
	        <li class="instagram"><a href="<?php echo esc_url( $social['instagram'] ); ?>"><i class="icon-instagram"></i></a></li>
	    <?php endif; ?>
	    
	    <?php if (  ! empty( $social['linkedin'] ) ) : ?>
	        <li class="linkedin"><a href="<?php echo esc_url( $social['linkedin'] ); ?>"><i class="icon-linkedin"></i></a></li>
	    <?php endif; ?>
	    
	    <?php if (  ! empty( $social['dribbble'] ) ) : ?>
	        <li class="dribbble"><a href="<?php echo esc_url( $social['dribbble'] ); ?>"><i class="icon-dribbble"></i></a></li>
	    <?php endif; ?>
	    
	    <?php if (  ! empty( $social['pinterest'] ) ) : ?>
	        <li class="pinterest"><a href="<?php echo esc_url( $social['pinterest'] ); ?>"><i class="icon-pinterest"></i></a></li>
	    <?php endif; ?>
	    
	    <?php if (  ! empty( $social['youtube'] ) ) : ?>
	        <li class="youtube"><a href="<?php echo esc_url( $social['youtube'] ); ?>"><i class="icon-youtube"></i></a></li>
	    <?php endif; ?>
	    
	    <?php if (  ! empty( $social['vimeo'] ) ) : ?>
	        <li class="vimeo"><a href="<?php echo esc_url( $social['vimeo'] ); ?>"><i class="icon-vimeo"></i></a></li>
	    <?php endif; ?>
	    
	    <?php if (  ! empty( $social['skype'] ) ) : ?>
	        <li class="skype"><a href="skype:<?php echo esc_url( $social['skype'] ); ?>?call"><i class="icon-skype"></i></a></li>
	    <?php endif; ?>
	</ul>
</div>