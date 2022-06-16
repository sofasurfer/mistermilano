<?php

// Namespace declaration
namespace Neofluxe\PostType;

use Neofluxe\PostTypes;

// Exit if accessed directly 
defined( 'ABSPATH' ) or die;

class Projects {

	private static $instance;

	public static function instance() {
		return self::$instance ?: ( self::$instance = new self() );
	}

	private function __construct() {
		add_action( 'init', [ $this, 'register' ] );
	}

	public function register() {
		PostTypes::instance()->register_post_type( 'projects', 'data:image/svg+xml;base64,' . base64_encode('<svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M13 2h2v2h1v19h1v-15l6 3v12h1v1h-24v-1h1v-11h7v11h1v-19h1v-2h2v-2h1v2zm8 21v-2h-2v2h2zm-15 0v-2h-3v2h3zm8 0v-2h-3v2h3zm-2-4v-13h-1v13h1zm9 0v-1h-2v1h2zm-18 0v-2h-1v2h1zm4 0v-2h-1v2h1zm-2 0v-2h-1v2h1zm9 0v-13h-1v13h1zm7-2v-1h-2v1h2zm-18-1v-2h-1v2h1zm2 0v-2h-1v2h1zm2 0v-2h-1v2h1zm14-1v-1h-2v1h2zm0-2.139v-1h-2v1h2z"/></svg>'), [
			'name'               => __( 'Projects', 'neofluxe' ),
			'singular_name'      => __( 'Project', 'neofluxe' ),
			'menu_name'          => __( 'Projects', 'neofluxe' ),
			'all_items'          => __( 'All Projects', 'neofluxe' ),
			'add_new'            => __( 'Add Project', 'neofluxe' ),
			'add_new_item'       => __( 'New Project', 'neofluxe' ),
			'edit_item'          => __( 'Edit Project', 'neofluxe' ),
			'new_item'           => __( 'New Project', 'neofluxe' ),
			'view_item'          => __( 'Show Project', 'neofluxe' ),
			'search_items'       => __( 'Search Projects', 'neofluxe' ),
			'not_found'          => __( 'Project has not been found.', 'neofluxe' ),
			'not_found_in_trash' => __( 'Project not found in the trash', 'neofluxe' ),
		], [
			'en' => 'projects'
		], false, true, [ 'title', 'excerpt', 'revisions', 'page-attributes', 'thumbnail' ] );

		if ( ! function_exists( "register_field_group" ) ) {
			return;
		}
	}
}

Projects::instance();