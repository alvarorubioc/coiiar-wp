<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package coiiar
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function coiiar_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'coiiar_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function coiiar_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'coiiar_pingback_header' );


function related_events() {
    global $post;
 
    $custom_taxterms = wp_get_object_terms( $post->ID, 'category-events', array('fields' => 'ids') );
 
        $args = array(
            'post_type' => 'agenda',
            'post_status' => 'publish',
            'posts_per_page' => 3, // you may edit this number
            'orderby' => 'rand',
            'post__not_in' => array ( $post->ID ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'category-events',
                    'field' => 'id',
                    'terms' => $custom_taxterms
                )
            )
        );
        $related_items = new WP_Query( $args );
        // loop over query
        if ( $related_items->have_posts() ) : ?>

        <section class="pt-4 pb-5 bg-primary-light">
            <div class="container">
                <div class="row mb-2 center-xs">
                    <div class="col-xs-12 col-md-7">
                        <div class="divider aligncenter"></div>
                        <p class="text-h2"><?php esc_html_e( 'Eventos relacionados', 'coiiar' ); ?></p>
                    </div>
                </div>
                <div class="row">
                <?php while ( $related_items->have_posts() ) : $related_items->the_post();
                    get_template_part( 'template-parts/loop', 'agenda' );
                endwhile; ?>
                </div>
            </div>
        </section>    
 
        <?php endif;
        // Reset Post Data
        wp_reset_postdata();
 
}

