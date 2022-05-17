<?php

// Namespace declaration
namespace Neofluxe\PostType;

use Neofluxe\PostTypes;

// Exit if accessed directly 
defined('ABSPATH') or die;

class Portfolio {

    private static $instance;

    public static function instance() {
        return self::$instance ?: (self::$instance = new self());
    }

    private function __construct() {
        add_action('init', [$this, 'register']);
    }

    public function register() {
        PostTypes::instance()->register_post_type('portfolio', 'dashicons-star-filled', [
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio',
            'menu_name' => 'Portfolio',
            'all_items' => 'All Portfolio',
            'add_new' => 'Add Portfolio',
            'add_new_item' => 'New Portfolio',
            'edit_item' => 'Edit Portfolio',
            'new_item' => 'New Portfolio',
            'view_item' => 'Show Portfolio',
            'search_items' => 'Search Portfolio',
            'not_found' => 'Portfolio has not been found.',
            'not_found_in_trash' => 'Portfolio not found in the trash'
        ], [
            'en' => 'portfolio'
        ], false, true,['title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes']);

        if(!function_exists("register_field_group"))
            return;
    }
}

Portfolio::instance();