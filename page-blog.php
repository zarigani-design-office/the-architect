<?php
/**
Template Name: Blog
*/

get_header();
?>

	<div id="primary" class="content-area ">
		<?php
		if ( class_exists( 'Smart_Custom_Fields' ) ):
		$works_fields = SCF::get_option_meta( 'theme-options' );
		?>
		
		<main id="main" class="site-main page-main archive-works">

		<?php 
			$blog_query_arg = array(
				'post_type' => 'post',
			);
			$blog_query = new WP_Query( $blog_query_arg );
			if( $blog_query -> have_posts() ):
			
		?>

			<header class="page-header">

				<h1 class="basic-ttl post-list-ttl">
					<?php 
					echo esc_html( $works_fields[ 'name-blog' ] );
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="post-lists">
			<?php
				/* Start the Loop */
				while ( $blog_query -> have_posts() ) :
				$blog_query -> the_post();
					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'archive' );
				
				endwhile;
				
				
				
				
				else :
				
					get_template_part( 'template-parts/content', 'none' );
				
				endif;
				
				?>
			</div>
			<?php the_posts_navigation();?>

		</main><!-- #main -->
		<?php endif;?>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
