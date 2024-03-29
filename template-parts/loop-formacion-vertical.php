<?php
/**
 * Template part for displaying card formación destacado
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('dflex col-xs-12 col-sm-6 col-md-4'); ?>>
	
		<div class="card"> 
			<div class="card-img">
				<?php coiiar_post_thumbnail('img-card'); ?>
				<?php $terms = get_the_terms( $post->ID , 'tipo-formacion' ); 
					if  ($terms) {
						foreach ( $terms as $term ) {
						echo '<span class="card-img__tag bagde">' . $term->name . '</span>';
						}
					}
				?>
			</div>	
			<div class="card-content">
				<?php $terms = get_the_terms( $post->ID , 'area-formativa' ); 
					if  ($terms) {
						foreach ( $terms as $term ) {
						echo '<div class="text-caption">' . $term->name . '</div>';
						}
					}
				?>
				<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<h3 class="text-h5"><?php the_title(); ?></h3>
				</a>
				<?php if (get_field('formacion_info_parent')) :?>
					<div class="card-content__info dflex">
						<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#info" />
						</svg>
						<span><?php the_field('formacion_info_parent');?></span>
					</div>
				<?php endif ;?>	
			</div>
			<div class="card-footer">
                <?php if (get_field('formacion_info_start')) :?>
                <div class="card-footer--item">
                    <div class="dflex">
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#calendar" />
                        </svg>
                        <div><?php the_field('formacion_info_start'); ?></div>
                    </div> 
                </div>
                <?php endif ;?>
				<?php if (get_field('formacion_info_bonus')) :?>
				<div class="card-footer--item">
					<div class="dflex">
						<object data="<?php echo get_template_directory_uri(); ?>/assets/icons/plus.svg" width="24" height="24"> </object>
						<div><?php the_field('formacion_info_bonus'); ?></small></div>
					</div>
				</div>	
				<?php endif ;?>	
                <?php if (get_field('formacion_info_duration')) :?>
				<div class="card-footer--item">
                    <div class="dflex">
                        <object data="<?php echo get_template_directory_uri(); ?>/assets/icons/clock.svg" width="24" height="24"> </object>
                        <div><?php the_field('formacion_info_duration'); ?></div>
                    </div>
                </div>
                <?php endif ;?>
            </div>		
		</div><!-- end card -->

	</article><!-- #post-<?php the_ID(); ?> -->

