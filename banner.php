		<div id="ch-carousel" class="owl-carousel">
		<?php $args = array(
			'post_type' => 'slider',
			'posts_per_page' => '3',
			'category_name' => 'home-page'
		);
		$slider = new WP_Query( $args );
		if ($slider->have_posts()) : while ($slider->have_posts()) : $slider->the_post(); ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<div class="item"><img class="lazyOwl" data-src="<?php echo $url; ?>" alt="<?php the_title(); ?>"></div>
		<?php endwhile; ?>
	
		<?php else : ?>
		
		<?php endif; ?>
		</div>		