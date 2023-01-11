<div id="sticky-formacion">
    <div class="filters-bar bg-primary-light">
        <div class="container dflex middle-xs between-xs"> 
            <div class="sticky-formacion--btns">
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
            </div>
            <div class="sticky-formacion--price"><?php the_field('formacion_info_price'); ?></div>
        </div>
    </div> <!-- .filters-bar -->
         
</div><!-- #section-filters -->

<script>
    jQuery(document).ready(function($){
    $(window).on('scroll', function(){
        if($(window).scrollTop() >= $('#sticky-formacion').offset().top){
            $('.filters-bar').addClass('sticky-formacion--fixed');
        }
        else 
        {
            $('.filters-bar').removeClass('sticky-formacion--fixed');    
        }
        });
    });
</script>