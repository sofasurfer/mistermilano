<?php
// ToDo: use an filter
$post_type = 'sales';

if ( $site_element['selected'] == 1 ) {
	$acf_posts = $site_element['items'];
} else {
	// Get posts
	global $wp_query;
	$news_query = array(
		'post_type'      => $post_type,
//		'orderby'        => $site_element['oderby'],
		'order'          => 'ASC',
		'posts_per_page' => - 1
	);
	$acf_posts  = get_posts( $news_query );
}

?>

<!-- teaser small home -->
<?php foreach ( $acf_posts as $post ): ?>
	<?php
	// Get taxonomy name
	$taxonomy = 'category';
	if ( $post->post_type != 'post' ) {
		$taxonomy = $post->post_type . '_category';
	}
	?>
    <article class="c-container c-teaser-1col">
        <div class="c-row">
            <div class="c-col-7">
                <figure class="c-teaser-img c-ratiobox c-ratiobox-16by9">
                    <a href="<?= get_permalink( $post ); ?>">
                    <?php $acf_image = get_post_thumbnail_id( $post ); ?>
                    <?= do_shortcode( '[render_imagetag id="' . $acf_image . '" ]' ); ?>
                    <?= wp_get_attachment_image($acf_image, 'full'); ?>
                    </a>
                </figure>
            </div>
            <div class="c-col-5 c-teaser-text  animation-element fade-up">
                <span class="c-category-title"><?= get_the_date( 'd.m.Y', $post ); ?> / <?= do_shortcode( "[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]" ); ?></span>
                <a class="c-link-teaser" href="<?= get_permalink( $post ); ?>">
                    <h3 class="c-teaser-title animation"><span><?= get_the_title( $post ); ?></span></h3>
                </a>
                <span class="c-category-title"><?= do_shortcode( "[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]" ); ?></span>
                <a class="c-link-teaser" href="<?= get_permalink( $post ); ?>">
                    <h3 class="c-teaser-title animation"><span><?= get_field( 'acf_header_title', $post ); ?></span>
                    </h3>
                </a>
            </div>
        </div>
    </article>
<?php endforeach; ?>

