<?php
/**
Template Name: About
*/

get_header();
?>

	<div id="primary" class="content-area about">
		<?php
		if ( class_exists( 'Smart_Custom_Fields' ) ):
		$about_custom_fields = SCF::get_option_meta( 'theme-options' );
		?>
		

		<main id="main" class="site-main page-main page-about">
	
		
			<section class="about-section about-about-us">
				<h1 class="basic-ttl">
					<?php echo esc_html( $about_custom_fields[ 'company-about-title' ] );?>
				</h1>
				<div class="about-section-block">
					<div class="about-section-image">
						<?php
						echo wp_get_attachment_image( $about_custom_fields[ 'company-about-image' ] , 'large', false );
						?>
					</div>
					<div class="about-section-text wysiwyg">
						<?php echo apply_filters( 'the_content', $about_custom_fields[ 'company-about-text' ] );?>
					</div>
				</div>
			</section>
			
			<section class="about-section about-concept">
				<h1 class="basic-ttl">
					<?php echo $about_custom_fields[ 'company-concept-title' ];?>
				</h1>
				<div class="about-section-block">
					<div class="about-section-image">
						<?php
						echo wp_get_attachment_image( $about_custom_fields[ 'company-concept-image' ] , 'large', false );
						?>
					</div>
					<div class="about-section-text wysiwyg">
						<?php echo apply_filters( 'the_content', $about_custom_fields[ 'company-concept-text' ] );?>
					</div>
				</div>
			</section>
			
			<section class="about-section about-company">
				<h1 class="basic-ttl">
					<?php echo esc_html( $about_custom_fields[ 'company-info-title' ] );?>
				</h1>
				<div class="about-section-block">
					<table class="about-section-company-info-wrapper">
						<tbody>
							<?php if( !empty( $about_custom_fields[ 'company-info-name' ] ) ):?>
							<tr class="about-section-company-info-list">
								<th>
									会社名：
								</th>
								<td>
									<?php echo esc_html( $about_custom_fields[ 'company-info-name' ] );?>
								</td>
							</tr>
							<?php endif;?>
							<?php if( !empty( $about_custom_fields[ 'company-info-address' ] ) ):?>
							<tr class="about-section-company-info-list">
								<th>
									所在地：
								</th>
								<td>
									<?php echo esc_html( $about_custom_fields[ 'company-info-address' ] );?>
								</td>
							</tr>
							<?php endif;?>
							<?php if( !empty( $about_custom_fields[ 'company-info-tel' ] ) ):?>
							<tr class="about-section-company-info-list">
								<th>
									TEL：
								</th>
								<td>
									<?php echo esc_html( $about_custom_fields[ 'company-info-tel' ] );?>
								</td>
							</tr>
							<?php endif;?>
							<?php 
							if( !empty( $about_custom_fields[ 'about-items-cf' ][ 0 ][ 'company-info-item-name' ] ) ):
              foreach( $about_custom_fields[ 'about-items-cf' ] as $about_extra_info ): 
							?>
							<tr class="about-section-company-info-list">
								<th>
									<?php echo esc_html( $about_extra_info[ 'company-info-item-name' ] )?>：
								</th>
								<td>
									<?php echo esc_html( $about_extra_info[ 'company-info-item-text' ] )?>
								</td>
							</tr>
							<?php
							endforeach;
							endif;
							?>
						</tbody>
					</table>
					<div class="about-section-company-map">
						<iframe src="<?php echo esc_url( $about_custom_fields[ 'company-info-map' ] );?>" frameborder="0"></iframe>
						
					</div>
				</div>
			</section>
		
		</main><!-- #main -->
		<?php endif;?>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
