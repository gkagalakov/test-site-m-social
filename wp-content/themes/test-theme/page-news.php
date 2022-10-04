<?php
/**
 * The template for news page
 *
 */

get_header();
?>

	<main class="container">
		<?php the_title( '<h1 class="entry-title h3 text-center m-3">', '</h1>' ); ?>
		<?php

			//$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$params = array(
				'posts_per_page' => 12, 
				'post_type'       => 'news',
				//'paged'           => $current_page,
				'meta_query' => array(
					'date_key' =>array(
						'key' => 'eta',
						'compare' => 'EXISTS',
						'type' => 'DATE',
						)
					),
					'orderby' => array(
					'price' => 'DECS'
					)
				);
			
			query_posts($params);
 
			//$wp_query->is_archive = true;
			//$wp_query->is_home = false;

			?>

				<div class="container text-left">
  					<div class="row row-cols-1 row-cols-md-2 row-cols-xxl-3">

			  			<?php 
						 
						while(have_posts()): the_post(); 
							?>
							

								<div class="col card">
									<?php 
										$thumbnail_id = carbon_get_post_meta(get_the_ID(),'crb_image');
										$thumbnail_url = wp_get_attachment_image_url( $thumbnail_id, 'full' );
									?>
									<img src="<?php echo $thumbnail_url; ?>" alt="" />
									<p><?php echo carbon_get_post_meta( get_the_ID(), 'eta' );  ?></p>
									
			    					<h2 class="h4"><?php the_title() ?></h2>
									<p><?php the_excerpt() ?></p>
									<a class="btn btn-primary stretched-link" href="<?php  echo get_permalink() ?>">More</a>
								</div>
			    				
						<?php	
						endwhile;
			 			?>
 				</div>
			</div>

	</main><!-- #main -->


<?php
get_sidebar();
get_footer();
