<?php
/**
 * The header for our theme
 *
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body>

<header class="navbar navbar-expand-lg bg-light">
	<div class="container">
      <span class="navbar-brand logo-site"><?php the_custom_logo(); ?></span>
    	<a class="navbar-brand text-success" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    	
    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      		<span class="navbar-toggler-icon"></span>
    	</button>

    	<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
     	
     	<?php
  			wp_nav_menu(
  				array(
  					'theme_location' => 'menu-1',
  					'menu_id'        => 'primary-menu',
  					'menu_class'	=> 'navbar-nav navbar-right ',
  				)
  			);
		?>

    </div>
  </div>
</header>
