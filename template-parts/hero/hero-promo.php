<header id="hero">

    <div class="container">
        <div class="row">
            
            <div class="col-xs-12 col-md-7">
                <div class="entry-title">

                    <?php
                    if (get_field('hero_title') ) {
                        $hero_title  = get_field('hero_title');
                        echo '<h1>' .$hero_title. '</h1>';
                    }
                    else
                        echo the_title( '<h1>', '</h1>' );
                    ?>

                    <div class="divider"></div>
                    <p><strong><?php echo the_excerpt(); ?></strong></p>
                    <?php 
                        $link_1 = get_field('hero_link_1');
                        $link_2 = get_field('hero_link_2');
                        $link_3 = get_field('hero_link_3');
                        if( $link_1 ): 
                            $link_url = $link_1['url'];
                            $link_title = $link_1['title'];
                            $link_target = $link_1['target'] ? $link_1['target'] : '_self';
                            ?>
                            <a class="hero-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif;

                        if( $link_2 ): 
                            $link_url = $link_2['url'];
                            $link_title = $link_2['title'];
                            $link_target = $link_2['target'] ? $link_2['target'] : '_self';
                            ?>
                             <a class="hero-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif;

                        if( $link_3 ): 
                            $link_url = $link_3['url'];
                            $link_title = $link_3['title'];
                            $link_target = $link_3['target'] ? $link_3['target'] : '_self';    
                            ?>    
                            <a class="hero-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>   
                </div>
            </div>

            <div class="col-xs-12 col-md-5 pt-4 img-hero">                
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-content">
                    <?php
                        $shortcode = get_field('promo_landing_form');
                        echo do_shortcode($shortcode);
                    ?>
                    </div>
                </div>
            </div>

        </div><!-- .row -->
    </div><!-- .container -->
</header>

