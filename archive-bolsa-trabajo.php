<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php get_template_part( 'template-parts/hero/hero', 'bolsa-trabajo' ); ?>
			</header><!-- .page-header -->

			<?php
				get_template_part( 'template-parts/filters', 'bolsa-trabajo' );
				echo '<div class="bg-primary-light pt-3 pb-3"><div class="container"><div class="row">';

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called loop-___.php (where ___ is the Post Type Format) and that will be used instead.
				 */
				get_template_part( 'template-parts/loop', 'bolsa-trabajo' );

			endwhile;

			echo'<div class="col-xs-12">';
				the_posts_navigation();
			echo'</div>';
			
			echo '</div></div></div>';
			
			

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		?>

		<div class="container" id="publicar-oferta">
			<div class="mt-4">
				<h3 class="has-text-align-center"><?php esc_html_e( '¿Eres una empresa y deseas publicar una oferta?', 'coiiar' ); ?></h3>
				<p class="has-text-align-center"><?php esc_html_e( 'Usa nuestro formulario para enviar la oferta de trabajo, la revisaremos y publicaremos en la mayor brevedad posible.', 'coiiar' ); ?></p>
			</div>
			<?php echo do_shortcode( '[contact-form-7 id="3710" title="Formulario publicar oferta empleo"]' ); ?>
		</div>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
