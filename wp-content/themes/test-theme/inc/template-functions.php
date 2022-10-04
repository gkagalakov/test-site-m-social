<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Test_theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function test_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'test_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function test_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'test_theme_pingback_header' );

/* add custom type post*/

add_action( 'init', 'first_register_post_type_init' );

function first_register_post_type_init() {
 
	$labels = array(
		'name' => 'Новости',
		'singular_name' => 'Новость',
		'add_new' => 'Добавить новость',
		'add_new_item' => 'Добавить новость',
		'edit_item' => 'Редактировать новость',
		'new_item' => 'Новая новость',
		'all_items' => 'Все новости',
		'search_items' => 'Искать новость',
		'not_found' =>  'Новостей по заданным критериям не найдено.',
		'not_found_in_trash' => 'В корзине нет новости.',
		'menu_name' => 'Новости'
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-media-document',
		'menu_position' => 4,
		'supports' => array( 'title', 'editor' ),
		'capability_type'     => 'post',
		'show_in_rest' => true,
	);
 
	register_post_type( 'news', $args );
}

add_action( 'init', 'second_register_post_type_init' );

function second_register_post_type_init() {
 
	$labels = array(
		'name' => 'Продукция',
		'singular_name' => 'Продукт',
		'add_new' => 'Добавить продукт',
		'add_new_item' => 'Добавить продукт',
		'edit_item' => 'Редактировать продукт',
		'new_item' => 'Новая продукт',
		'all_items' => 'Вся продукция',
		'search_items' => 'Искать продукт',
		'not_found' =>  'Продукции по заданным критериям не найдено.',
		'not_found_in_trash' => 'В корзине нет продукции.',
		'menu_name' => 'Продукция'
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-store',
		'menu_position' => 4,
		'supports' => array( 'title', 'editor' ),
		'capability_type'     => 'post',
		'show_in_rest' => true,
	);
 
	register_post_type( 'product', $args );
}

/*add class menu-link*/

function add_specific_menu_location_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    if( $args->theme_location == 'menu-1' ) {
      // add the desired attributes:
      $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );

/*excerpt*/

add_filter( 'excerpt_length', function(){
	return 42;
} );

add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
	//global $post;
	//return '...<br><br><a href="'. get_permalink($post) .'" class="link-read-more" >'. __( 'More', 'theme-test' ) .'</a>';
	return '...';
}