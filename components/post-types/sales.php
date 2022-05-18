<?php

// Namespace declaration
namespace Neofluxe\PostType;

use Neofluxe\PostTypes;

// Exit if accessed directly 
defined( 'ABSPATH' ) or die;

class Sale {

	private static $instance;

	public static function instance() {
		return self::$instance ?: ( self::$instance = new self() );
	}

	private function __construct() {
		add_action( 'init', [ $this, 'register' ] );
	}

	public function register() {
		PostTypes::instance()->register_post_type( 'sales', 'dashicons-money-alt', [
			'name'               => __( 'Sales', 'neofluxe' ),
			'singular_name'      => __( 'Sale', 'neofluxe' ),
			'menu_name'          => __( 'Sales', 'neofluxe' ),
			'all_items'          => __( 'All Sales', 'neofluxe' ),
			'add_new'            => __( 'Add Sales', 'neofluxe' ),
			'add_new_item'       => __( 'New Sale', 'neofluxe' ),
			'edit_item'          => __( 'Edit Sale', 'neofluxe' ),
			'new_item'           => __( 'New Sale', 'neofluxe' ),
			'view_item'          => __( 'Show Sale', 'neofluxe' ),
			'search_items'       => __( 'Search Sale', 'neofluxe' ),
			'not_found'          => __( 'Sale has not been found.', 'neofluxe' ),
			'not_found_in_trash' => __( 'Sale not found in the trash', 'neofluxe' ),
		], [
			'en' => 'sales'
		], false, true, [ 'title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ] );

		if ( ! function_exists( "register_field_group" ) ) {
			return;
		}
	}
}

Sale::instance();