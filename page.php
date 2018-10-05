<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package the_architect
 */

get_header();
?>

	<div id="primary" class="content-area">
		<?php
		$this_post_type = get_post_type();
		if( 'page' === $this_post_type ):
		?>
		<main id="main" class="site-main single-main">
			<header>
				<h1 class="page-ttl single-ttl"><?php the_title(); ?></h1>
			</header>
			<?php else:?>
			<main id="main" class="site-main">
				<?php endif;?>
				<?php

				while ( have_posts() ) :
				the_post();

				$this_post_id = get_the_ID( $post );
				get_template_part( 'template-parts/content', '' );


				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;

				endwhile; // End of the loop.


				?>

			</main><!-- #main -->
	</div><!-- #primary -->
		<script defer>
			jQuery(function($) {
				$( '.gallery, .wp-block-gallery' ).each( function(){
					$(this).slick( {
						arrows: true,
						dots: true,
						infinite: true,
						fade: true,
						autoplay: true,
						autoplaySpeed: 1800,
						speed: 1800,
						adaptiveHeight: true,
						easing: 'ease-in-out',
						pauseOnFocus: false,
						pauseOnHover : false,
						prevArrow : '<button type="button" class="slick-prev"></button>',
						nextArrow : '<button type="button" class="slick-next"></button>'
					} );
				} )
			} )
		</script>
<?php
get_sidebar();
get_footer();
