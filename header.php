<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package the_architect
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Muli:400,700" rel="stylesheet"> 
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the_architect' ); ?></a>
  <div class="drawer-bg"></div>
  <button type="button" class="drawer-button">
    <span class="drawer-bar drawer-bar1"></span>
    <span class="drawer-bar drawer-bar2"></span>
    <span class="drawer-bar drawer-bar3"></span>
    <span class="drawer-menu-text drawer-text">MENU</span>
    <span class="drawer-close drawer-text">CLOSE</span>
  </button>
	<header id="masthead" class="site-header">
		

		<nav id="site-navigation" class="main-navigation">
      <div class="site-branding">
        <?php
        the_custom_logo();
        ?>
      </div><!-- .site-branding -->
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
