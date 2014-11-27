<?php get_header(); ?>
	
	<div class="row">
		<div class="twelve columns">		
			<ul class="cat_list">
				<li><a href="/work/english-language-projects/">Selected English projects</a></li>
				<li class="active"><a href="/work/localisation-projects/">Selected Localisation projects</a></li>
			</ul>
			<div class="row filtered">
    		<?php
    			$args = array (
    				'post_type' => 'projects',
    				'posts_per_page' => '12',
    				'category_name' => 'localisation-projects',
    				'order' => 'DESC',
    				'orderby' => 'menu_order'
    			);
    			$projects = new WP_Query( $args );if ( $projects->have_posts() ) {
    				while ( $projects->have_posts() ) {
    					$projects->the_post();
    		?>	
    			<div class="four columns <?php $post_cats = get_the_category(); foreach( $post_cats as $category ) { echo $category->slug.' ';} ?>">
    				<div class="row">
    					<div class="twelve columns">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slider'); ?></a>
    					</div>
    				</div>
    				<div class="row">
    					<div class="twelve columns">
							<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>					
    					</div>
    				</div>
    			</div>
    			<?php $counter++;
                  if ($counter % 3 == 0) {
                  echo '</div><div class="row filtered">';
                }
                ?>
    		<?php
    				}
    			} else {
    				// no posts found
    			}
    			
    			// Restore original Post Data
    			wp_reset_postdata();
    		?>		
    		</div>
		</div>
	</div>	
	
<?php get_footer(); ?>