<?php
/**
 * The template for store page
 *
 */

get_header();
?>

	<main class="container">
		<?php the_title( '<h1 class="entry-title h3 text-center m-3">', '</h1>' ); ?>
		<?php

			//$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$params = array(
				'posts_per_page' => 12, // количество постов на странице
				'post_type'       => 'product', // тип постов
				//'paged'           => $current_page // текущая страница
				'meta_query' => array(
					'price' => array(
						'key' => 'crb_phone_number',
						'compare' => 'EXISTS',
						'type' => 'NUMERIC'
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

				<div class="container text-left ">
  					<div class="row row-cols-1 row-cols-md-3 row-cols-xxl-3 gy-5 gx-5">

			  			<?php 
						 
						while(have_posts()): the_post(); ?>

								<div class="col p-5 card">
									<?php $slides = carbon_get_post_meta(get_the_ID(), 'crb_media_gallery');
										foreach ($slides as $slide):
									?>
									<img src="<?php echo wp_get_attachment_image_url($slide, 'full'); ?>" alt="Image">
									<?php endforeach; ?>

			    						<h2 class="h4"><?php the_title(); ?></h2>
										<p><?php the_excerpt(); ?></p>
										<h4 class="text-danger"><span>Цена:</span> <?php echo carbon_get_the_post_meta('crb_phone_number'); ?> <span>руб</span></h4>
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
