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

	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'coiiar-navigation', get_template_directory_uri() . '/assets/js/coiiar.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'coiiar_scripts' );


// Load modal script
function load_javascript_file() {
	wp_register_script('modal', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', 'jquery', '', true);
	wp_enqueue_script('modal');	
	}

add_action('wp_enqueue_scripts', 'load_javascript_file' );

/** 
* Gutenberg scripts and styles
 */
function coiiar_gutenberg_scripts() {

	wp_enqueue_script(
		'be-editor', 
		get_stylesheet_directory_uri() . '/assets/js/editor.js', 
		array( 'wp-blocks', 'wp-dom' ), 
		filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'coiiar_gutenberg_scripts' );