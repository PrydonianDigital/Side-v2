<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
if ( $detect->isMobile() ) {	
?>
			<div class="four columns carousel">
				<div id="ch-carousel" class="owl-carousel">
				<?php global $post; $image1 = get_post_meta( $post->ID, '_cmb_wwd1', true ); if( $image1 != '' ) :  ?>
				    <div class="item"><img class="lazyOwl" data-src="<?php global $post; $image1 = get_post_meta( $post->ID, '_cmb_wwd1', true ); echo $image1;  ?>"></div>
				<?php endif; ?>	
				</div>			
			</div>
<?php
} else {	
?>
			
			<div class="four columns carousel">
				<div id="ch-carousel" class="owl-carousel">
				<?php global $post; $image1 = get_post_meta( $post->ID, '_cmb_wwd1', true ); if( $image1 != '' ) :  ?>
				    <div class="item"><img class="lazyOwl" data-src="<?php global $post; $image1 = get_post_meta( $post->ID, '_cmb_wwd1', true ); echo $image1;  ?>"></div>
				<?php endif; ?>	
				<?php global $post; $image2 = get_post_meta( $post->ID, '_cmb_wwd2', true ); if( $image2 != '' ) :  ?>
				    <div class="item"><img class="lazyOwl" data-src="<?php global $post; $image2 = get_post_meta( $post->ID, '_cmb_wwd2', true ); echo $image2;  ?>"></div>
				<?php endif; ?>	
				<?php global $post; $image3 = get_post_meta( $post->ID, '_cmb_wwd3', true ); if( $image3 != '' ) :  ?>
				    <div class="item"><img class="lazyOwl" data-src="<?php global $post; $image3 = get_post_meta( $post->ID, '_cmb_wwd3', true ); echo $image3;  ?>"></div>
				<?php endif; ?>	
				</div>			
			</div>
<?php
}	
?>			
			<div class="eight columns">
				<h5><?php the_title(); ?></h5>
				<?php the_content(); ?>
			</div>
			<div id="WhatWequote" class="row">
				<div class="whatquote">
				<div class="push_four five columns quote">
					<div id="cbp-qtrotator" class="cbp-qtrotator">
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
						<div class="quote cbp-qtcontent">
					
							
							<div class="quote-content"><?php the_content(); ?></div>
							<cite class="quote-author"><?php the_title(); ?></cite>
						</div>
						<?php endwhile; ?>
						
						<?php 
						// Prevent weirdness
						wp_reset_postdata();
						
						endif;
						?>	
					</div>	
				</div>
				</div>
			</div>
			<?php endwhile; ?>
			
			<?php endif; ?>