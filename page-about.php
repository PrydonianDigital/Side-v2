<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row" id="home">
		<div class="twelve columns">
		</div>
	</div>
	<div class="row">
    	<div class="twelve columns">
    		<p><?php the_post_thumbnail('header'); ?></p>
	    	<?php the_content(); ?>
    	</div>
	</div>
	  	
    <?php endwhile; ?>

    <?php else : ?>
    
    <?php endif; ?>
	
	<div class="row">
		<div class="twelve columns separator"></div>
	</div>

	<div class="row" id="page-awards">
		<div class="twelve columns">
			<h3 class="awards">Awards</h3>
		</div>
	</div>  

	<div class="row" id="awardsSection">
		<div class="four columns">
			<img src="<?php global $post; $image = get_post_meta( $post->ID, '_cmb_image', true ); echo $image;  ?>">
		</div>
		<div class="large-8 columns">
			<p><strong>Develop Industry Excellence Awards</strong></p>
			<dl class="awardlist">
    		<?php
				$args = array (
					'post_type' => 'awards',
					'posts_per_page' => '100',
					'order' => 'ASC',
					'orderby' => 'menu_order',
				);
				$awards = new WP_Query( $args );
				if ( $awards->have_posts() ) {
					while ( $awards->have_posts() ) {
						$awards->the_post();
			?>
					<dt><span><?php global $post; $year = get_post_meta( $post->ID, '_cmb_year', true ); echo $year;  ?></span> <?php the_title(); ?></dt>
						<dd><?php global $post; $extra = get_post_meta( $post->ID, '_cmb_extra', true ); echo $extra;  ?></dd>
			<?php
					}
				} else {
					// no posts found
				}
				wp_reset_postdata();    		
    		?>		
			</dl>
		</div>
		<div class="four columns"> </div>
	</div>
	
	<div class="row">
		<div class="twelve columns separator"></div>
	</div>
	
	<div class="row">
		<div class="twelve columns">
			<h3 class="biog">Biographies</h3>
		</div>
	</div>
	
	<div class="row">
		<div id="news">
			<?php
				$args = array (
					'post_type' => 'founder',
					'order' => 'ASC',
					'orderby' => 'id',
				);
				$founder = new WP_Query( $args );
				if ( $founder->have_posts() ) {
					while ( $founder->have_posts() ) {
						$founder->the_post();
			?>
			<div class="four columns">
				<?php the_post_thumbnail('slider'); ?>
				<div class="founder">
					<p class="title closed"><a href="#"><?php the_title(); ?><br /><em><?php global $post; $image = get_post_meta( $post->ID, '_cmb_job_title', true ); echo $image;  ?></em></a></p>
					<div class="content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php
					}
				} else {
	
				}
				wp_reset_postdata();		
			?>
		</div>
	</div>

<?php get_footer(); ?>	