<?php get_header(); ?>
	<div class="row">
		<div class="eight columns">
			<div class="row" id="page-header">
				<div class="twelve columns">
					<h4 class="page-title"><?php the_title(); ?></h4>
				</div>
			</div>
	<div class="row">
		<div class="twelve columns separator"></div>
	</div>
			<div class="row">
				<div class="twelve columns" id="newsContent">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h6><span class="date"><?php the_time('M Y') ?></span></h6>
						<?php the_content(); ?>
						<br />
						<p class="sharing" data-url="<?php the_permalink(); ?>"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="facebookShare" target="_blank"><i class="icon-facebook"></i><span class="sharecount">-</span></a> <a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php the_permalink(); ?>&via=SideUK" class="twitterShare" target="_blank"><i class="icon-twitter"></i><span class="tweetcount">-</span></a> <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="oneShare" target="_blank"><i class="icon-google-plus"></i><span class="onecount">-</span></a></p>
				    <?php endwhile; ?>
				
				    <?php else : ?>
				    
				    <?php endif; ?>
		</div>
			</div>
		</div>
		<div class="four columns InSIDE" id="newsSidebar">
			<div class="row" id="page-header">
				<div class="twelve columns">
					<h4 class="inside">InSIDE ARCHIVE</h4>
				</div>
			</div>	
	<div class="row">
		<div class="twelve columns separator"></div>
	</div>		
		<?php $args = array(
			'post_type' => 'post',
			'posts_per_page' => '20'
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
		
		<?php endif; ?>		</div>
	</div>

<?php get_footer(); ?>	