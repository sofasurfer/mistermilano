<?php
/** @var array $site_element */
$fields             = $site_element;
$post_type          = 'post';
$has_selected_items = $fields['select'] ?? false;

$args = array(
	'post_type'        => $post_type,
	'post_status'      => 'publish',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'posts_per_page'   => - 1,
	'suppress_filters' => false,
);

if ( $has_selected_items && count( $has_selected_items ) > 0 ) {
	$args = array(
		'post_type'        => $post_type,
		'post_status'      => 'publish',
		'post__in'         => $has_selected_items,
		'posts_per_page'   => - 1,
		'suppress_filters' => false,
	);
}

$posts = get_posts( $args );
?>

<div class="c-container c-news-teaser">
    <div class="c-row">
		<?php foreach ( $posts as $post ) {
			$fields  = get_fields( $post->ID );
			$excerpt = $fields['excerpt'];
			$date    = get_the_date( 'd.m.Y' );
			$title   = $fields['header']['title'] ?: $post->post_title;
			$link    = get_permalink( $post->ID );
			?>
            <div class="c-col-4">
                <article class="c-news-item c-box-small c-text-medium c-text-block">
                    <span class="c-subtitle"><?= $date ?></span>
                    <h3><a class="c-teaser-link" href="<?= $link ?>"><?= $title ?></a></h3>
                    <p><?= $excerpt ?></p>
                    <span class="c-icon c-icon-arrow c-ir"><?= __( 'Mehr lesen', 'neofluxe' ) ?></span>
                </article>
            </div>
		<?php } ?>
    </div>
</div>