<?php
/**
 * The template for displaying blog archive pages
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
	$works_fields = SCF::get_option_meta( 'theme-options' );
	?>

	<main id="main" class="site-main page-main archive-post">

		<header class="page-header">

			<h1 class="basic-ttl post-list-ttl">
				<?php 
				$this_post_type = get_post_type();
				//echo $this_post_type;
				if( 'post' === $this_post_type ){
					echo esc_html( $works_fields[ 'name-blog' ] );
				}else{
					the_archive_title();
				}
				
				?>
			</h1>
		</header><!-- .page-header -->

		<div class="post-lists">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
			/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
			get_template_part( 'template-parts/content', 'archive' );

			endwhile;

			?>
		</div>
		<?php the_posts_navigation();?>

	</main><!-- #main -->
	<?php endif;?>
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
