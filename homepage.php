<?php
/**
 * The template for display homepage
 * 
 * Template name: Homepage
 * 
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/hero' );

		endwhile; // End of the loop.
		?>
		<?php
			get_template_part( 'template-parts/homepage/section', 'agenda' ); 
			get_template_part( 'template-parts/homepage/section', 'actualidad' );
			get_template_part( 'template-parts/homepage/section', 'servicios');
			get_template_part( 'template-parts/section', 'colegiarse' );
			get_template_part( 'template-parts/homepage/section', 'comisiones' );
		?>
		

	</main><!-- #main -->

<?php
get_footer();
