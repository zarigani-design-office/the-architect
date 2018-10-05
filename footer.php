<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package the_architect
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-wrapper">
			<div class="footer-logo">
				<?php
				the_custom_logo();
				?>
			</div>
			<div class="footer-company">
				<?php
				if ( class_exists( 'Smart_Custom_Fields' ) ):
					$footer_custom_fields = SCF::get_option_meta( 'theme-options' );
					if( !empty( $footer_custom_fields['company-info-address'] ) ):
				?>
				<address class="footer-company-address">
					<?php echo esc_html( $footer_custom_fields['company-info-address'] );?>
				</address>
				<?php 
					endif;//empty
				endif;//if class exist
				?>
				<?php
				if ( class_exists( 'Smart_Custom_Fields' ) ):
				$footer_custom_fields = SCF::get_option_meta( 'theme-options' );
				if( !empty( $footer_custom_fields['company-info-address'] ) ):
				?>
				<p class="footer-company-tel">
					<?php echo	esc_html( $footer_custom_fields['company-info-tel'] );?>
				</p>
				<?php 
				endif;//empty
				endif;//if class exist
				?>
			</div>
			<div class="footter-sns-area">
				<?php
				if ( class_exists( 'Smart_Custom_Fields' ) ):
				$footer_custom_fields = SCF::get_option_meta( 'theme-options' );
				?>
				<div class="footer-sns-wrapper">
					<ul class="sns-list">
						<?php if( !empty( $footer_custom_fields['sns-facebook'] ) ):?>
						<li>
							<a href="<?php echo esc_html( $footer_custom_fields['sns-facebook'])?>" target="_blank">
								<img src="<?php echo get_template_directory_uri()?>/img/icon_fb.svg" alt="Facebook" width="25" height="25">
							</a>
						</li>
						<?php endif;?>
						<?php if( !empty( $footer_custom_fields['sns-twitter'] ) ):?>
						<li>
							<a href="<?php echo esc_html( $footer_custom_fields['sns-twitter'])?>" target="_blank">
								<img src="<?php echo get_template_directory_uri()?>/img/icon_tw.svg" alt="Twitter" width="25" height="25">
							</a>
						</li>
						<?php endif;?>
						<?php if( !empty( $footer_custom_fields['sns-instagram'] ) ):?>
						<li>
							<a href="<?php echo esc_html( $footer_custom_fields['sns-instagram'])?>" target="_blank">
								<img src="<?php echo get_template_directory_uri()?>/img/icon_insta.svg" alt="Instagram" width="25" height="25">
							</a>
						</li>
						<?php endif;?>
					</ul>
				</div>
				<?php 
				endif;//if class exist
				?>
			</div>
			<?php if( !empty( $footer_custom_fields['footer-copyright'] ) ):?>
			
			<?php endif;?>
		</div>
		<p class="copyright">
			<?php echo esc_html( $footer_custom_fields['footer-copyright'])?>
		</p>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
