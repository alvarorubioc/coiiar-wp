<?php
/**
 * Template part for displaying card agenda
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('dflex col-xs-12 col-md-4'); ?>>
	
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
			<div class="card-footer dflex between-xs">
                <?php if (get_field('formacion_info_start')) :?>
                <div>
                    <div class="dflex">
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#calendar" />
                        </svg>
                        <span><?php the_field('formacion_info_start'); ?></span>
                    </div> 
                </div>
                <?php endif ;?>
                <?php if (get_field('formacion_info_duration')) :?>
                <div>
                    <div class="dflex">
                        <object data="<?php echo get_template_directory_uri(); ?>/assets/icons/clock.svg" width="24" height="24"> </object>
                        <span><?php the_field('formacion_info_duration'); ?></span>
                    </div>
                </div>
                <?php endif ;?>
                </div>		
		</div><!-- end card -->

	</article><!-- #post-<?php the_ID(); ?> -->

