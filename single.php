<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package the_architect
 */

get_header();
?>

	<div id="primary" class="content-area">
		<?php
		$this_post_type = get_post_type();
		if( 'post' === $this_post_type || 'the_architect_news' === $this_post_type ):
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
				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.


			?>

		</main><!-- #main -->
		<?php 
			if( ! ( 'the_architect_news' === $this_post_type ) ):
		?>
		<div class="other-articles-wrapper">
			<?php
			if ( class_exists( 'Smart_Custom_Fields' ) ):
			$works_fields = SCF::get_option_meta( 'theme-options' );
			?>
			<h1 class="basic-ttl post-list-ttl">
				<?php 
				if( 'the_architect_works' == $this_post_type ){
					echo esc_html( $works_fields[ 'name-works' ] );
				}elseif( 'the_architect_news' == $this_post_type ){
					echo esc_html( $works_fields[ 'name-news' ] );
				}elseif( 'post' == $this_post_type ){
					echo esc_html( $works_fields[ 'name-blog' ] );
				}
				
				?>
			</h1>
			<?php endif;?>
			
			<div class="other-articles post-lists clearfix">
				<?php 
				$other_article_query_arg = array(
					'post_type' => $this_post_type,
					'post__not_in' => array( $this_post_id ),
					'posts_per_page' => 3,
				);
				$other_article_query = new WP_Query($other_article_query_arg);
				if($other_article_query -> have_posts()):
				while($other_article_query -> have_posts()):
				$other_article_query -> the_post();
				get_template_part( 'template-parts/content', 'archive' );
				endwhile;
				endif;
				?>
			</div>
		</div>
		<?php else:?>
		<?php endif;?>
	</div><!-- #primary -->
	<script defer>
		jQuery(function($) {
			$( '.blocks-gallery-item' ).parent().each( function(){
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
