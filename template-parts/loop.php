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
			<?php coiiar_post_thumbnail(); ?> 
		</div>
<<<<<<< HEAD
		<div class="card-content middle-xs between-xs">
			<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<h3 class="text-h5"><?php the_title(); ?></h3>
			</a>
			<span class="icon-format">
				<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
					<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#arrow-right" />
				</svg>
			</span>
=======
		<div class="card-content">
			<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<h3 class="text-h5"><?php the_title(); ?></h3>
			</a>
			<span>icon</span>
>>>>>>> b7a037c74cfe691635770b98a1fd65989b46665f
		</div> 
	</div>
</article>

