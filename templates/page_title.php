<?php

$pageid         = get_queried_object_id();
$fields         = get_fields();
$options        = get_fields( 'options' );
$post_type      = get_post_type();
$title_bold     = $fields['title']['bold'] ?? '';
$title_regular  = $fields['title']['regular'] ?? '';
$imageid        = ( isset( $fields['image']['size_large'] ) && $fields['image']['size_large'] ) ? $fields['image']['size_large'] : false;
$imageid_mobile = ( isset( $fields['image']['size_small'] ) && $fields['image']['size_small'] ) ? $fields['image']['size_small'] : false;
$subtitle       = get_field( 'acf_header_subtitle', $pageid ) ? get_field( 'acf_header_subtitle', $pageid ) : $post->post_excerpt;
$back_button    = false;

if ( is_singular( 'projects' ) ) {
	$back_button = true;
    $back_link  = get_the_permalink($options['site']['archive_project']) ?? false;
}

?>
    <!-- line vertical-->
    <span class="c-line-vertical"></span>

    <!-- title-main -->
    <div class="c-container-wide c-title-main c-line-top">
        <div class="c-container">
            <div class="c-row">
                <div class="c-col-9 c-text-padding">
					<?php if ( $back_button ) { ?>
                        <!-- link back top, nur auf projektdetailseiten-->
                        <a class="c-icon c-link-back-top c-ir" href="<?= $back_link ?>"></a>
					<?php } ?>

                    <!-- category title nur bei projekten-->
					<?php if ( $post_type == 'projects' ) { ?>
                        <span class="c-title-category">Architektur / <?= do_shortcode( "[c_get_categories pid=\"$pageid\" posttype=\"" . $post_type . "_category\"]" ); ?></span>
					<?php } ?>
                    <h1><?= $title_bold; ?> <span><?= $title_regular ?></span></h1>
                    <p class="c-lead">
						<?= $subtitle ?>
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
                <span class="c-copyright-text c-text-small c-text-light"><?= $fields['copyright'] ?? '' ?></span>
            </span>
        </figure>
    </div>
<?php endif; ?>