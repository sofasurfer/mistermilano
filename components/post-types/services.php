<?php

// Namespace declaration
namespace Neofluxe\PostType;

use Neofluxe\PostTypes;

// Exit if accessed directly 
defined('ABSPATH') or die;

class Service {

    private static $instance;

    public static function instance() {
        return self::$instance ?: (self::$instance = new self());
    }

    private function __construct() {
        add_action('init', [$this, 'register']);
    }

    public function register() {
        PostTypes::instance()->register_post_type('service', 'dashicons-clipboard', [
            'name' => 'Service',
            'singular_name' => 'Service',
            'menu_name' => 'Services',
            'all_items' => 'All Services',
            'add_new' => 'Add Service',
            'add_new_item' => 'New Service',
            'edit_item' => 'Edit Service',
            'new_item' => 'New Service',
            'view_item' => 'Show Service',
            'search_items' => 'Search Service',
            'not_found' => 'Service has not been found.',
            'not_found_in_trash' => 'Service not found in the trash',
            'publicly_queryable'  => false,
        ], [
            'en' => 'services'
        ], false, false, false, ['title', 'editor', 'revisions', 'page-attributes']);

        if(!function_exists("register_field_group"))
            return;
    }
}

Service::instance();
