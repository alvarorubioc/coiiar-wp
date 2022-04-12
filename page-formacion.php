<?php
/**
 * The template for displaying a loop with CPT formacion
 * 
 * Template name: Formacion
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
            get_template_part( 'template-parts/hero/hero' );
            get_template_part( 'template-parts/filters', 'formacion' );
            get_template_part( 'template-parts/content', 'page' );
            get_template_part( 'template-parts/section', 'formacion' ); 
            
        ?>
            <section class="mt-4 pt-4 pb-3 bg-primary-light" id="formaciones">	
                <div class="container">
                    <div class="mb-2"><p class="text-h3"><strong><?php esc_html_e( 'Todos los cursos y formaciones', 'coiiar' ); ?></strong></p></div>
                    <div class="row">
                    <?php
                        $args = array(
                            'post_type' => 'formacion',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order'   => 'DESC',
                        );
                        // The Query
                        $the_query = new WP_Query( $args );
                        
                        // The Loop
                        if ( $the_query->have_posts() ) {
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                
                                get_template_part( 'template-parts/loop', 'formacion' );
                            }
                        /* Restore original Post Data */
                        wp_reset_postdata(); } ?>
                    </div>
                </div>
            </section> 

        <?php    

        endwhile; // End of the loop.

        ?>
        
		
		<?php get_template_part( 'template-parts/related', 'news' ); ?>
	
	</main><!-- #main -->

<?php
get_footer();
