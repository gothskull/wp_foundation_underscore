<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Practica-underscore
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info row">
			<div class="small-6 medium-9 columns">
				
			<?php wp_nav_menu( array( 
				'theme_location' => 'menu_pie', 
				'menu_id' => 'footer-menu',
				'items_wrap'      => '<ul id="%1$s" class="%2$s vertical medium-horizontal  text-center">%3$s</ul>',
			) ); ?>
			</div>
			<div class="small-6 medium-3 columns">
				<?php wp_nav_menu( array( 
					'theme_location' => 'social', 
					'menu_id' => 'social-menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s  medium-horizontal  text-center">%3$s</ul>',
				) ); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
