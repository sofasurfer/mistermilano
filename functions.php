<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Theme includes
 *
 * Includes all files from the library directory.
 */
$dir = plugin_dir_path( __FILE__ ) . 'components';
foreach ( new DirectoryIterator( $dir ) as $fileinfo ) {
	if ( ! $fileinfo->isDot() && ! $fileinfo->isDir() && substr( $fileinfo->getFilename(), 0, 1 ) != '.' ) {
		$file = basename( dirname( $fileinfo->getRealPath() ) ) . '/' . $fileinfo->getFilename();
		require_once $file;
	}
}
unset( $dir, $fileinfo, $file );

/**
 * Redirect Single Post to Home Page
 */
add_action( 'template_redirect', function () {
	if ( is_singular( 'post' ) ) {
		wp_redirect( home_url(), 301 );
		exit;
	}
} );

