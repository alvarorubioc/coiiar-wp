<?php
/**
 * Template part for displaying card agenda horizontal
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
	
		<div class="card--horizontal"> 
			
			<div class="card-img">
				<?php coiiar_post_thumbnail('full'); ?>
				<span class="card-img__tag bagde"><?php the_field('event_tag');?></span>
			</div>	
			
			<div class="card-content">
				<?php $terms = get_the_terms( $post->ID , 'category-events' ); 
					if  ($terms) {
						foreach ( $terms as $term ) {
						echo '<div class="text-caption">' . $term->name . '</div>';
						}
					}
				?>
				<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<h3 class="text-h5"><?php the_title(); ?></h3>
				</a>
				<div class="card-content__info dflex">
					<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#info" />
					</svg>
					<span><?php the_field('event_extra_info');?></span>
				</div>	
			</div>

			<div class="card-footer">
                <div class="card-footer--item">
					<div class="dflex">
						<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#calendar" />
						</svg>
						<span><?php the_field('event_start_date');?></span>
					</div>
				</div>
                
				<div class="card-footer--item">
					<div class="dflex">
						<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#map-marker" />
						</svg>
						<span><?php the_field('event_place');?></span>
					</div>
				</div>
				
			</div>		
		</div><!-- end card -->

	</article><!-- #post-<?php the_ID(); ?> -->