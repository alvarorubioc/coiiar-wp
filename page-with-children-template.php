<?php
/**
 * The template for displaying parent page with children
 * 
 * Template name: Página con hijas
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

            get_template_part( 'template-parts/hero/hero' ); ?>

            <section class="pt-4 pb-3 bg-primary-light">	
                <div class="container">
                    
                    <div class="row">
                    <?php
                        $args = array(
                            'post_type' => 'page',
                            'posts_per_page' => -1,
                            'post_parent'   =>$post->ID,
                            'orderby' => 'date',
                            'order'   => 'ASC',
                        );
                        // The Query
                        $the_query = new WP_Query( $args );
                        
                        // The Loop
                        if ( $the_query->have_posts() ) {
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                
                                get_template_part( 'template-parts/loop', 'servicios' );
                            }
                        /* Restore original Post Data */
                        wp_reset_postdata(); } ?>
                    </div>
                </div>
            </section>  
            

			<?php get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
