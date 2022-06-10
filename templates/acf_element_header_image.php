<?php

$imageid        = isset( $site_element['images']['large'] ) ? 'id="' . $site_element['images']['large'] . '"' : '';
$imageid_mobile = isset( $site_element['images']['small'] ) ? 'mobile="' . $site_element['images']['small'] . '"' : '';

?>

<div class="c-container-wide c-showroom">
    <!-- anderes bildratio auf mobile-->
    <figure class="c-ratiobox c-ratiobox-showroom">
        <span class="c-copyright-container">
            <?= do_shortcode( "[render_imagetag " . $imageid . " " . $imageid_mobile . " ]" ); ?>
            <!-- class c-text-light hinzufügen, wenn text hell sein soll-->
            <?php if ( $site_element['text'] ) { ?>
                <span class="c-copyright-text c-text-small c-text-light"><?= $site_element['text'] ?></span>
            <?php } ?>
        </span>
    </figure>
</div>