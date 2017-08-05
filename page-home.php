<?php get_header(); ?>

<div class="row" id="homePage">

	<div class="six columns hide-for-small" role="main" id="banner">
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

	<div class="six columns InSIDE">
		<h4><a href="/inside">InSIDE</a></h4>
		<?php $args = array(
			'post_type' => 'post',
			'posts_per_page' => '6'
		);
		$homeposts = new WP_Query( $args );
		if ($homeposts->have_posts()) : while ($homeposts->have_posts()) : $homeposts->the_post(); ?>
		<div <?php post_class('row'); ?> itemscope itemtype="http://schema.org/BlogPosting">
			<a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>" rel="permalink">
			<div class="nine columns">
				<h4 class="entry-title"><?php the_title(); ?></h4>
				<span class="vcard author"><span class="fn">SideUK</span></span>
			</div>
			<div class="three columns">
				<h5 class="published updated" datetime="<?php the_time( 'c' ); ?>"><?php the_time('M Y') ?></h5>
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
			<h4><a href="/work/english-language-projects/">LATEST PROJECTS</a></h4>
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
		<div <?php post_class('four columns'); ?> itemscope itemtype="http://schema.org/CreativeWork">
			<a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>"><?php the_post_thumbnail('project'); ?></a>
			<p class="entry-title"><a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>"><?php the_title(); ?></a></p>
			<span class="vcard author"><span class="fn">SideUK</span></span>
			<span class="published updated" datetime="<?php the_time( 'c' ); ?>"><?php the_time('M Y') ?></span>
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
			<h4><a href="https://twitter.com/SideUK" target="_blank">TWITTER</a></h4>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('tweets') ) : endif; ?>
		</div>
	</div>

<?php get_footer(); ?>