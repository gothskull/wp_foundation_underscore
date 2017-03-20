<?php 
/*
Template Name: Blog
*/

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Practica-underscore
 */

get_header(); ?>

	<div id="primary" class="content-area medium-8 medium-push-2 columns">
		<main id="main" class="site-main" role="main">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		<?php 
		  $query = array(
		      'posts_per_page'   => 5,
		      'post_type'        => 'post',
		      'order'            => 'DESC',
		      'orderby'          => 'date',
		      'cat'              => 4
		  );
		  $blog = new WP_Query($query);
		  if($blog->have_posts()) :
		  
		      while($blog->have_posts()):$blog->the_post(); ?>

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
												<a href="<?php the_permalink(); ?> " class="button" type="button">Ver Entradas</a>
											</footer><!-- .entry-footer -->

										<?php }
									?>
								</div><!-- .entry-content -->
								
								
						</div><!-- medium 6 -->
					</article><!-- #post-## -->
			<?php 
			endwhile;wp_reset_postdata();
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
