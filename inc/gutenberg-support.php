<?php

/**
 * Register support for Gutenberg wide images in your theme
 */
function aling_wide_img() {
	add_theme_support( 'align-wide' );
  }
  add_action( 'after_setup_theme', 'aling_wide_img' );


// Adds support for editor color palette.
add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Primary', 'coiiar' ),
		'slug'  => 'primary',
		'color'	=> '#663399',
	),
	array(
		'name'  => __( 'Secondary', 'coiiar' ),
		'slug'  => 'secondary',
		'color' => '#c2185b',
	),
	array(
		'name'  => __( 'Dark', 'coiiar' ),
		'slug'  => 'dark',
		'color' => '#320055',
	   ),
	array(
		'name'  => __( 'White', 'coiiar' ),
		'slug'  => 'white',
		'color' => '#FFFFFF',
    ),   
) );

// Disables custom colors in block color palette.
add_theme_support( 'disable-custom-colors' );


/**
 * Add inline css editor width
 */
add_action('admin_head', 'editor_full_width_gutenberg');

function editor_full_width_gutenberg() {
  echo '<style>
    body.gutenberg-editor-page .editor-post-title__block, body.gutenberg-editor-page .editor-default-block-appender, body.gutenberg-editor-page .editor-block-list__block {
		max-width: none !important;
	}
    .block-editor__container .wp-block {
        max-width: none !important;
    }
  </style>';
}

/**
 * Custom Gutenberg blocks
 */


function custom_block_cta_card() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a CTA card block
		acf_register_block(array(
			'name'				=> 'cta-card',
			'title'				=> __('CTA Card'),
			'description'		=> __('Un card CTA.'),
			'render_callback'	=> 'block_cta_card_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'megaphone',
			'mode'				=> 'auto',
			'keywords'			=> array( 'card', 'cta' ),
		));
	}
}
add_action('acf/init', 'custom_block_cta_card');

function block_cta_card_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/custom-blocks/cta-card.php") ) ) {
		include( get_theme_file_path("/template-parts/custom-blocks/cta-card.php") );
	}
}


function custom_block_card() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a CTA card block
		acf_register_block(array(
			'name'				=> 'card',
			'title'				=> __('Card'),
			'description'		=> __('Un card.'),
			'render_callback'	=> 'block_card_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'megaphone',
			'mode'				=> 'auto',
			'keywords'			=> array( 'card', 'cta' ),
		));
	}
}
add_action('acf/init', 'custom_block_card');

function block_card_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/custom-blocks/card.php") ) ) {
		include( get_theme_file_path("/template-parts/custom-blocks/card.php") );
	}
}