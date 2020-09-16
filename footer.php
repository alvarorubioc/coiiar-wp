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
							<a href="https://twitter.com/COIIAR" title="Twitter COIIAR" rel=”nofollow”>
								<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#twitter" />
								</svg>
							</a>
						</li>
						<li>
							<a href="https://www.linkedin.com/in/coiiar/" title="Linkedin COIIAR" rel=”nofollow”>
								<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#linkedin" />
								</svg>
							</a>
						</li>
						<li>
							<a href="https://www.instagram.com/ingenieros_industriales_coiiar/" title="Instagram COIIAR" rel=”nofollow”>
								<svg class="icon" width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#instagram" />
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
					<div class="col-xs-12 col-md-6 center-xs start-md">
						<small>© 2020 Colegio Oficial de Ingenieros Industriales de Aragón y La Rioja</small>
					</div>
					<div class="col-xs-12 col-md-6 center-xs end-md">
						<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'menu-footer',
									'menu_id'         => 'footer-menu',
								)
							);
						?>
					</div>
				</div>	
			</div>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
