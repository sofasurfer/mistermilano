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

/** check if two posts in a row have no image **/
$post_iteration     = 0;
$previous_has_image = null;
foreach ( $posts as $post ):
	$has_thumbnail = has_post_thumbnail();

	if ( ( ! $previous_has_image ) && ( ! $has_thumbnail ) && ( $post_iteration != null ) ) {
		$posts[ $post_iteration - 1 ]->{'post_pair'}       = true;
		$posts[ $post_iteration - 1 ]->{'post_pair_first'} = true;
		$post->{'post_pair'}                               = true;
		$post->{'post_pair_first'}                         = false;
		$has_thumbnail                                     = true;
	}

	if ( $has_thumbnail ) {
		$previous_has_image = true;
	} else {
		$previous_has_image = false;
	}

	$post_iteration ++;
endforeach;
?>

<!-- teaser small home -->
<?php foreach ( $posts as $post ): ?>
	<?php
	$iteration ++;
	$thumbnail = get_post_thumbnail_id( $post );
	$title     = get_field( 'title' );
	$fields    = get_fields()['data'] ?? false;
	$link      = get_field( 'link' );
	// Get taxonomy name
	$taxonomy = 'category';
	if ( $post->post_type != 'post' ) {
		$taxonomy = $post->post_type . '_category';
	}

	/** if contains letter/s **/
	if ( ! preg_match( "/[a-z]/i", $fields['price'] ) ) {
		$fields['price'] .= ' CHF';
	}

	if ( ! $post->post_pair ) {
		?>
        <div class="c-container-wide c-teaser-img-text c-line-top c-line-bottom">
            <div class="c-container c-container-no-padding">
                <!-- use c row reverse for switching img places-->
                <div class="c-row<?php if ( $iteration % 2 == 0 && has_post_thumbnail() ) { ?> c-row-reverse<?php } ?>">

					<?php if ( has_post_thumbnail() ): ?>
                        <div class="c-col-7 c-teaser-img-text-col-img">
                            <figure>
								<?= wp_get_attachment_image( $thumbnail, 'full' ); ?>
                            </figure>
                        </div>
					<?php endif; ?>

                    <div class="c-col-5 c-text-block c-text-padding-var c-teaser-img-text-col-text<?php echo( has_post_thumbnail() ? ' c-text-padding-var' : ' c-text-padding' ); ?>">
                        <span class="c-title-category"><?= __( 'Verkauf', 'neofluxe' ) ?> / <?= do_shortcode( "[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]" ); ?></span>
                        <h2><?= $title['bold'] ?> <span><?= $title['regular'] ?></span></h2>
                        <p><?= $post->post_excerpt ?></p>
						<?php if ( $fields ) { ?>
                            <dl class="c-info-list">
								<?php if ( isset( $fields['location'] ) ) { ?>
                                    <dt><?= __( 'Ort', 'neofluxe' ) ?></dt>
                                    <dd><?= $fields['location'] ?></dd>
								<?php } ?>

								<?php if ( isset( $fields['area'] ) ) { ?>
                                    <dt><?= __( 'Gesamtfläche', 'neofluxe' ) ?></dt>
                                    <dd><?= $fields['area'] ?></dd>
								<?php } ?>

								<?php if ( isset( $fields['completion'] ) ) { ?>
                                    <dt><?= __( 'Fertigstellung', 'neofluxe' ) ?></dt>
                                    <dd><?= $fields['completion'] ?></dd>
								<?php } ?>

								<?php if ( isset( $fields['price'] ) ) { ?>
                                    <dt><?= __( 'Preis', 'neofluxe' ) ?></dt>
                                    <dd><?= $fields['price'] ?></dd>
								<?php } ?>
                            </dl>
						<?php } ?>
						<?php if ($link) { ?>
                            <p><a class="c-icon c-link-arrow" href="<?= $link['url'] ?>" target="<?= $link['target'] ?? '_self' ?>"><?= $link['title'] ?></a></p>
						<?php } ?>
                    </div>

                </div>
            </div>
        </div>
	<?php } ?>

	<?php if ( $post->post_pair ) { ?>
		<?php if ( $post->post_pair_first ) { ?>
            <div class="c-container-wide c-teaser-img-text c-line-top c-line-bottom">
            <div class="c-container c-container-no-padding">
            <div class="c-row c-row-justify-between">
		<?php } ?>

        <div class="c-col-5 c-text-block c-teaser-img-text-col-text<?php echo( $post->post_pair_first ? ' c-text-padding' : ' c-text-padding-var' ); ?>">
            <span class="c-title-category"><?= __( 'Verkauf', 'neofluxe' ) ?> / <?= do_shortcode( "[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]" ); ?></span>
            <h2><?= $title['bold'] ?> <span><?= $title['regular'] ?></span></h2>
            <p><?= $post->post_excerpt ?></p>
			<?php if ( $fields ) { ?>
                <dl class="c-info-list">
					<?php if ( isset( $fields['location'] ) ) { ?>
                        <dt><?= __( 'Ort', 'neofluxe' ) ?></dt>
                        <dd><?= $fields['location'] ?></dd>
					<?php } ?>

					<?php if ( isset( $fields['area'] ) ) { ?>
                        <dt><?= __( 'Gesamtfläche', 'neofluxe' ) ?></dt>
                        <dd><?= $fields['area'] ?></dd>
					<?php } ?>

					<?php if ( isset( $fields['completion'] ) ) { ?>
                        <dt><?= __( 'Fertigstellung', 'neofluxe' ) ?></dt>
                        <dd><?= $fields['completion'] ?></dd>
					<?php } ?>

					<?php if ( isset( $fields['price'] ) ) { ?>
                        <dt><?= __( 'Preis', 'neofluxe' ) ?></dt>
                        <dd><?= $fields['price'] ?></dd>
					<?php } ?>
                </dl>
			<?php } ?>
	        <?php if ($link) { ?>
                <p><a class="c-icon c-link-arrow" href="<?= $link['url'] ?>" target="<?= $link['target'] ?? '_self' ?>"><?= $link['title'] ?></a></p>
	        <?php } ?>
        </div>

		<?php if ( ! $post->post_pair_first ) { ?>
            </div>
            </div>
            </div>
		<?php } ?>
	<?php } ?>
<?php endforeach; ?>

