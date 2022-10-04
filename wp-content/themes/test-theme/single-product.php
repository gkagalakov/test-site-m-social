<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();
?>

	<main class="container">

		<?php
		while ( have_posts() ) :
			the_post();

			 $slides = carbon_get_post_meta(get_the_ID(), 'crb_media_gallery');
										foreach ($slides as $slide):
									?>
									<div class="img-post"><img src="<?php echo wp_get_attachment_image_url($slide, 'large'); ?>" alt="Image"></div>
									<?php endforeach; ?>
									<h4 class="text-danger"><span>Цена:</span> <?php echo carbon_get_the_post_meta('crb_phone_number'); ?> <span>руб</span></h4>
<?php
			get_template_part( 'template-parts/content', get_post_type() ); ?>

			<h4 class=""><span>Производитель:</span> <?php echo carbon_get_the_post_meta('crb_available'); ?> </h4>
			<p class=""><span>Комплектация:</span> <?php echo carbon_get_the_post_meta('crb_phone_numbers'); ?> </p>

		<?php	the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'test-theme' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'test-theme' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
