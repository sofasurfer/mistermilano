<?php

// Namespace declaration
namespace Neofluxe;

// Exit if accessed directly 
defined( 'ABSPATH' ) or die;


/**
 * General hooks
 */
class General {

	/**
	 * The singleton instance of this class.
	 * @var General
	 */
	private static $instance;

	/**
	 * Gets the singleton instance of this class.
	 * This instance is lazily instantiated if it does not already exist.
	 * The given instance can be used to unregister from filter and action hooks.
	 *
	 * @return General The singleton instance of this class.
	 */
	public static function instance() {
		return self::$instance ?: ( self::$instance = new self() );
	}


	/**
	 * Creates a new instance of this singleton.
	 */
	private function __construct() {

		add_action( 'wp_enqueue_scripts', [ $this, 'c_wp_enqueue_scripts' ], 100 );
		add_action( 'admin_enqueue_scripts', [ $this, 'c_admin_enqueue_scripts' ], 100 );

		add_action( 'init', [ $this, 'c_init' ] );
		add_action( 'init', [ $this, 'c_register_maim_menu' ] );
		add_action( 'init', [ $this, 'register_blocks' ] );
		add_action( 'admin_head', [ $this, 'my_custom_admin_css' ] );
//		add_action( 'wp_enqueue_scripts', [ $this, 'c_remove_wp_block_library_css' ], 100 );
		add_action( 'wp_print_styles', [ $this, 'c_remove_dashicons' ], 100 );
		add_action( 'admin_menu', [ $this, 'c_dynamic_archive_pages' ], 100 );

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

		add_shortcode( 'render_animation_elements', [ $this, 'render_animation_elements' ] );
		add_shortcode( 'wp_version', [ $this, 'c_shortcode_version' ] );
		add_shortcode( 'c_post_language_url', [ $this, 'c_shortcode_post_languages' ] );
		add_shortcode( 'c_post_locale', [ $this, 'c_shortcode_post_locale' ] );
		add_shortcode( 'c_get_categories', [ $this, 'c_shortcode_get_categories' ] );
		add_shortcode( 'c_option', [ $this, 'c_shortcode_option' ] );
		add_shortcode( 'c_contact_info', [ $this, 'c_shortcode_contact_info' ] );

		add_filter( 'c_get_pagetitle', [ $this, 'c_get_pagetitle' ] );
		add_filter( 'c_convert_phone_number', [ $this, 'c_convert_phone_number' ] );
		add_filter( 'c_get_ogobj', [ $this, 'c_get_ogobj' ] );
		add_filter( 'login_redirect', [ $this, 'glue_login_redirect' ], 999 );
		add_filter( 'upload_mimes', [ $this, 'cc_mime_types' ] );
		add_filter( 'acf/format_value/type=textarea', [ $this, 'c_format_value' ], 10, 3 );
		add_filter( 'acf/fields/google_map/api', [ $this, 'my_acf_google_map_api' ] );
		add_filter( 'c_latest_post', [ $this, 'c_latest_post' ] );
		add_filter( 'c_get_instagram_feed', [ $this, 'get_instagram_feed' ], 10, 3 );
		add_filter( 'c_get_document_info', [ $this, 'c_get_document_info' ], 10, 1 );
		add_filter( 'c_get_team_paging', [ $this, 'c_get_team_paging' ], 10 );
		add_filter( 'c_get_option', [ $this, 'c_get_option' ], 10, 1 );
		add_filter( 'c_check_linktype', [ $this, 'c_check_linktype' ] );
		add_filter( 'c_get_breadcrumbs', [ $this, 'the_breadcrumbs' ], 10, 1 );
		add_filter( 'c_render_picturetag', [ $this, 'c_shortcode_render_picture' ] );
		add_filter( 'c_render_socialmedia', [ $this, 'c_render_socialmedia' ] );
		add_filter( 'use_block_editor_for_post', '__return_false' );

		add_filter( 'acf/fields/wysiwyg/toolbars', [ $this, 'c_toolbars' ] );
		add_filter( 'tiny_mce_before_init', [ $this, 'c_tiny_mce_before_init' ] );

		add_filter( 'nav_menu_css_class', [ $this, 'c_special_nav_class' ], 10, 2 );
		add_filter( 'nav_menu_link_attributes', [ $this, 'add_class_to_menu' ], 10, 4 );

		add_filter( 'get_file_from_dist', [ $this, 'c_get_file_with_hash_from_manifest' ], 10, 2 );
		add_filter( 'robots_txt', [ $this, 'c_add_robots_entries' ], 99, 2 );

		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );

