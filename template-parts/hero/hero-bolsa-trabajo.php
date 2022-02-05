<?php if(is_post_type_archive('bolsa-trabajo')) : ?>
    <section id="hero">
        <div class="container">
            <div class="row middle-xs">
                <div class="col-xs-12 col-sm-7">
                    <div class="entry-title">
                        <div class="breadcrumbs mb-1" typeof="BreadcrumbList" vocab="https://schema.org/">
                            <?php if(function_exists('bcn_display'))
                                {
                                    bcn_display();
                                }
                            ?>
                        </div>
                        <h1 class="page-title"><?php esc_html_e( 'Bolsa de trabajo', 'coiiar' ); ?></h1>
                        <div class="divider"></div>
                        <div class="archive-description">
                            <strong><?php esc_html_e( 'Actualmente disponemos de una oferta de 60 puestos de trabajo', 'coiiar' ); ?></strong>
                            <h4 class="mt-2"><?php esc_html_e( '¿Eres una empresa y deseas publicar una oferta?', 'coiiar' ); ?></h4>
                            <a class="hero-link" href="#publicar-oferta" target="_self"><?php esc_html_e( 'Ir a formulario', 'coiiar' ); ?></a>
                        </div>
                    </div>
                </div>
             
                <div class="col-xs-12 col-sm-5 end-sm">                
                    <?php
                        if (get_field('archive_image') ) {
                            $tax = get_queried_object();
                            // vars
                            $image = get_field('archive_image', $tax);

                            echo '<div class="post-thumbnail">';
                            echo '<img src=" '. $image .'" alt=" '.the_archive_title().' ">';
                            echo '</div>';
                        }
                        else 
                            echo '<img src=" '.get_template_directory_uri().'/assets/img/img-archive.png" alt="lorem">';
                    ?>  
                </div> 
            </div><!-- .row -->
        </div><!-- .container -->
    </section>           
                
<?php elseif (is_tax() ) :?>
    <section id="hero">
        <div class="container">
            <div class="row middle-xs">
                <div class="col-xs-12 col-sm-7">
                    <div class="entry-title">
                        <div class="breadcrumbs mb-1" typeof="BreadcrumbList" vocab="https://schema.org/">
                            <?php if(function_exists('bcn_display'))
                                {
                                    bcn_display();
                                }
                            ?>
                        </div>
                        <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
                        <div class="divider"></div>
                        <?php the_archive_description( '<div class="archive-description"><strong>', '</strong></div>' ); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 end-sm">                
                    <?php
                        if (get_field('archive_image') ) {
                            $tax = get_queried_object();
                            // vars
                            $image = get_field('archive_image', $tax);

                            echo '<div class="post-thumbnail">';
                            echo '<img src=" '. $image .'" alt=" '.the_archive_title().' ">';
                            echo '</div>';
                        }
                        else 
                            echo '<img src=" '.get_template_directory_uri().'/assets/img/img-archive.png" alt="lorem">';
                    ?>  
                </div> 
            </div><!-- .row -->
        </div><!-- .container -->
    </section>  

<?php elseif (is_single() ) :?>
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1 center-xs">
                    <div class="entry-title">
                        <div class="breadcrumbs mb-1" typeof="BreadcrumbList" vocab="https://schema.org/">
                            <?php if(function_exists('bcn_display'))
                                {
                                    bcn_display();
                                }
                            ?>
                        </div>

                        <?php
                        if (get_field('hero_title') ) {
                            $hero_title  = get_field('hero_title');
                            echo '<h1>' .$hero_title. '</h1>';
                        }
                        else
                            echo the_title( '<h1>', '</h1>' );
                        ?>
                        <div class="divider aligncenter"></div>
                        
                        <?php if ( has_excerpt() ) {
                        echo '<strong>'; the_excerpt(); echo '</strong>';
                        } else { echo ''; } ?>  
                        
                        <div class="entry-meta center-xs">
                            <?php $terms = get_the_terms( $post->ID , 'category-sectors' ); 
                                if  ($terms) {
                                    foreach ( $terms as $term ) {
                                    echo '<div class="category-links"><div class="bagde">' . $term->name . ' </div></div>';
                                    }
                                }
                            ?>
                            
                            <?php coiiar_posted_on(); ?>
                            
                            <div class="dflex middle-xs">
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#map-marker" />
                                </svg>
                                <?php $terms = get_the_terms( $post->ID , 'category-location' ); 
                                    if  ($terms) {
                                        foreach ( $terms as $term ) {
                                        echo '<span>' . $term->name . ' </span>';
                                        }
                                    }
                                ?>
                            </div>
                        </div><!-- .entry-meta -->   
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </section>
<?php endif; ?>