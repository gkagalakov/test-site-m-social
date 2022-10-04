<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'post_meta', 'Подробнее' )
		->where( 'post_type', '=', 'news' )
		->add_fields( array(
 
			Field::make( 'image', 'crb_image', __( 'Image' ) ),
			Field::make( 'date', 'eta', __( 'Estimated time of arrival' ) )
				
		) );
				
 	Container::make( 'post_meta', 'Подробнее' )
		->where( 'post_type', '=', 'product' )
		->add_fields( array(
 
			Field::make( 'media_gallery', 'crb_media_gallery', __( 'Media Gallery' ) )
    		->set_type( array( 'image', 'video' ) ),
			Field::make( 'textarea', 'crb_phone_numbers', __( 'Комплектация' ) ),
			Field::make( 'multiselect', 'crb_available', __( 'Производитель' ) )
			->add_options( array(
				'Apple' => 'Apple',
				'Google' => 'Google',
				'Xiaomi' => 'Xiaomi',
			) ),
			Field::make( 'text', 'crb_phone_number', __( 'Цена' ) )
			->set_attribute( 'type', 'number' ),
				
	) );
}

