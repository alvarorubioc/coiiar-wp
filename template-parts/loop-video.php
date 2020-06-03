<?php
/**
 * Template part for displaying default posts loop
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-md-4'); ?>>
	<div class="card--blog">  
		<div class="card-img">
            <div class="embed-container">
                <?php the_field('post_video'); ?>
            </div>
		</div>
		<div class="card-content">
			<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<h3 class="text-h5"><?php the_title(); ?></h3>
			</a>
			<span>icon</span>
		</div> 
	</div>
</article>

