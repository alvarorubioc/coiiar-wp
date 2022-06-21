<?php
/**
 * coiiar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package coiiar
 */

/**
 * Sets up theme defaults and registers support for various WordPress features
 */
require get_template_directory() . '/inc/theme-support.php';

/**
 * Enqueue Scripts.
 */
require get_template_directory() . '/inc/enqueue-scripts.php';

/**
 * Implement the Gutenberg styles and support.
 */
require get_template_directory() . '/inc/gutenberg-support.php';

/**
 *  Register widget areas
 */
require get_template_directory().'/inc/widgets.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Register Custom Post Type
 */
require get_template_directory() . '/inc/custom-post-type.php';

