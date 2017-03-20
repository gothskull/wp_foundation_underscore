<div class="orbit" data-orbit data-use-m-u-i="true" data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
	<ul class="orbit-container ">
		<?php 
			$args = array(
				'posts_per_page'  => 5,
				'tag'  => 'slider',
			);
			$slider = new WP_Query($args);
			$i = 0;
			if($slider->have_posts()) :
				while($slider->have_posts()) : $slider->the_post(); ?>
				
					<li class="<?php echo $i == 0 ? 'is-active' :''  ?>  orbit-slide">
						<a href="<?php the_permalink(); ?> ">
							<?php the_post_thumbnail('slider'); ?>
							<h3 class="orbit-caption"><?php  the_title() ?> </h3>
						</a>
					</li>
				<?php
				$i++;
				endwhile;wp_reset_postdata();
			endif;
		?>
		
	</ul>
	<nav class="orbit-bullets">
		<?php 
		$entradas = $slider->post_count;
		for ($i=0; $i <$entradas ; $i++) { ?>
			<button class="<?php echo $i == 0 ? 'is-active' :''  ?>" data-slide="<?php echo $i ?> "></button>
			
		<?php } ?>
	</nav>

</div>
