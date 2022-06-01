<?php

$pageid         = get_queried_object_id();
$fields         = get_fields();
$post_type      = get_post_type();
$title_largey   = $fields['title']['regular'] || $fields['acf_header_title_regular'];
$imageid        = ( isset( $fields['image']['size_large'] ) && $fields['image']['size_large'] ) ? $fields['image']['size_large'] : false;
$imageid_mobile = ( isset( $fields['image']['size_small'] ) && $fields['image']['size_small'] ) ? $fields['image']['size_small'] : false;

// Get page title
if ( get_post_type() == 'team' || get_post_type() == 'post' ) {
	$pagetitle = get_the_title( $pageid );
} else {
	$pagetitle = get_field( 'acf_header_title' );
}

?>
    <!-- line vertical-->
    <span class="c-line-vertical"></span>

    <!-- title-main -->
    <div class="c-container-wide c-title-main c-line-top">
        <div class="c-container">
            <div class="c-row">
                <div class="c-col-9 c-text-padding">
                    <!-- link back top, nur auf projektdetailseiten-->
                    <a class="c-icon c-link-back-top c-ir" href="<?= site_url() ?>">Zurück zur Übersicht</a>

                    <!-- category title nur bei projekten-->
					<?php if ( $post_type == 'projects' ) { ?>
                        <span class="c-title-category">Architektur / <?= do_shortcode( "[c_get_categories pid=\"$pageid\" posttype=\"" . $post_type . "_category\"]" ); ?></span>
					<?php } ?>
                    <h1><?= $fields['title']['bold']; ?> <span><?= $fields['title']['regular']; ?></span></h1>
                    <p class="c-lead">
						<?= $post->post_excerpt ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php if ( $imageid ): ?>
    <!-- img showroom -->
    <div class="c-container-wide c-showroom">
        <!-- anderes bildratio auf mobile-->
        <figure>
            <span class="c-copyright-container">
                <?= do_shortcode( "[render_imagetag id=\"$imageid\" mobile=\"$imageid_mobile\"]" ); ?>
                <!-- class c-text-light hinzufügen, wenn text hell sein soll-->
                <span class="c-copyright-text c-text-small c-text-light">&copy; Vorname Name</span>
            </span>
        </figure>
    </div>
<?php endif; ?>