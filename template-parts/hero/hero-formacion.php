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
            <div class="col-xs-12 mt-4">
                <div class="breadcrumbs mb-1" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php if(function_exists('bcn_display'))
                        {
                            bcn_display();
                        }
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-md-7">
                <div class="entry-title pt-4">
                    
                    <?php echo the_title( '<h1>', '</h1>' ); ?>
                
                    <div class="divider"></div>             
                    <div class="mb-3"><strong><?php echo the_excerpt(); ?></strong></div>

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