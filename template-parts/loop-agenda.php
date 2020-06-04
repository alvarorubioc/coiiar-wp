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
				<span class="card-img__tag bagde"><?php the_field('event_tag');?></span>
			</div>	
			<div class="card-content">
				<?php $terms = get_the_terms( $post->ID , 'events-category' ); 
					if  ($terms) {
						foreach ( $terms as $term ) {
						echo '<div class="text-caption">' . $term->name . '</div>';
						}
					}
				?>
				<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<h3 class="text-h5"><?php the_title(); ?></h3>
				</a>
				<div class="card-content__info">
					<span><?php the_field('event_extra_info');?></span>
				</div>	
			</div>
			<div class="card-footer dflex between-xs">
				<div><?php the_field('event_place');?></div>
				<div>Aquí la fecha</div>
			</div>		
		</div><!-- end card -->

	</article><!-- #post-<?php the_ID(); ?> -->

