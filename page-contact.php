<?php get_header(); ?>

	<div class="row" id="home">
		<div class="four columns">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php the_content(); ?>
			
		    <?php endwhile; ?>
		
		    <?php else : ?>
		    
		    <?php endif; ?>			
		</div>
		<div class="five columns">
			<img src="<?php echo get_template_directory_uri(); ?>/img/map.png" alt="map" />
		</div>
		<div class="three columns">
			&nbsp;
		</div>
	</div>

<?php get_footer(); ?>	