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
                    <div>
                        <h2 class="text-h3">
                            <?php echo the_field('subtitulo_h2');?>
                        </h2>
					</div>
                    
                    <div class="divider aligncenter"></div>
                    
                    <?php if ( has_excerpt() ) {
                        echo '<strong>'; the_excerpt(); echo '</strong>';
                    } else { echo ''; } ?>                 
                    
                    <div class="entry-meta center-xs">
                        <?php
                            coiiar_posted_category();
                            coiiar_posted_tag();
                            coiiar_posted_on();
                        ?>
                    </div><!-- .entry-meta -->  
                </div>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</section>

