<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coiiar
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-top row">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-top')) : 
					endif; ?>
			</div>
			<hr>
			<div class="footer-middle row">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-middle')) : 
					endif; ?>
				<div class="col-xs-12 col-md-4 col-md-offset-1">
					<p class="text-h5"><?php esc_html_e( 'Síguenos en:', 'coiiar' ); ?></p>
					<ul class="social">
						<li>
							<a href="#" title="Facebook COIIAR" rel=”nofollow”>
								<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#arrow-right" />
								</svg>
							</a>
						</li>
						<li>
							<a href="#" title="Facebook COIIAR" rel=”nofollow”>
								<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#arrow-right" />
								</svg>
							</a>
						</li>
						<li>
							<a href="#" title="Facebook COIIAR" rel=”nofollow”>
								<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#magnifying-glass" />
								</svg>
							</a>
						</li>
						<li>
							<a href="#" title="Facebook COIIAR" rel=”nofollow”>
								<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#arrow-right" />
								</svg>
							</a>
						</li>

					</ul>
				</div>		
			</div>
			<hr>
			<div class="footer-bottom row">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-bottom')) : 
					endif; ?>
			</div>
		</div>	

		<div class="site-info">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-8 center-xs start-md">
						<small>© 2020 Colegio Oficial de Ingenieros Industriales de Aragón y La Rioja</small>
					</div>
					<div class="col-xs-12 col-md-4 center-xs end-md">
						<small>Menu</small>
					</div>
				</div>	
			</div>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
