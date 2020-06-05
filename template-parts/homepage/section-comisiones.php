<section class="bg-primary-light pt-5 pb-5" id="section-comisiones">	
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-5 pb-3">
                <h2><?php esc_html_e( 'Comisiones de trabajo y colaboraciones', 'coiiar' ); ?></h2>
                <p><?php esc_html_e( 'Desde COIIAR te ayudamos a conectar y crear sinergias que harán crecer tu empresa o negocio.', 'coiiar' ); ?></p>
                <a class="btn btn--secondary btn--lg"><?php esc_html_e( 'Ver todas las comisiones', 'coiiar' ); ?></a>
            </div>
		<?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
<<<<<<< HEAD
                'category_name'  => 'comision',
=======
                'category_name'  => 'comisiones',
>>>>>>> b7a037c74cfe691635770b98a1fd65989b46665f
				'orderby' => 'date',
                'order'   => 'DESC',
            );
            // The Query
            $the_query = new WP_Query( $args );
            
            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
                    <div class="col-xs-12 col-md-6 col-md-offset-1">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="card--horizontal">  
                                <div class="card-img">
<<<<<<< HEAD
                                    <?php coiiar_post_thumbnail('full'); ?> 
                                </div>
                                <div class="card-content">
                                    <div class="text-caption">
                                        <?php $terms = get_the_terms( $post->ID , 'category' ); 
                                            if  ($terms) {
                                                foreach ( $terms as $term ) {
                                                echo '<span> ' . $term->name . '</span>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <h3 class="text-h5"><?php the_title(); ?></h3>
                                    </a>
=======
                                    <?php coiiar_post_thumbnail('img-card'); ?> 
                                </div>
                                <div class="card-content">
                                    <?php $terms = get_the_terms( $post->ID , 'category' ); 
                                        if  ($terms) {
                                            foreach ( $terms as $term ) {
                                            echo '<div class="text-caption">' . $term->name . '</div>';
                                            }
                                        }
                                    ?>
                                    <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <h3 class="text-h5"><?php the_title(); ?></h3>
                                    </a>
                                    <p><?php echo get_the_excerpt() ;?></p>
>>>>>>> b7a037c74cfe691635770b98a1fd65989b46665f
                                </div> 
                            </div>
                        </article>
                    </div>
                <?php }
            /* Restore original Post Data */
            wp_reset_postdata(); } ?>
        </div>
    </div>
</section>    