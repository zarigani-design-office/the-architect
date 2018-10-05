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

	<main id="main" class="site-main page-main archive-works">

		<?php 

		
		?>

		<header class="page-header">

			<h1 class="basic-ttl post-list-ttl">
				<?php
				echo esc_html( '<span>「' . get_search_query() . '」の検索結果</span>' ) ;
				?>
			</h1>
		</header><!-- .page-header -->

		<div class="post-lists">
			<?php
			if( have_posts() ):

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

			endif;

			?>
		</div>
		<?php the_posts_navigation();?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
