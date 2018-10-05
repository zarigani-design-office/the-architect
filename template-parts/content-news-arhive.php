<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package the_architect
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<figure class="entry-thumb">
		<?php the_architect_post_thumbnail( array(272,181) )?>
		
	</figure>
	<header class="entry-header">
		<h1 class="entry-title">
			<a href="<?php the_permalink()?>"><?php the_title() ?></a>
		</h1>
		
		<?php ?>
	</header><!-- .entry-header -->

	
</article><!-- #post-<?php the_ID(); ?> -->
