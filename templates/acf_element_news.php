<?php
global $post;
$post_type           = 'post';
$iteration           = 0;
$current_parent_page = get_permalink( $post->ID );

$query = array(
	'post_type'   => $post_type,
	'numberposts' => 2,
	'order'       => 'DESC',
);

$posts = get_posts( $query );

function checkLinkType( $url ) {
	$icon   = 'c-link-arrow';
    $internal = ($url && strpos( $url, $_SERVER['SERVER_NAME'] ));

	/**
	 * check if link is internal or external
	 */
	if ( $internal ) {
		$icon = 'c-link-extern';

		/**
		 * check if link looks like a downloadable file (.pdf or similar)
         */
        if (preg_match('/\.\w+$/', $url)) {
	        $icon = 'c-link-download';
        }
	}

    return $icon;
}

?>
<div class="c-content__projects">
	<?php foreach ( $posts as $post ): ?>
		<?php
		$iteration ++;
		$fields = get_fields() ?? false;
		$link   = $fields['link'] ?? false;
        $icon = checkLinkType( $link['url'] );

		// Get taxonomy name
		$taxonomy = 'category';
		if ( $post->post_type != 'post' ) {
			$taxonomy = $post->post_type . '_category';
		}

		?>
        <div class="c-container-wide c-content__projects__item c-teaser-img-text c-line-top c-line-bottom">
            <div class="c-container c-container-no-padding">
                <!-- use c row reverse for switching img places-->
                <div class="c-row<?php if ( $iteration % 2 == 0 ) { ?> c-row-reverse<?php } ?>">

                    <div class="c-col-7 c-teaser-img-text-col-img">
                        <figure class="c-showroom-img"><?= get_the_post_thumbnail() ?></figure>
                    </div>

                    <div class="c-col-5 c-text-block c-text-padding-var c-teaser-img-text-col-text c-text-padding-var">
                        <span class="c-title-category"><?= get_the_date( 'd.m.Y' ) ?></span>
                        <h2><?= $fields['title']['bold'] ?> <span><?= $fields['title']['regular'] ?></span></h2>
                        <p><?= $fields['text'] ?? '' ?></p>
						<?php if ( $link ): ?>
                            <p><a class="c-icon <?= $icon ?>" href="<?= $link['url'] ?>" target="<?= $link['target'] ?? '_self' ?>"><?= $link['title'] ?></a></p>
						<?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
	<?php endforeach; ?>
</div>

