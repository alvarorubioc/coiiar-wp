<?php


if ( ! function_exists( 'coiiar_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function coiiar_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on coiiar, use a find and replace
		 * to change 'coiiar' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'coiiar', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support( 'post-thumbnails' );
        
        // Default thumbnail size
		add_image_size( 'img-card', 360, 180, true );

<<<<<<< HEAD

		// This theme uses wp_nav_menu() in two location.
=======
		// This theme uses wp_nav_menu() in one location.
>>>>>>> b7a037c74cfe691635770b98a1fd65989b46665f
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'coiiar' ),
			)
		);

		register_nav_menus(
			array(
<<<<<<< HEAD
				'menu-2' => esc_html__( 'Top menu', 'coiiar' ),
			)
		);

		
		// Add icons to topbar menu
		add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

			function my_wp_nav_menu_objects( $items, $args ) {
				
				// loop
				foreach( $items as &$item ) {
					// vars
					$icon = get_field('menu_icon', $item);
					
					// append icon
					if( $icon ) {
						$item->title= '<svg class="icon" width="24" height="24" viewBox="0 0 24 24"><use xlink:href="'.get_template_directory_uri().'/assets/icons/sprite-icons.svg#'.$icon.'"></svg>'.$item->title;
					}
				}
				// return
				return $items;
			}

=======
				'top-menu' => esc_html__( 'Top menu', 'coiiar' ),
			)
		);

>>>>>>> b7a037c74cfe691635770b98a1fd65989b46665f
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'coiiar_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'coiiar_setup' );

// Damos soporte a los Post Formats: Aside, Link, Image, Video y Quote
add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

// Add excerpt to pages
add_post_type_support( 'page', 'excerpt' );