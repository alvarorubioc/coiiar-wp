<?php 
$cat_related = get_field('related_post_category');
$tax_related = get_field('related_post_tag');
if( $cat_related || $tax_related ): ?>

<section class="pt-4 pb-5 bg-primary-light">
    <div class="container">

        <div class="row mb-2 center-xs">
            <div class="col-xs-12 col-md-7">
                <div class="divider aligncenter"></div>
                <p class="text-h2"><?php esc_html_e( 'Noticias relacionadas', 'coiiar' ); ?></p>
                <p><?php esc_html_e( 'Todo lo que necesitas saber para estar al día en Ingeniería e Industria 4.0.', 'coiiar' ); ?></p>
            </div>
        </div>

        <div class="row grid-blog">
            <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
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
    </div>
</section>

<?php endif; ?>