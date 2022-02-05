<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

get_header();
?>

	<main id="primary" class="site-main">

		<header id="hero">
			<div class="container">
				<div class="row middle-xs">

					<div class="col-xs-12 col-md-7">
						<div class="entry-title">
						<div class="breadcrumbs mb-1" typeof="BreadcrumbList" vocab="https://schema.org/">
								<?php if(function_exists('bcn_display'))
									{
										bcn_display();
									}
								?>
							</div>
							<h1><?php the_field('hero_title', 7);?></h1>
							<div class="divider"></div>
							<p><?php echo the_excerpt(); ?></p>

							<?php 
								$link_1 = get_field('hero_link_1', 7);
								$link_2 = get_field('hero_link_2', 7);
								$link_3 = get_field('hero_link_3', 7);
								if( $link_1 ): 
									$link_url = $link_1['url'];
									$link_title = $link_1['title'];
									$link_target = $link_1['target'] ? $link['target'] : '_self';
									?>
									<a class="hero-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif;

								if( $link_2 ): 
									$link_url = $link_2['url'];
									$link_title = $link_2['title'];
									$link_target = $link_2['target'] ? $link['target'] : '_self';
									?>
									<a class="hero-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif;

								if( $link_3 ): 
									$link_url = $link_3['url'];
									$link_title = $link_3['title'];
									$link_target = $link_3['target'] ? $link['target'] : '_self';    
									?>    
									<a class="hero-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>   
						</div><!-- .entry-title -->
					</div>

					<div class="col-xs-12 col-md-5 end-sm">                
						<?php if(is_home()) {
							$page_for_posts = get_option( 'page_for_posts' );
							echo get_the_post_thumbnail($page_for_posts, 'large');
						} ?>                 
					</div>

				</div><!-- .row -->
			</div><!-- .container -->
		</header>

		<?php
		if ( have_posts() ) :

			get_template_part( 'template-parts/filters' );

			echo '<div class="container"><div class="row mt-5 grid-blog">';
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				
					get_template_part( 'template-parts/loop', get_post_format() );
				
			endwhile;
			echo '</div></div>';
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

	<?php get_template_part( 'template-parts/section', 'colegiarse' ); ?>

<?php
get_footer();
