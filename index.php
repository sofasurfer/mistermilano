<?php
get_template_part( 'templates/header' );

// Get Site Elements
$page_id       = get_queried_object_id();
$site_elements = get_field( 'acf_elements', $page_id );
$post_type     = get_post_type( $page_id );

if ( is_404() ) {
	get_template_part( 'templates/page_404' );
} else {
	get_template_part( 'templates/page_' . $post_type );

	if ( ! empty( $site_elements ) ) {
		foreach ( $site_elements as $site_element ) {
			$layout_name = $site_element['acf_fc_layout'];
			include( locate_template( 'templates/' . $layout_name . '.php', false, false ) );
		}
	}
}

get_template_part( 'templates/footer' );
?>