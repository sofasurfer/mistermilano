<?php
/** @var array $site_element */
$fields     = $site_element;
$imageID    = $fields['image'];
$caption    = $fields['caption'];
$legend     = $fields['legend'];
$light_text = $fields['light_text'];
?>

<div class="c-container c-img">
    <figure>
        <span class="c-copyright-container">
            <?= wp_get_attachment_image( $imageID, 'large' ) ?>
	        <?php if ( $caption ) { ?>
                <span class="c-copyright-text c-text-small <?= $light_text ? 'c-text-light' : '' ?>">&copy; <?= $caption ?></span>
	        <?php } ?>
        </span>
		<?php if ( $legend ) { ?>
            <figcaption class="c-legend"><?= $legend ?></figcaption>
		<?php } ?>
    </figure>
</div>