<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content container">
		<?php if ( has_post_format('video') ) {
				
				echo '<div class="embed-container">';
				the_field('post_video');
				echo '</<div>';	

			}
		?>

	<?php if ( has_post_format('gallery') ) {

		// Load value (array of ids).
		$image_ids = get_field('post_gallery');
		if( $image_ids ) {

			// Generate string of ids ("123,456,789").
			$images_string = implode( ',', $image_ids );

			// Generate and do shortcode.
			$shortcode = sprintf( '', $images_string );
			echo do_shortcode( $shortcode );
		}
			
		}
	?>

		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'coiiar' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coiiar' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer container">
		<?php coiiar_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->


