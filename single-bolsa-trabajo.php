<?php
/**
 * The template for displaying all single posts bolsa trabajo
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coiiar
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/hero/hero', 'bolsa-trabajo' );
            
            // Main content	
			get_template_part( 'template-parts/content', get_post_type() );

			echo'<div class="container">';

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Anterior:', 'coiiar' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Próxima:', 'coiiar' ) . '</span> <span class="nav-title">%title</span>',
				)
			 );
			echo '</div>';

		endwhile; // End of the loop.
		
		related_job_offers();
		
		?>

	</main><!-- #main -->

<?php
get_footer();

