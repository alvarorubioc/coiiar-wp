<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function coiiar_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'coiiar' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'coiiar' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
    );
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Top', 'coiiar' ),
			'id'            => 'footer-top',
			'description'   => esc_html__( 'Add widgets here.', 'coiiar' ),
			'before_widget' => '<div id="%1$s" class="col-xs-6 col-md %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title text-h5">',
			'after_title'   => '</p>',
		)
    );
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Middle', 'coiiar' ),
			'id'            => 'footer-middle',
			'description'   => esc_html__( 'Add widgets here.', 'coiiar' ),
			'before_widget' => '<div id="%1$s" class="col-xs-12 col-md-6 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="widget-title text-h4">',
			'after_title'   => '</span>',
		)
    );
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Bottom', 'coiiar' ),
			'id'            => 'footer-bottom',
			'description'   => esc_html__( 'Add widgets here.', 'coiiar' ),
			'before_widget' => '<div id="%1$s" class="col-xs-12 col-md widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="widget-title text-h5">',
			'after_title'   => '</span>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'CTA img', 'coiiar' ),
			'id'            => 'cta-img',
			'description'   => esc_html__( 'Add widgets here.', 'coiiar' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="widget-title text-h5">',
			'after_title'   => '</span>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'CTA texts', 'coiiar' ),
			'id'            => 'cta-text',
			'description'   => esc_html__( 'Add widgets here.', 'coiiar' ),
			'before_widget' => '<div id="%1$s" class="mb-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="widget-title text-h5">',
			'after_title'   => '</span>',
		)
	);
}
add_action( 'widgets_init', 'coiiar_widgets_init' );