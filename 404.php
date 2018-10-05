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

		<main id="main" class="site-main page-main site-404">
			<header>
				<h1 class="page-ttl single-ttl">404 NOT FOUND</h1>
			</header>

			<main id="main" class="site-main">
				<div class="entry-content">
					<p class="ttl-404">
						お探しのページは削除されたか、URLが変更になった可能性がございます。
					</p>
				</div>
			</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
