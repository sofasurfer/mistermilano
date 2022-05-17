<?php

// Namespace declaration
namespace Neofluxe\PostType;

use Neofluxe\PostTypes;

// Exit if accessed directly 
defined('ABSPATH') or die;

class Team {

    private static $instance;

    public static function instance() {
        return self::$instance ?: (self::$instance = new self());
    }

    private function __construct() {
        add_action('init', [$this, 'register']);
    }

    public function register() {
        PostTypes::instance()->register_post_type('team', 'dashicons-star-filled', [
            'name' => 'Team members',
            'singular_name' => 'Team members',
            'menu_name' => 'Team',
            'all_items' => 'All Team members',
            'add_new' => 'Add Team member',
            'add_new_item' => 'New Team member',
            'edit_item' => 'Edit Team member',
            'new_item' => 'New Team member',
            'view_item' => 'Show Team member',
            'search_items' => 'Search Team',
            'not_found' => 'Team member has not been found.',
            'not_found_in_trash' => 'Team member not found in the trash'
        ], [
            'en' => 'team'
        ], false, true,['title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'editor']);

        if(!function_exists("register_field_group"))
            return;
    }
}

Team::instance();