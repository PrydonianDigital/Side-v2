<?php get_header(); ?>

<div class="row">

	
	<div class="twelve columns whatWeDo2" role="navigation">
		<?php $args = array(
			'post_type' => 'what-we-do'
		);
		$menu2 = new WP_Query( $args );
		if ($menu2->have_posts()) : while ($menu2->have_posts()) : $menu2->the_post(); ?>
		<span class="title"><a href="#<?php global $post; echo $post->post_name; ?>" id="<?php global $post; echo $post->post_name; ?>"><?php the_title(); ?></a></span>

		<?php endwhile; ?>
	
		<?php else : ?>
		
		<?php endif; ?>			
	</div>
</div>
<div class="row" role="main">
	<div class="twelve columns">

		<div class="row content whatWeDoContent">

		</div>

	</div>
</div>

<?php get_footer(); ?>	