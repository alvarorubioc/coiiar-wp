<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coiiar
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'coiiar' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row middle-xs">
				<div class="site-branding col-xs-6 col-md-3">
					<?php the_custom_logo(); ?>
				</div><!-- .site-branding -->
				<div class="site-search col-xs-6 col-md-5">
					<?php get_search_form(); ?>
				</div><!-- .site-search -->
				<div class="site-links col-xs-6 col-md-4 end-xs">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'top-menu',
						)
					);
				?>
				</div><!-- .site-links -->
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'coiiar' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
