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

			
										$thumbnail_id = carbon_get_post_meta(get_the_ID(),'crb_image');
										$thumbnail_url = wp_get_attachment_image_url( $thumbnail_id, 'full' );
									?>
									<img src="<?php echo $thumbnail_url; ?>" alt="" />
									<p><?php echo carbon_get_post_meta( get_the_ID(), 'eta' );  ?></p>
<?php
			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
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
