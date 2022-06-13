<?php

// Namespace declaration
namespace Neofluxe\PostType;

use Neofluxe\PostTypes;

// Exit if accessed directly 
defined('ABSPATH') or die;

class Call_to_action {

    private static $instance;

    public static function instance() {
        return self::$instance ?: (self::$instance = new self());
    }

    private function __construct() {
        add_action('init', [$this, 'register']);
    }

    public function register() {
        PostTypes::instance()->register_post_type('cta', 'dashicons-megaphone', [
            'name' => 'Call to action',
            'singular_name' => 'Call to action',
            'menu_name' => 'Call to action',
            'all_items' => 'All CTAs',
            'add_new' => 'Add CTA',
            'add_new_item' => 'New CTA',
            'edit_item' => 'Edit CTA',
            'new_item' => 'New CTA',
            'view_item' => 'Show CTA',
            'search_items' => 'Search CTA',
            'not_found' => 'CTA has not been found.',
            'not_found_in_trash' => 'CTA not found in the trash',
            'publicly_queryable'  => false,
        ], [
            'en' => 'cta'
        ], false, true,['title', 'revisions', 'page-attributes']);

        if(!function_exists("register_field_group"))
            return;
    }
}

Call_to_action::instance();