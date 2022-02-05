<header id="hero">
    <div class="container">
        <div class="row middle-xs">
            
            <div class="col-xs-12 col-md-7">
                
                <?php if ( is_search() ) : ?>                        
                    <div class="entry-title">
                        <span class="text-h6"><?php esc_html_e( 'Buscar', 'coiiar' ); ?></span>
                        <h1><?php printf( esc_html__( 'Resultados encontrados por: %s', 'coiiar' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                        <div class="divider"></div>
                    </div>    
                <?php endif; ?>
                
                <?php if ( is_archive() ) : ?> 
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
                <?php endif; ?>

            </div>

            <div class="col-xs-12 col-md-5 end-sm">                
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
</header>