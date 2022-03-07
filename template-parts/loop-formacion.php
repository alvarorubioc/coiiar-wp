<?php
/**
 * Template part for displaying card formacion
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>

    <div class="card--horizontal"> 	
        <div class="card-content">
            <?php $terms = get_the_terms( $post->ID , 'area-formativa' ); 
                if  ($terms) {
                    foreach ( $terms as $term ) {
                    echo '<span class="text-caption">' . $term->name . ' </span>';
                    }
                }
            ?>
            <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <h3 class="text-h4"><?php the_title(); ?></h3>
            </a>	
            <?php echo the_excerpt(); ?>
            <?php if (get_field('formacion_info_parent')) :?>
                <div class="card-content__info mt-1 dflex">
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#info" />
                    </svg>
                    <span><?php the_field('formacion_info_parent');?></span>
                </div>
            <?php endif ;?>	
        </div>
        <div class="card-footer">
            <?php if (get_field('formacion_info_start')) :?>
                <div class="mb-1">
                    <div class="dflex">
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#calendar" />
                        </svg>
                        <span class="uppercase">Periodo Matrícula</span>
                    </div>
                    <?php the_field('formacion_info_start'); ?>
                </div>
            <?php endif ;?>
            <?php if (get_field('formacion_info_bonus')) :?>
                <div class="mb-1">
                    <div class="dflex">
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#plus" />
                        </svg>
                        <span class="uppercase">Fecha bonificable</span>
                    </div>
                    <?php the_field('formacion_info_bonus'); ?>
                </div>
                <?php endif ;?>
            <?php if (get_field('formacion_info_duration')) :?>
                <div>
                    <div class="dflex">
                        <object data="<?php echo get_template_directory_uri(); ?>/assets/icons/clock.svg" width="24" height="24"> </object>
                        <span class="uppercase">Duración</span>
                    </div>
                    <?php the_field('formacion_info_duration'); ?>
                </div>
            <?php endif ;?>
            
        </div>	
    </div><!-- end card -->

</article><!-- #post-<?php the_ID(); ?> -->