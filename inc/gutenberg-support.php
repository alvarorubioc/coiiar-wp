<?php

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
	
	array(
		'name'  => __( 'Light', 'coiiar' ),
		'slug'  => 'light',
		'color' => '#F7F4F9',
    ), 
) );

// Disables custom colors in block color palette.
add_theme_support( 'disable-custom-colors' );
add_theme_support( 'disable-custom-gradients' );

// Add support for Block Styles.
add_theme_support( 'wp-block-styles' );

// Add support for full and wide align images.
add_theme_support( 'align-wide' );

// Add support for editor styles.
add_theme_support( 'editor-styles' );

// Enqueue editor styles.
add_editor_style( 'style-editor.css' );


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

// Add custom block accordion ACF
function accordion_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'accordion',
			'title' => __('Accordion'),
			'description' => __('Desplegables verticales', 'coiiar'),
			'render_callback' => 'accordion_acf_block_callback',
			'category' => 'theme',
			'icon' => 'list-view',
			'mode' => 'auto',
			'keywords' => array('accordion', 'tabs', 'faqs', 'coiiar'),
		));
	}
}
add_action('acf/init', 'accordion_acf_init');

function accordion_acf_block_callback($block) {
	// convert name ("acf/accordion") into path friendly slug ("accordion")
	$slug = str_replace('acf/', '', $block['name']);

	// include a template part from within the "template-parts/block" folder
	if( file_exists(STYLESHEETPATH . "/template-parts/custom-blocks/accordion.php") ) {
		include( STYLESHEETPATH . "/template-parts/custom-blocks/accordion.php" );
	}
}

// Add custom block Team modal

function team_modal_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'modal',
			'title' => __('Profesor', 'coiiar'),
			'description' => __('Ficha profesor con modal', 'coiiar'),
			'render_callback' => 'team_modal_acf_block_callback',
			'category' => 'design',
			'icon' => 'businesswoman',
			'mode' => 'auto',
			'keywords' => array('team', 'modal', 'profesor', 'acf'),
		));
	}
}
add_action('acf/init', 'team_modal_acf_init');

function team_modal_acf_block_callback($block) {
	// convert name ("acf/pages") into path friendly slug ("pages")
	$slug = str_replace('acf/', '', $block['name']);

	// include a template part from within the "template-parts/block" folder
	if( file_exists(STYLESHEETPATH . "/template-parts/custom-blocks/block-modal.php") ) {
		include( STYLESHEETPATH . "/template-parts/custom-blocks/block-modal.php" );
	}
}

// Add custom block Read More

function read_more_acf_init() {
	if(function_exists('acf_register_block')) {
		acf_register_block(array(
			'name' => 'read-more',
			'title' => __('Leer más', 'coiiar'),
			'description' => __('Botón para mostrar texto oculto', 'coiiar'),
			'render_callback' => 'read_more_acf_block_callback',
			'category' => 'design',
			'icon' => 'text',
			'mode' => 'preview',
			'supports'		=> [
				'customClassName'	=> true,
				'jsx' 			=> true,
			],
			'keywords' => array('Leer', 'más', 'texto', 'acf'),
		));
	}
}
add_action('acf/init', 'read_more_acf_init');

function read_more_acf_block_callback($block) {
	// convert name ("acf/pages") into path friendly slug ("pages")
	$slug = str_replace('acf/', '', $block['name']);

	// include a template part from within the "template-parts/block" folder
	if( file_exists(STYLESHEETPATH . "/template-parts/custom-blocks/read-more.php") ) {
		include( STYLESHEETPATH . "/template-parts/custom-blocks/read-more.php" );
	}
}