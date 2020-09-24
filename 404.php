<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package coiiar
 */

get_header();
?>

	<main id="primary" class="site-main bg-primary-light">

		<section class="error-404 not-found container">
			<header class="page-header pt-6">
				<h1 class="display mb-2"><?php esc_html_e( 'Error 404', 'coiiar' ); ?></h1>
				<h2 class="page-title"><?php esc_html_e( 'Oops! No hemos encontrado lo que buscabas', 'coiiar' ); ?></h2>
			</header><!-- .page-header -->

			<div class="pb-6">
				<p class="mt-2"><?php esc_html_e( 'Parece que no se encontró nada en esta dirección. Quizá puedes hacer una nueva búsqueda o ir a la homepage', 'coiiar' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->

		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();

