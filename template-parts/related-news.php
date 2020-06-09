<?php 
$cat_related = get_field('related_post_category');
$tax_related = get_field('related_post_tag');
if( $cat_related || $tax_related ): ?>

<section class="pt-4 pb-5 bg-primary-light">
    <div class="container">

        <div class="row mb-2 center-xs">
            <div class="col-xs-12 col-md-7">
                <div class="divider aligncenter"></div>
                <h2>Actualidad y noticias del Colegio Industrial de Ingenieros</h2>
                <p>Todo lo que necesitas saber para estar al día en Ingeniería e Industria 4.0.</p>
            </div>
        </div>

        <div class="row grid-blog">
            <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order'   => 'DESC',
                        'tax_query' => array(
                            'relation' => 'OR',
                            array(
                              'taxonomy' => 'post_tag',
                              'terms' => $tax_related,
                            ),
                            array(
                              'taxonomy' => 'category',
                              'terms' => $cat_related,
                            ),
                        ),
                    );
                    // The Query
                    $the_query = new WP_Query( $args );
                    
                    // The Loop
                    if ( $the_query->have_posts() ) {
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            
                            get_template_part( 'template-parts/loop', get_post_format() );
                        }
                    /* Restore original Post Data */
                    wp_reset_postdata(); } ?>
        </div>

        <div class="row mt-3 center-xs">
            <a class="btn btn--secondary btn--lg"><?php esc_html_e( 'Ver todas las noticias', 'coiiar' ); ?></a>
            <a
                href="<?php echo esc_url( get_term_link( $cat_related ) ); ?>"><?php esc_html_e( 'Ver todas las noticias', 'coiiar' ); ?>'<?php echo esc_html( $cat_related->name ); ?>'</a>
        </div>
    </div>
</section>



<?php endif; ?>