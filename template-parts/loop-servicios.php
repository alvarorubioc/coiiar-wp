<?php
/**
 * Template part for displaying card servicios
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

?>
<div class="col-xs-12 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<div class="card--horizontal card--border"> 
			<div class="card-icon">
                <div>
					<?php 
					$image = get_field('card_icon');
					if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
				</div>
			</div>	
			<div class="card-content">
				<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <h3 class="text-h5"><?php the_title(); ?></h3>
                </a>
                <p><?php echo get_the_excerpt() ;?></p>

			</div>		
		</div><!-- end card -->

	</article><!-- #post-<?php the_ID(); ?> -->
</div>
