<section class="pt-4 pb-5" id="section-actualidad">	
    <div class="container">
        
        <div class="row center-xs">
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
                'posts_per_page' => 4,
				'orderby' => 'date',
                'order'   => 'DESC',
                'category__not_in' => 4,
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
        </div>
    </div>
</section>       