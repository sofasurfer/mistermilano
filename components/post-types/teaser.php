<?php

// Namespace declaration
namespace Neofluxe\PostType;

use Neofluxe\PostTypes;

// Exit if accessed directly 
defined('ABSPATH') or die;

class Teaser {

    private static $instance;

    public static function instance() {
        return self::$instance ?: (self::$instance = new self());
    }

    private function __construct() {
        add_action('init', [$this, 'register']);
    }

    public function register() {
        PostTypes::instance()->register_post_type('teaser', 'dashicons-star-filled', [
            'name' => 'Teaser',
            'singular_name' => 'Teaser',
            'menu_name' => 'Teasers',
            'all_items' => 'All Teasers',
            'add_new' => 'Add Teaser',
            'add_new_item' => 'New Teaser',
            'edit_item' => 'Edit Teaser',
            'new_item' => 'New Teaser',
            'view_item' => 'Show Teaser',
            'search_items' => 'Search Teaser',
            'not_found' => 'Teaser has not been found.',
            'not_found_in_trash' => 'Teaser not found in the trash'
        ], [
            'en' => 'teaser'
        ], false, true,['title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes']);

        if(!function_exists("register_field_group"))
            return;
    }
}

Teaser::instance();