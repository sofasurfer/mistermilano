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
        PostTypes::instance()->register_post_type('team', 'data:image/svg+xml;base64,' . base64_encode('<svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M6.72 20.492c1.532.956 3.342 1.508 5.28 1.508 1.934 0 3.741-.55 5.272-1.503l1.24 1.582c-1.876 1.215-4.112 1.921-6.512 1.921-2.403 0-4.642-.708-6.52-1.926l1.24-1.582zm6.405-.992l-.594.391c-.077.069-.19.109-.307.109h-.447c-.118 0-.231-.04-.308-.109l-.594-.391h2.25zm10.875-.5h-6c0-1.105.895-2 2-2h2c.53 0 1.039.211 1.414.586s.586.883.586 1.414zm-18 0h-6c0-1.105.895-2 2-2h2c.53 0 1.039.211 1.414.586s.586.883.586 1.414zm7.146-.5c.138 0 .25.112.25.25s-.112.25-.25.25h-2.279c-.138 0-.25-.112-.25-.25s.112-.25.25-.25h2.279zm.247-.5c0-2.002 1.607-2.83 1.607-4.614 0-1.86-1.501-2.886-3.001-2.886s-2.999 1.024-2.999 2.886c0 1.784 1.607 2.639 1.607 4.614h2.786zm7.607-6c1.242 0 2.25 1.008 2.25 2.25s-1.008 2.25-2.25 2.25-2.25-1.008-2.25-2.25 1.008-2.25 2.25-2.25zm-18 0c1.242 0 2.25 1.008 2.25 2.25s-1.008 2.25-2.25 2.25-2.25-1.008-2.25-2.25 1.008-2.25 2.25-2.25zm12.87 2.385l1.349.612-.413.911-1.298-.588c.15-.3.275-.608.362-.935zm-7.739 0c.087.332.208.631.36.935l-1.296.588-.414-.911 1.35-.612zm9.369-1.885v1h-1.501c.01-.335-.02-.672-.093-1h1.594zm-9.406 0c-.072.327-.102.663-.092.997v.003h-1.502v-1h1.594zm6.928-1.714l1.242-.882.579.816-1.252.888c-.146-.291-.335-.566-.569-.822zm-6.044-.001c-.23.252-.418.525-.569.823l-1.251-.888.578-.816 1.242.881zm4.435-1.046l.663-1.345.897.443-.664 1.345c-.278-.184-.58-.332-.896-.443zm-2.826-.001c-.315.11-.618.258-.897.442l-.663-1.343.897-.443.663 1.344zm-2.587-9.054v2.149c-2.938 1.285-5.141 3.942-5.798 7.158l-2.034-.003c.732-4.328 3.785-7.872 7.832-9.304zm8 0c4.047 1.432 7.1 4.976 7.832 9.304l-2.034.003c-.657-3.216-2.86-5.873-5.798-7.158v-2.149zm-3.5 8.846c-.334-.039-.654-.041-1-.001v-1.529h1v1.53zm2.5-2.53h-6c0-1.105.895-2 2-2h2c.53 0 1.039.211 1.414.586s.586.884.586 1.414zm-3-7c1.242 0 2.25 1.008 2.25 2.25s-1.008 2.25-2.25 2.25-2.25-1.008-2.25-2.25 1.008-2.25 2.25-2.25z"/></svg>'), [
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
        ], false, false, ['title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes']);

        if(!function_exists("register_field_group"))
            return;
    }
}

Team::instance();