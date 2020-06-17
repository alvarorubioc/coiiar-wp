<section id="hero">
    <div class="container">
        <div class="row">
            
            <div class="col-xs-12 col-md-10 col-md-offset-1 center-xs">
                <div class="entry-title">
                    <span class="text-h6"><?php esc_html_e( 'Noticias', 'coiiar' ); ?></span>

                    <?php
                    if (get_field('hero_title') ) {
                        $hero_title  = get_field('hero_title');
                        echo '<h1>' .$hero_title. '</h1>';
                    }
                    else
                        echo the_title( '<h1>', '</h1>' );
                    ?>
                    <div class="divider aligncenter"></div>
                    
                    <p><strong><?php echo the_excerpt(); ?></strong></p>
                    
                    
                    <div class="entry-meta center-xs">
                        <?php
                            coiiar_posted_category();
                            coiiar_posted_tag();
                            coiiar_posted_on();
                            coiiar_posted_by();
                        ?>
                    </div><!-- .entry-meta -->  
                </div>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</section>