		load_theme_textdomain( 'neofluxe', get_stylesheet_directory() . '/languages' );

		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page();
		}
	}

	/**
	 * The c_dynamic_archive_pages function adds an options page to the WordPress admin area.
	 * That page is titled “Archive Pages” and is accessible from the Settings menu.
	 *
	 * The options page contains a form with a dropdown for each custom post type.
	 * Those dropdowns allow the user to select a page from a list of all available pages in the WordPress instance.
	 * When the form is submitted, the selected pages are saved to the WordPress database using the update_option function.
	 *
	 * Nore that "post" is the blog
	 *
	 * @example
	 * $post_type   = 'my_custom_post_type';
	 * $page_id     = get_option('archive_' . $post_type);
	 *
	 * @return void
	 */
	function c_dynamic_archive_pages(): void {
		add_options_page( 'Archive Pages', 'Archive Pages 🔗', 'manage_options', 'c-archive-pages', function () {
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}
			$args       = array(
				'public'   => true,
				'_builtin' => false
			);
			$output     = 'names';
			$operator   = 'and';
			// used for blog posts
			$post_types = get_post_types( $args, $output, $operator );
			$post_types[] = 'post';
			$pages      = get_pages();

			echo '<div class="wrap">';
			echo '<h2>' . __( 'Archive Page Linking', 'neofluxe' ) . '</h2>';

			if ( isset( $_POST['submit'] ) ) {
				foreach ( $post_types as $post_type ) {
					$option_name = 'archive_' . $post_type;
					update_option( $option_name, $_POST[ $post_type ] );
				}
				echo '<div id="message" class="updated"><p>' . __( 'Option saved.', 'neofluxe' ) . '</p></div>';
			}

			echo '<form method="post" action="" class="c-archivepage-form">';

			foreach ( $post_types as $post_type ) {
				$option_name = 'archive_' . $post_type;
				$title = $post_type;

				if ($title === 'post') {
					$title = 'post (blog)';
				}

				echo '<h3>' . $title . '</h3>';
				echo '<select name="' . $post_type . '">';
				echo '<option value=""></option>';
				foreach ( $pages as $page ) {
					echo '<option value="' . $page->ID . '"' . selected( get_option( $option_name ), $page->ID ) . '>' . $page->post_title . '</option>';
				}
				echo '</select>';
				echo '<br />';
			}

			echo '<input type="submit" class="button button-primary" name="submit" value="' . __( 'Save', 'neofluxe' ) . '" style="margin-top: 10px;" />';
			echo '</form>';
			echo '</div>';
		} );
	}

	/**
	 * Adds rules/entries to the WP Robots.txt file.
	 *
	 * Add Disallow for some file types.
	 * Add "Disallow: /wp-login.php/\n".
	 * Remove "Allow: /wp-admin/admin-ajax.php\n".
	 * Calculate and add a "Sitemap:" link.
	 *
	 * @param $output
	 * @param $public
	 *
	 * @return string
	 */
	function c_add_robots_entries( $output, $public ) {
		/**
		 * If "Search engine visibility" is disabled,
		 * strongly tell all robots to go away.
		 */
		if ( '0' == $public ) {

			$output = "User-agent: *\nDisallow: /\nDisallow: /*\nDisallow: /*?\n";

		} else {

			/**
			 * Get site path.
			 */
			$site_url = parse_url( site_url() );
			$path     = ( ! empty( $site_url['path'] ) ) ? $site_url['path'] : '';

			/**
			 * Add new disallow.
			 */
			$output .= "Disallow: $path/wp-login.php\n";
			$output .= "Disallow: $path/wp-admin\n";

			/**
			 * Disallow some file types
			 */
			foreach ( [ 'jpeg', 'jpg', 'gif', 'png', 'mp4', 'webm', 'woff', 'woff2', 'ttf', 'eot' ] as $ext ) {
				$output .= "Disallow: /*.{$ext}$\n";
			}

			/**
			 * Remove line that allows robots to access AJAX interface.
			 */
			$robots = preg_replace( '/Allow: [^\0\s]*\/wp-admin\/admin-ajax\.php\n/', '', $output );

			/**
			 * If no error occurred, replace $output with modified value.
			 */
			if ( null !== $robots ) {
				$output = $robots;
			}
			/**
			 * Calculate and add a "Sitemap:" link.
			 * Modify as needed.
			 */
			$output .= "Sitemap: {$site_url[ 'scheme' ]}://{$site_url[ 'host' ]}/wp_sitemap.xml\n";
		}

		return $output;

	}

	/**
	 * Registers the block using the metadata loaded from the `block.json` file.
	 * Behind the scenes, it registers also all assets so they can be enqueued
	 * through the block editor in the corresponding context.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	function register_blocks() {
		$directory = get_template_directory() . '/src/scripts/blocks';
		register_block_type(
			$directory . '/anchors/block.json',
//			[ 'render_callback' => [$this, 'render_block_core_notice'] ]
		);
		register_block_type(
			$directory . '/anchors/inner-block.json',
//			[ 'render_callback' => [$this, 'render_block_core_notice'] ]
		);

	}

	/**
	 * Load the CSS & Javascript files
	 */
	function c_wp_enqueue_scripts() {
		$theme             = wp_get_theme();
		$file_with_path_js = apply_filters( 'get_file_from_dist', 'index.js', true );
		wp_enqueue_script( 'nf-scripts', $file_with_path_js, '', $theme->Version, true );

		$file_with_path_css = apply_filters( 'get_file_from_dist', 'index.css', true );
		wp_enqueue_style( 'nf-styles', $file_with_path_css, '', $theme->Version, 'all' );
	}

	/**
	 * Load the CSS & Javascript files for the admin
	 */
	function c_admin_enqueue_scripts() {
		$theme             = wp_get_theme();
		$file_with_path_js = apply_filters( 'get_file_from_dist', 'editor.js', true );
		wp_enqueue_script( 'nf-editor-scripts', $file_with_path_js, '', $theme->Version, true );

		$file_with_path_css = apply_filters( 'get_file_from_dist', 'editor.css', true );
		wp_enqueue_style( 'nf-editor-styles', $file_with_path_css, '', $theme->Version, 'all' );
	}

	/** Remove Dashicons from Admin Bar for non logged in users **/
	function c_remove_dashicons() {
		if ( ! is_admin_bar_showing() && ! is_customize_preview() ) {
			wp_dequeue_style( 'dashicons' );
			wp_deregister_style( 'dashicons' );
		}
	}

	/**
	 * Returns a list of all the breadcrumbs for the current page.
	 * usage: apply_filters( 'c_get_breadcrumbs', false )
	 *
	 * @param $max_depth int
	 *
	 * @return string
	 */
	function the_breadcrumbs() {
		$crumbs          = '';
		$current_page_id = get_the_ID();
		$parent          = wp_get_post_parent_id( $current_page_id );
		$index           = 0;

		while ( $parent ) {
			$index ++;
			$crumbs = '<li><a href="' . get_permalink( $parent ) . '">' . get_the_title( $parent ) . '</a></li>' . $crumbs;
			$parent = wp_get_post_parent_id( $parent );

			if ( $index > 10 ) {
				break;
			}
		}

		return $crumbs . '<li><a>' . get_the_title( $current_page_id ) . '</a></li>';
	}

	/**
	 * Returns a List of all the social media links that are filled in the theme options.
	 * If you add a new file, check that the ACF-field is named the same as the file.
	 *
	 * Usage: apply_filters( 'c_render_socialmedia', false )
	 */
	function c_render_socialmedia(): string {
		$options = get_fields( 'options' );
		$fields  = $options['social_media'];

		$html = '<ul class="social-media">';

		foreach ( $fields as $key => $url ) {
			if ( $url ) {
				$title = $key ?? '';

				$path  = "images/social_media/$key.svg";
				$image = apply_filters( 'get_file_from_dist', $path );

				if ( ! $image ) {
					continue;
				}

				$html .= "<li class='social-media__item'>
                        <a href='$url' target='_blank' class='social-media__item__link'>
                            <img src='$image' alt='$title' class='social-media__item__icon'>
                        </a>
                    </li>";
			}
		}

		$html .= '</ul>';

		return $html;
	}

	/**
	 * Remove Gutenberg Block Library CSS from loading on the frontend
	 */
	function c_remove_wp_block_library_css() {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
	}

	/**
	 * Gets file from the dist folder through the manifest.json file.
	 *
	 * Usage: apply_filters( 'get_file_from_dist', 'images/ico/example.png' );
	 */
	public function c_get_file_with_hash_from_manifest( $filename, $with_template_path = true ) {
		$path_to_manifest = get_template_directory() . "/dist/manifest.json";
		// Grab contents and decode them into an array
		$data     = json_decode( file_get_contents( $path_to_manifest ), true );
		$filename = $data[ $filename ] ?? false;

		if ( ! $filename ) {
			return false;
		}

		if ( $with_template_path ) {
			$filename = get_template_directory_uri() . "/dist/" . $filename;
		}

		return $filename;

	}

	public function c_init() {

		setcookie( "hideloader", 'true' );

		add_post_type_support( 'page', 'excerpt' );
		remove_post_type_support( 'post', 'editor' );
		remove_post_type_support( 'page', 'editor' );

		// Remove comments page in menu
		add_action( 'admin_menu', function () {
			remove_menu_page( 'edit-comments.php' );
		} );
	}

	public function cc_mime_types( $mimes = [] ) {
		$mimes['svg'] = 'image/svg+xml';

		return $mimes;
	}

	public function glue_login_redirect( $redirect_to, $request = '', $user = null ) {
		//using $_REQUEST because when the login form is submitted the value is in the POST
		if ( isset( $_REQUEST['redirect_to'] ) ) {
			$redirect_to = $_REQUEST['redirect_to'];
		}

		return $redirect_to;
	}

	public function c_register_maim_menu() {
		register_nav_menu( 'header-menu', __( 'Header Menu' ) );
		register_nav_menu( 'footer-menu', __( 'Footer Menu' ) );

	}

	public function c_special_nav_class( $classes, $item ) {
		if ( in_array( 'current-menu-item', $classes ) ) {
			$classes[] = 'c-active';
		}
		if ( $item->object_id == get_option( 'archive_blog' ) && get_post_type( get_queried_object_id() ) == 'post' ) {
			$classes[] = 'c-active ';
		}
		if ( $item->object_id == get_option( 'archive_services' ) && get_post_type( get_queried_object_id() ) == 'service' ) {
			$classes[] = 'c-active ';
		}

		return $classes;
	}

	public function add_class_to_menu( $atts, $item, $args, $depth ) {

		$atts['class'] = 'menu-item-link';

		return $atts;
	}

	public function my_acf_google_map_api() {
		$api['key'] = $this->c_get_option( 'google_maps_api_key' );

		return $api;
	}

	public function c_shortcode_version() {
		$my_theme = wp_get_theme( 'neofluxe' );
		if ( $my_theme->exists() ) {
			return $my_theme->get( 'Version' );
		}

		return 1.0;
	}


	public function c_shortcode_contact_info() {
		ob_start();
		get_template_part( 'templates/shortcode_contact', null, array(
				'email'    => $this->c_get_option( 'company_email' ),
				'tel'      => $this->c_get_option( 'company_phone' ),
				'tel_link' => str_replace( " ", "", $this->c_get_option( 'company_phone' ) ),
			)
		);

		return ob_get_clean();
	}


	/*
		Run do_shortcode on all textarea values
	*/
	public function c_format_value( $value, $post_id, $field ) {
		$value = do_shortcode( $value );

		return $value;
	}

	/*
		Reders categories for post
		ToDo: add link
	*/
	public function c_shortcode_get_categories( $args ) {

		$separator  = $args['separator'] ?? ' / ';
		$categories = get_the_terms( $args['pid'], $args['posttype'] );
		if ( ! empty( $categories ) && count( $categories ) > 0 ) {
			$cats = array();
			foreach ( $categories as $cat ) {
				array_push( $cats, $cat->name );
			}

			return implode( $separator, $cats );
		} else {
			return '';
		}
	}

	public function c_convert_phone_number( $number ) {
		return preg_replace( '~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $number ) . "\n";
	}

	public function c_get_pagetitle() {

		$pagetitle = get_the_title() . ' | ';
		if ( get_post_type() == 'service' ) {
			$pagetitle .= get_the_title( get_option( 'archive_services' ) ) . ' | ';
		} else if ( get_post_type() == 'post' ) {
			$pagetitle .= get_the_title( get_option( 'archive_blog' ) ) . ' | ';
		}

		return $pagetitle . get_bloginfo();
	}

	public function c_get_ogobj() {

		$obj                = [];
		$obj['locale']      = defined( 'ICL_LANGUAGE_CODE' ) ? ICL_LANGUAGE_CODE : get_locale();
		$obj['title']       = $this->c_get_pagetitle();
		$obj['description'] = get_field( 'acf_header_metadescription' );

		$image_id = false;
		if ( get_post_thumbnail_id() ) {
			$image_id = get_post_thumbnail_id();
		} else if ( get_field( 'acf_header_image_desktop' ) ) {
			$image_id = get_field( 'acf_header_image_desktop' );
		}
		if ( $image_id ) {
			$obj['image'] = wp_get_attachment_image_src( $image_id, 'medium' );
		}

		return $obj;
	}

	public function c_get_option( $key ) {

		$options = get_field( 'company', 'option' );
		if ( $options ) {
			$options = array_merge( $options, get_field( 'site', 'option' ) );
			$options = array_merge( $options, get_field( 'integrations', 'option' ) );
		} else {
			$options = array();
		}

		if ( array_key_exists( $key, $options ) ) {
			return $options[ $key ];
		} else {
			return 'Key ' . $key . ' not found';
		}


	}


	public function c_get_team_paging( $args ) {
		// Get posts
		global $wp_query;
		$news_query = array(
			'post_type'      => 'team',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'posts_per_page' => - 1,
		);
		$team       = get_posts( $news_query );

		$count  = 0;
		$active = false;
		$prev   = false;
		$next   = false;
		foreach ( $team as $member ) {
			if ( $member->ID == get_queried_object_id() ) {
				if ( $count > 0 ) {
					$prev = $team[ $count - 1 ];
				} else {
					$prev = $team[ count( $team ) - 1 ];
				}
				if ( $count < count( $team ) - 1 ) {
					$next = $team[ $count + 1 ];
				} else {
					$next = $team[0];
				}
				$active = $member;
			}
			$count ++;
		}

		return [
			'total'   => count( $team ),
			'current' => ( $active->menu_order + 1 ),
			'prev'    => $prev,
			'next'    => $next
		];
	}

	/*
		Shortcode to output theme options
	*/
	public function c_shortcode_option( $args ) {
		return $this->c_get_option( $args['key'] );
	}

	/**
	 *    Renders a picture, with images by their ID.
	 *    The first image is the default image, the others are for different screen sizes.
	 *
	 *    https://developer.mozilla.org/en-US/docs/Web/HTML/Element/picture
	 *
	 *    IMPORTANT:
	 *    - If using **min-width**, the the images should go from **large-viewport** to small-viewport.
	 *    - If using **max-width**, the images should go from **small-viewport** to large-viewport.
	 *
	 * ``` php
	 * <?php
	 *$args = [
	 *    'class'            => 'some-class',
	 *    'id'               => 'some-id',
	 *    'fallback_image_id' => 35,
	 *    'images'           => [
	 *        [
	 *            'id'    => 37,
	 *            'media' => '(min-width: 1500px)',
	 *            'size'  => 'large'
	 *        ],
	 *        [
	 *            'id'    => 36,
	 *            'media' => '(min-width: 1200px)',
	 *            'size'  => 'large'
	 *        ],
	 *        [
	 *            'id'    => 34,
	 *            'media' => '(min-width: 800px)',
	 *            'size'  => 'large'
	 *        ],
	 *    ]
	 *];
	 * ?>
	 * <?= apply_filters( 'c_render_picturetag', $args ); ?>
	 * ```
	 *
	 * @param $args array
	 *
	 * @return string
	 **/
	public function c_shortcode_render_picture( array $args ) {
		$images       = $args['images'];
		$id           = $args['id'] ?? false;
		$id_attribute = $id ? "id=\"$id\"" : '';
		// the <img> tag, used if nothing else matches
		$fallback_image_id     = $args['fallback_image_id'] ?? $images[0]['id'] ?? false;
		$fallback_image_src    = wp_get_attachment_image_src( $fallback_image_id );
		$fallback_image_srcset = wp_get_attachment_image_srcset( $fallback_image_id, 'medium' );
		$fallback_image_alt    = wp_get_attachment_caption( $fallback_image_id );
		$class_string          = $args['class'] ?? 'c-picture';
		$class_string          = $class_string === '' ? 'c-picture' : $class_string;
		$html                  = "<picture {$id_attribute} class='{$class_string}' >";


		foreach ( $images as $image ) {
			$id   = $image['id'];
			$size = $image['size'] ?? 'large';
			// the media query
			$media = $image['media'] ?? '';
			$image = wp_get_attachment_image_srcset( $id, $size );
			$html  .= "<source srcset='{$image}' media='{$media}' />";
		}

		$html .= "<img decoding='async' src='{$fallback_image_src[0]}' srcset='{$fallback_image_srcset}' alt='{$fallback_image_alt}' /></picture>";

		return $html;
	}


	public function render_animation_elements( $args ) {

		// apply_filters('the_content', get_post_field('post_content', get_queried_object_id() ) );
		$dom = new \DOMDocument();
		$dom->loadHTML( '<?xml encoding="utf-8" ?>' . $args['text'] );
		$items = $dom->getElementsByTagName( 'p' );

		// error_log(print_r($args,true) . ' / ' . $args['text'] );

		$content = "";
		if ( false && $items && count( $items ) > 0 ) {
			for ( $i = 0; $i < $items->length; $i ++ ) {
				$content .= '<div class="animation-element fade-up">';
				$content .= '<div class="animation">' . $items->item( $i )->nodeValue . PHP_EOL . '</div>';
				$content .= '</div>';
			}
		} else {
			$content .= '<div class="animation-element fade-up">';
			$content .= '<div class="animation">' . $args['text'] . '</div>';
			$content .= '</div>';
		}

		return $content;
	}

	/**
	 * Usage `apply_filters( 'c_check_linktype', ['url' => 'https://example.com/', 'icon_classes' => ['internal', 'download', 'external'] ] );`
	 * External links can not be download, it will always display as external. Anchor link is optional and must not be filled.
	 *
	 * @param $attributes array
	 *
	 * @return string
	 */
	public function c_check_linktype( $attributes ) {
		$url          = $attributes['url'];
		$icon_classes = is_array( $attributes['icon_classes'] ) ? $attributes['icon_classes'] : [
			'internal' => 'c-link-arrow',
			'download' => 'c-link-download',
			'external' => 'c-link-extern',
			'anchor'   => 'c-icon-anchor'
		];

		if ( ! $url ) {
			return '';
		}

		$icon_class = $icon_classes['internal'] ?? $icon_classes[0];
		$internal   = ( $url && strpos( $url, $_SERVER['SERVER_NAME'] ) );

		/**
		 * check if link is internal or external
		 */
		if ( $internal ) {
			/**
			 * check if link looks like a downloadable file (.pdf or similar)
			 */
			if ( preg_match( '/\.\w+$/', $url ) ) {
				$icon_class = $icon_classes['download'] ?? $icon_classes[1];
			}

			if ( str_contains( $url, '#' ) ) {
				$icon_class = $icon_classes['anchor'] ?? $icon_classes[3] ?? $icon_class ?? '';
			}
		} else {
			$icon_class = $icon_classes['external'] ?? $icon_classes[2];
		}

		return $icon_class;
	}

	/*
		Returns default locale
	*/
	public function c_shortcode_post_locale() {
		$lang  = defined( 'ICL_LANGUAGE_CODE' ) ? ICL_LANGUAGE_CODE : get_locale();
		$langs = icl_get_languages( 'skip_missing=0' );
		if ( isset( $langs[ $lang ]['default_locale'] ) ) {
			return $langs[ $lang ]['default_locale'];
		}

		return "en_US";
	}


	/*
		Adds custom CSS to admin
	*/
	public function my_custom_admin_css() {
		echo '<style>
        .acf-fc-layout-handle{
            color: white!important;
            background-color: #0073aa;
        }
        p.c-lead{
            font-size: 2rem;
        }
        </style>';
	}


	/*
		Creates language switch
	*/
	public function c_shortcode_post_languages( $args ) {
		$lswitch   = "";
		$languages = icl_get_languages( 'skip_missing=1' );
		if ( 1 < count( $languages ) ) {
			$lswitch = '';
			foreach ( $languages as $l ) {
				if ( $l['active'] != 1 ) {
					$lswitch .= $l['url'];
				}
			}
		}

		return $lswitch;
	}

	/*
		wysiwyg settings
	*/
	public function c_toolbars( $toolbars ) {

		$toolbars['Neofluxe default']    = array();
		$toolbars['Neofluxe default'][1] = array(
			'formatselect',
			'styleselect',
			'bold',
			'italic',
			'link',
			'unlink',
			'removeformat',
			'charmap',
		);

		return $toolbars;
	}

	public function c_tiny_mce_before_init( $settings ) {

		$settings['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4;';
		$style_formats             = array(
			array(
				'title'    => 'Lead',
				'selector' => 'p',
				'classes'  => 'c-lead',
				'wrapper'  => false,
			),
		);

		$settings['style_formats'] = json_encode( $style_formats );

		return $settings;

	}

}

// Trigger initialization
General::instance();
