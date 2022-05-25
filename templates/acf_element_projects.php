<?php
global $wp_query;
$post_type = 'projects';
$iteration = 0;

$query = array(
	'post_type'      => $post_type,
	'posts_per_page' => 5,
	'order'          => 'DESC',
);

if ( $site_element['selected'] ) {
	$acf_posts = $site_element['selected'];

	/** overwrites the query attributes with the ones needed for the "selected post list" **/
	$query = array_merge( $query, [
		'post__in'       => $acf_posts,
		'orderby'        => 'post__in',
		'posts_per_page' => - 1,
		'order'          => 'ASC',
	] );
}

$posts = get_posts( $query );
?>

<!-- teaser small home -->
<?php foreach ( $posts as $post ): ?>
	<?php
	$iteration ++;
	$title      = get_field( 'title' );
	$fields     = get_fields() ?? false;
	$acf_images = $fields['image'] ?? false;
    $acf_image_small = $acf_images['size_small'] ?? false;
    $acf_image_large = $acf_images['size_large'] ?? false;
	// Get taxonomy name
	$taxonomy = 'category';
	if ( $post->post_type != 'post' ) {
		$taxonomy = $post->post_type . '_category';
	}

	?>
    <div class="c-container-wide c-teaser-img-text c-line-top c-line-bottom">
        <div class="c-container c-container-no-padding">
            <!-- use c row reverse for switching img places-->
            <div class="c-row<?php if ( $iteration % 2 == 0 && $acf_images ) { ?> c-row-reverse<?php } ?>">

                <div class="c-col-7 c-teaser-img-text-col-img">
                    <figure class="c-showroom-img"><?= do_shortcode("[render_imagetag id=\"$acf_image_large\" mobile=\"$acf_image_small\"]"); ?></figure>
                </div>

                <div class="c-col-5 c-text-block c-text-padding-var c-teaser-img-text-col-text<?php echo( has_post_thumbnail() ? ' c-text-padding-var' : ' c-text-padding' ); ?>">
                    <span class="c-title-category"><?= __( 'Verkauf', 'neofluxe' ) ?> / <?= do_shortcode( "[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]" ); ?></span>
                    <h2><?= $title['bold'] ?> <span><?= $title['regular'] ?></span></h2>
                    <p><?= $post->post_excerpt ?></p>
                    <p><a class="c-icon c-link-arrow" href="<?= get_permalink( $post ); ?>"><?= __( 'mehr erfahren', 'neofluxe' ) ?></a></p>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>

