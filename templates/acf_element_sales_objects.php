<?php
global $wp_query;
$post_type = 'sales';
$iteration = 0;

$query = array(
	'post_type'      => $post_type,
	'posts_per_page' => 10,
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
	$acf_image = get_post_thumbnail_id( $post );
	$title     = get_field( 'title' );
	$fields    = get_fields()['data'];
	// Get taxonomy name
	$taxonomy = 'category';
	if ( $post->post_type != 'post' ) {
		$taxonomy = $post->post_type . '_category';
	}

    /** if contains letter/s **/
    if ( ! preg_match("/[a-z]/i", $fields['price'])) {
	    $fields['price'] .= ' CHF';
    }

	?>
    <div class="c-container-wide c-teaser-img-text c-line-top c-line-bottom">
        <div class="c-container c-container-no-padding">
            <!-- use c row reverse for switching img places-->
            <div class="c-row <?php if ( $iteration % 2 == 0 ) { ?>c-row-reverse <?php } ?> ">
                <div class="c-col-7 c-teaser-img-text-col-img">
                    <figure>
						<?= wp_get_attachment_image( $acf_image, 'full' ); ?>
                    </figure>
                </div>
                <div class="c-col-5 c-teaser-img-text-col-text c-text-block c-text-padding-var">
                    <span class="c-title-category"><?= __( 'Verkauf', 'neofluxe' ) ?> / <?= do_shortcode( "[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]" ); ?></span>
                    <h2><?= $title['bold'] ?> <span><?= $title['regular'] ?></span></h2>
                    <p><?= $post->post_excerpt ?></p>
                    <dl class="c-info-list">
						<?php if ( $fields['location'] ) { ?>
                            <dt><?= __( 'Ort', 'neofluxe' ) ?></dt>
                            <dd><?= $fields['location'] ?></dd>
						<?php } ?>

						<?php if ( $fields['area'] ) { ?>
                            <dt><?= __( 'Gesamtfläche', 'neofluxe' ) ?></dt>
                            <dd><?= $fields['area'] ?></dd>
						<?php } ?>

						<?php if ( $fields['completion'] ) { ?>
                            <dt><?= __( 'Fertigstellung', 'neofluxe' ) ?></dt>
                            <dd><?= $fields['completion'] ?></dd>
						<?php } ?>

						<?php if ( $fields['price'] ) { ?>
                            <dt><?= __( 'Preis', 'neofluxe' ) ?></dt>
                            <dd><?= $fields['price'] ?></dd>
						<?php } ?>

                    </dl>
                    <p><a class="c-icon c-link-arrow"
                          href="<?= get_permalink( $post ); ?>"><?= __( 'mehr erfahren', 'neofluxe' ) ?></a></p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

