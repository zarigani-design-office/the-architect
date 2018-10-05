<?php
/**
 * The template for displaying archive pages
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
	
	<main id="main" class="site-main page-main archive-news">


		<header class="page-header">

			<h1 class="basic-ttl news-list-ttl">
				<?php 
				echo esc_html( $custom_fields[ 'name-news' ] );
				?>
			</h1>
		</header><!-- .page-header -->

			<ul class="post-news-lists">
			<?php
				while ( have_posts() ) :
				the_post();
			?>
				<li>
					<a href="<?php the_permalink()?>">
						<time class="post-news-lists-time" datetime="<?php the_date( 'Y-m-d' ) ?>">
							<?php echo get_the_date();?>
						</time>
						<span class="post-news-lists-title"><?php the_title() ?></span>
					</a>
				</li>
				<!-- #post--->
			<?php
				endwhile;
			?>
			
			</ul>
			<?php the_posts_navigation();?>


	</main><!-- #main -->
	<?php endif;?>
</div>
	<!-- #primary -->

<?php
get_sidebar();
get_footer();
