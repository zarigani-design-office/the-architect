<?php
/**
 * The template for displaying works archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package the_architect
 */

get_header();
?>

	<div id="primary" class="content-area ">
		<?php
		if ( class_exists( 'Smart_Custom_Fields' ) ):
		$custom_fields = SCF::get_option_meta( 'theme-options' );
		?>
			<main id="main" class="site-main page-main archive-works">
				<header class="page-header">
					<h1 class="basic-ttl post-list-ttl">
						<?php 
						echo esc_html( $custom_fields[ 'name-works' ] );
					?>
					</h1>
				</header>
				<!-- .page-header -->

				<div class="post-lists">
					<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'archive' );				
				endwhile;
				?>
				</div>
				<?php the_posts_navigation();?>
			</main>
			<!-- #main -->
		<?php endif;?>
	</div>
	<!-- #primary -->

	<?php
get_sidebar();
get_footer();