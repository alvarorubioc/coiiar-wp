<?php
/**
 * Enqueue scripts and styles.
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '2.0.0' );
}

function coiiar_scripts() {
	wp_enqueue_style( 'coiiar-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script( 'coiiar-navigation', get_template_directory_uri() . '/assets/js/coiiar.min.js', array(), _S_VERSION, true );
	
	//wp_enqueue_script( 'coiiar-navigation', get_template_directory_uri() . '/dev/js/navigation.js', array(), _S_VERSION, true );

	//wp_enqueue_script( 'coiiar-skip-link-focus-fix', get_template_directory_uri() . '/dev/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'coiiar_scripts' );