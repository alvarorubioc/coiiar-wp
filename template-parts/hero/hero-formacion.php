<?php if (is_tax() ) :?>
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
            <div class="col-xs-12 col-md-7">
                <div class="entry-title">
                    <div class="breadcrumbs mb-1" typeof="BreadcrumbList" vocab="https://schema.org/">
                        <?php if(function_exists('bcn_display'))
                            {
                                bcn_display();
                            }
                        ?>
                    </div>
                    <?php echo the_title( '<h1>', '</h1>' ); ?>
                
                    <div class="divider"></div>             
                    <div class="mb-3"><strong><?php echo the_excerpt(); ?></strong></div>

                    <?php 
                        $link_1 = get_field('hero_link_1');
                        $link_2 = get_field('hero_link_2');
                        if( $link_1 ): 
                            $link_url = $link_1['url'];
                            $link_title = $link_1['title'];
                            $link_target = $link_1['target'] ? $link_1['target'] : '_self';
                            ?>
                            <a class="hero-link btn btn--primary btn--md" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif;

                        if( $link_2 ): 
                            $link_url = $link_2['url'];
                            $link_title = $link_2['title'];
                            $link_target = $link_2['target'] ? $link_2['target'] : '_self';
                            ?>
                                <a class="hero-link pl-2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div> <!-- .entry-title -->  
            </div>

            <div class="col-xs-12 col-md-5">
                <?php if ( ! ( $post->post_password && post_password_required() ) )
                    if ( has_post_thumbnail() ) {
                        echo '<div class="post-thumbnail">';
                            the_post_thumbnail('full');
                        echo'<div class="photo-line"></div></div>';
                    }   
                ?>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</section>
<?php endif; ?>