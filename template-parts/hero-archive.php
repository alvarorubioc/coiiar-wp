<header id="hero">
    <div class="container">
        <div class="row">
            
            <div class="col-xs-12 col-md-7">
                <div class="entry-title">
                    <span class="text-h6">Noticias</span>
                    <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
                    <div class="divider"></div>
                    <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
                </div>
            </div>

            <div class="col-xs-12 col-md-5 img-hero end-sm">                
                <div class="post-thumbnail">
                    <?php // get the current taxonomy term
                        $tax = get_queried_object();
                        // vars
                        $image = get_field('archive_image', $tax);
                    ?>
                    <img src="<?php echo $image; ?>" alt="<?php the_archive_title(); ?>">
                </div>   
            </div>

        </div><!-- .row -->
    </div><!-- .container -->
</header>