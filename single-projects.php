<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row" id="page-header" itemscope itemtype="http://schema.org/CreativeWork">
		<div class="twelve columns">
			<h3 class="page-title" itemprop="name"><?php the_title(); ?></h3>
		</div>
	</div>
	<div <?php post_class('row'); ?> id="">
		<div class="twelve columns separator"></div>
	</div>
	<div class="row" itemscope itemtype="http://schema.org/CreativeWork">
		<div id="infoMeta">
			<div class="four columns">
				<div class="row">
					<div class="twelve columns" id="meta">
						<div class="row">
							<?php global $post; $client = get_post_meta( $post->ID, '_cmb_client', true ); if( $client != '' ) :  ?>
							<div class="three columns"><span>Client:</span></div>
							<div class="nine columns"><span><?php global $post; $client = get_post_meta( $post->ID, '_cmb_client', true ); echo $client;  ?></span></div>
							<?php endif; ?>
						</div>
						<div class="row">
							<?php global $post; $developer = get_post_meta( $post->ID, '_cmb_developer', true ); if( $developer != '' ) :  ?>
							<div class="three columns"><span>Developer:</span></div>
								<div class="nine columns"><span><?php global $post; $developer = get_post_meta( $post->ID, '_cmb_developer', true ); echo $developer;  ?></span></div>
							<?php endif; ?>
						</div>
						<div class="row">
							<?php global $post; $publisher = get_post_meta( $post->ID, '_cmb_publisher', true ); if( $publisher != '' ) :  ?>
							<div class="three columns"><span>Publisher:</div>
								<div class="nine columns"><span><?php global $post; $publisher = get_post_meta( $post->ID, '_cmb_publisher', true ); echo $publisher;  ?></span></div>
							<?php endif; ?>
						</div>
						<div class="row">
							<?php global $post; $brief = wpautop(get_post_meta( $post->ID, '_cmb_brief', true )); if( $brief != '' ) :  ?>
							<div class="three columns"><span>Brief:</span></div>
								<div class="nine columns"><?php global $post; $brief = wpautop(get_post_meta( $post->ID, '_cmb_brief', true )); echo $brief;  ?></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="eight columns">
					<?php
						$connected = new WP_Query( 
				    		array(
				    		    'connected_type' => 'slider_project', 
				    		    'connected_items' => get_queried_object()
				    		)
			    		);
			    		if ($connected->have_posts()) : while ($connected->have_posts()) : $connected->the_post(); 
			    	?>
			    		<div class="">
			    		<?php if(has_post_thumbnail()) : ?>
			    			<?php the_post_thumbnail('large'); ?>
			    		<?php else :?>
			    			<?php remove_filter('the_content', 'wpautop'); the_content(); ?>
			    		<?php endif;?>
			    		</div>
			    	<?php
			    		endwhile; else : endif; wp_reset_postdata();
			    	?>		
			</div>
		</div>
	</div>
	<div class="row">
		<div class="twelve columns" id="back">
				<a href="/work/"><img src="<?php bloginfo('template_url'); ?>/img/back.png" alt="back" width="16" height="18" /> Back to work</a>
		</div>
	</div>
	<div class="row">
		<div class="twelve columns separator"></div>
	</div>
	<div class="row">
		<div class="four columns" data-title="<?php the_title(); ?>">
			<div id="cbp-qtrotator" class="cbp-qtrotator"> 
			<?php
				$connected = new WP_Query( 
		    		array(
		    		    'connected_type' => 'quote_project', 
		    		    'connected_items' => get_queried_object()
		    		)
	    		);
	    		if ($connected->have_posts()) : while ($connected->have_posts()) : $connected->the_post(); 
	    	?>
			    <div class="quote cbp-qtcontent">	
			    	<div class="quote-content"><?php the_content(); ?></div>
					<cite class="quote-author"><?php the_title(); ?></cite>
			    </div>
	    	<?php
	    		endwhile; else : 
	    	?>	
	    	<?php
	    		endif; wp_reset_postdata();
	    	?>
	    	</div>	
		</div>
		<div class="eight columns" itemprop="description">
			<?php add_filter('the_content', 'wpautop'); the_content(); ?>

			<p class="sharing" data-url="<?php the_permalink(); ?>"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="facebookShare" target="_blank"><i class="icon-facebook"></i><span class="sharecount">-</span></a> <a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php the_permalink(); ?>&via=SideUK" class="twitterShare" target="_blank"><i class="icon-twitter"></i><span class="tweetcount">-</span></a> <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="oneShare" target="_blank"><i class="icon-google-plus"></i><span class="onecount">-</span></a></p>
		</div>
	
    	
    <?php endwhile; ?>

    <?php else : ?>
    
    <?php endif; ?>
    
	</div>

    
<?php get_footer(); ?>	