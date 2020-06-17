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
				
				echo '<div class="embed-container mb-4">';
				the_field('post_video');
				echo '</div>';	

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
		echo '<div class="row"><div class="col-xs-12 col-md-8 col-md-offset-2">';
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
		echo '</div></div>';
		
		// Share on social networks 
		get_template_part( 'template-parts/social-share' );

		?>

		<!-- related post by category -->
		
		<?php
		$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) ); 
		
		if( $related ): ?>
			
			<div class="row mb-2 mt-4 center-xs">
				<div class="col-xs-12 col-md-7">
					<div class="divider aligncenter"></div>
					<p class="text-h2"><?php esc_html_e( 'Noticias relacionadas', 'coiiar' ); ?></p>
					<p><?php esc_html_e( 'Todo lo que necesitas saber para estar al día en Ingeniería e Industria 4.0.', 'coiiar' ); ?></p>
				</div>
			</div>
			
			<div class="row grid-blog">	
				<?php
					if( $related ) foreach( $related as $post ) {
						setup_postdata($post);
						
						get_template_part( 'template-parts/loop', get_post_format() );  
						}
					wp_reset_postdata();
				?>
			</div>
		<?php endif; ?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer container">
		<?php coiiar_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->


