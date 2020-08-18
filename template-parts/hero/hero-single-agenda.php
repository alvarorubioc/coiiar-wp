<section id="hero">
    <div class="container">
        <div class="row">
            
            <div class="col-xs-12 col-md-7">
                <div class="entry-title">
                    <?php $terms = get_the_terms( $post->ID , 'events-category' ); 
					if  ($terms) {
						foreach ( $terms as $term ) {
						echo '<span class="text-h6">' . $term->name . '</span>';
						}
					}
				    ?>

                    <?php
                    if (get_field('hero_title') ) {
                        $hero_title  = get_field('hero_title');
                        echo '<h1>' .$hero_title. '</h1>';
                    }
                    else
                        echo the_title( '<h1>', '</h1>' );
                    ?>

                    <div class="divider"></div>

                    <p><strong><?php the_field('event_extra_info');?></strong></p>

                    <div class="entry-meta mt-2">
                        <div><span class="card-img__tag bagde"><?php the_field('event_tag');?></span></div>
                    
                        <div class="dflex middle-xs">
                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#map-marker" />
                            </svg>
                            <span><?php the_field('event_place');?></span>
                        </div>
                        <div class="dflex middle-xs">
                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#calendar" />
                            </svg>
                            <span><?php esc_html_e( 'Del ', 'coiiar' ); ?><?php the_field('event_start_date');?></span>
                            <span><?php esc_html_e( '&nbsp;al ', 'coiiar' ); ?><?php the_field('event_start_date');?></span>
                        </div>
                    </div><!-- .entry-meta -->  
                </div>
            </div>
            <div class="col-xs-12 col-md-5 img-hero end-sm">                
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>    
            </div>
        </div><!-- .row -->
        
    </div><!-- .container -->
</section>

