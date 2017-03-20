<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Practica-underscore
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<?php if(is_single())
	{
		 the_post_thumbnail();
	} else { ?>
		<div class="medium-6 columns">
			<?php the_post_thumbnail('img_index'); ?>
		</div>
	<?php } 
	if(is_single()) { ?>
		<div>
	<?php } else { ?>
		<div class="medium-6 columns">
	<?php } ?>
	
		<header class="entry-header">
				<?php
				if ( !is_single() ) 
				{
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
				
			
				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php echo practica_underscore_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->
			
			<div class="entry-content">

				<?php 
					if(is_single())
					{
						the_content();
					} else {
						$exerpt = substr(get_the_excerpt(),0,250);
						echo $exerpt.' ...'; ?>
						<footer class="entry-footer">
							<a href="<?php the_permalink(); ?> " class="button" type="button">Ver Recetas</a>
						</footer><!-- .entry-footer -->

					<?php }
				?>
			</div><!-- .entry-content -->
			
			
	</div><!-- medium 6 -->
</article><!-- #post-## -->
