			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="four columns carousel">
				<div id="ch-carousel" class="owl-carousel">
				<?php global $post; $image1 = get_post_meta( $post->ID, '_cmb_wwd1', true ); if( $image1 != '' ) :  ?>
				    <div class="item"><img class="lazyOwl" data-src="<?php global $post; $image1 = get_post_meta( $post->ID, '_cmb_wwd1', true ); echo $image1;  ?>"></div>
				    <div class="item"><img class="lazyOwl" data-src="<?php global $post; $image2 = get_post_meta( $post->ID, '_cmb_wwd2', true ); echo $image2;  ?>"></div>
				    <div class="item"><img class="lazyOwl" data-src="<?php global $post; $image3 = get_post_meta( $post->ID, '_cmb_wwd3', true ); echo $image3;  ?>"></div>
				<?php endif; ?>	
				</div>			
			</div>
			
			<div class="eight columns">
				<h4><?php the_title(); ?></h4>
				<?php the_content(); ?>
			</div>
			<div id="WhatWequote" class="row">
			<?php
			// Find connected pages
			$connected = new WP_Query( array(
			  'connected_type' => 'quote2what',
			  'connected_items' => get_queried_object(),
			  'nopaging' => true,
			) );
			// Display connected pages
			if ( $connected->have_posts() ) :
			?>
			<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
			<div id="whatQuote">
			<div class="push_four eight columns quote">
				<div class="quote-content"><?php the_content(); ?></div>
				<cite class="quote-author"><?php the_title(); ?></cite>
			</div>
			</div>
			<?php endwhile; ?>
			
			<?php 
			// Prevent weirdness
			wp_reset_postdata();
			
			endif;
			?>		
			</div>
			<?php endwhile; ?>
			
			<?php endif; ?>