<?php
/**
 * The template for displaying taxonomies agenda
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) :
                
			get_template_part( 'template-parts/hero/hero', 'agenda' );

			get_template_part( 'template-parts/filters-agenda' );

			echo '<div class="bg-primary-light pt-3 pb-3"><div class="container"><div class="row">';
				
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/loop', 'agenda-horizontal' );

			endwhile;

			echo '</div></div></div>';
			
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
