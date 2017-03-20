<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Practica-underscore
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area medium-4 columns" role="complementary">
	<div class="row">
		<div class="medium-12 columns">
			<a data-open="newsletter" >
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/newsletter.jpg " alt="">
			</a>	
		</div>
	</div>
	<div id="newsletter" class="reveal" data-reveal data-animation-in="scale-in-down" data-animation-out="scale-in-up">
		<form action="#">
			<h3 class="text-center">Sucribete</h3>
			<div class="row columns">
				<label for="">Nombre<input type="text" placeholder="Ingresa Tu Nombre"></label>
			</div>
			<div class="row columns">
				<label for="">Correo<input type="text" placeholder="Ingresa Tu Correo"></label>
			</div>
			<div class="row columns">
				<input type="submit" value="Enviar" class="button" id="newsletter_enviar">
			</div>
		</form>
	</div>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
