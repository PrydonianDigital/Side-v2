<?php get_header(); ?>

<div class="row" id="home">
	
	<div class="eight columns hide-for-small" role="main">
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
	</div>
	
	<div class="four columns InSIDE">
		<h4>InSIDE</h4>
		<?php $args = array(
			'post_type' => 'post',
			'posts_per_page' => '6'
		);
		$homeposts = new WP_Query( $args );
		if ($homeposts->have_posts()) : while ($homeposts->have_posts()) : $homeposts->the_post(); ?>
		<div <?php post_class('row'); ?>>
			<a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>">
			<div class="nine columns">
				<h4><?php the_title(); ?></h4>
			</div>
			<div class="three columns">
				<h5><?php the_time('M Y') ?></h5>
			</div>
			</a>
		</div>
		<?php endwhile; ?>
	
		<?php else : ?>
		
		<?php endif; ?>		
	</div>
	<div class="row">
		<div class="twelve columns separator"></div>
	</div>
	<div class="row">
		<div class="twelve columns latest">
			<h4>LATEST PROJECTS</h4>
		</div>		
	</div>
	<div class="row latestProjects">
		<?php $args = array(
   			'post_type' => 'projects',
   			'posts_per_page' => '3',
   			'category_name' => 'english-language-projects',
   			'orderby' => 'menu_order'	
		);
		$latest = new WP_Query( $args );
		if ($latest->have_posts()) : while ($latest->have_posts()) : $latest->the_post(); ?>
		<div <?php post_class('four columns'); ?>>
			<a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>"><?php the_post_thumbnail('project'); ?></a>
			<p><a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>"><?php the_title(); ?></a></p>
		</div>
		<?php endwhile; ?>
	
		<?php else : ?>
		
		<?php endif; ?>	
	</div>
	
	<div class="row">
		<div class="twelve columns separator"></div>
	</div>
	
	<div class="row">
		<div class="twelve columns">
<ul class="twitter">
			<?php
				dynamic_sidebar('tweets');
			?>
			</ul>			
		</div>
	</div>

<?php get_footer(); ?>	