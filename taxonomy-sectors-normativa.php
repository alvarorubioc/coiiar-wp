<?php
/**
 * The template for displaying taxomony sectors ofertas de trabajo
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
				<?php get_template_part( 'template-parts/hero/hero', 'normativa' ); ?>
			</header><!-- .page-header -->

			<?php
				get_template_part( 'template-parts/filters', 'normativa' );
				echo '<div class="bg-primary-light pt-3 pb-3"><div class="container"><div class="row">';

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called loop-___.php (where ___ is the Post Type Format) and that will be used instead.
				 */
				get_template_part( 'template-parts/loop', 'normativa' );

			endwhile;
			echo '</div></div></div>';
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

			get_template_part( 'template-parts/related', 'news' );
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
