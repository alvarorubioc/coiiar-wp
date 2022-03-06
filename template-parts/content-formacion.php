<?php
/**
 * Template part for displaying event content in single-formación.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container mt-4 mb-4" id="formacion-info">
        <div class="row">
            
            <?php if (get_field('formacion_info_start')) :?>
            <div class="col-xs-12 col-md">
                <div class="dflex">
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#calendar" />
                    </svg>
                    <span class="uppercase">Comienza</span>
                </div>
                <?php the_field('formacion_info_start'); ?>
            </div>
            <?php endif ;?>
        
            <?php if (get_field('formacion_info_price')) :?>
            <div class="col-xs-12 col-md">
                <div class="dflex">
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/euro.svg" />
                    </svg>
                    <span class="uppercase">Precio</span>
                </div>
                <?php the_field('formacion_info_price'); ?>
            </div>
            <?php endif ;?>

            <?php if (get_field('formacion_info_duration')) :?>
            <div class="col-xs-12 col-md">
                <div class="dflex">
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/clock.svg" />
                    </svg>
                    <span class="uppercase">Duración</span>
                </div>
                <?php the_field('formacion_info_duration'); ?>
            </div>
            <?php endif ;?>

            <?php if (get_field('formacion_info_job')) :?>
            <div class="col-xs-12 col-md">
                <div class="dflex">
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#briefcase" />
                    </svg>
                    <span class="uppercase">Trabajo</span>
                </div>
                <?php the_field('formacion_info_job'); ?>
            </div>
            <?php endif ;?>

        </div>
    </div>

	<div class="entry-content container">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coiiar' ),
				'after'  => '</div>',
			)
        );
        
        // Share on social networks 
        get_template_part( 'template-parts/social-share' );
        
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'coiiar' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->


