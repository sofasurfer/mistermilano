
<!-- bild varianten für Projektseite, hintergrund wählbar weiss oder grau (zusatzclass c-bg-light). zusatzclass c-color-change-bottom hinzufügen, falls nachfolgend noch anderer inhalt kommt und keine Bildlegende benutzt wurde -->
<div class="c-container-wide c-img-var <?= ($site_element['padding_bottom'] == '1') ? 'c-color-change-bottom' : '' ; ?> <?= $site_element['bg']; ?>">
    <?php if( $site_element['fullwidth'] == '1' ): ?>
        <div class="c-container c-container-no-padding">
            <div class="c-row">
                <!-- c-col-img-var aliniert das bild in der mitte, mit padding oben und unten, c-img-var-align-bottom schiebt es nach unten-->
                <div class="c-col-12 <?= ($site_element['bg'] != 'c-bg-white') ? 'c-col-img-var' : '' ; ?> c-img-var-align-<?= $site_element['align']; ?>">
                    <?php $imageid = $site_element['image']; ?>
                    <?= do_shortcode("[render_imagetag id=\"$imageid\"]"); ?>
                </div>
            </div>
        </div>
        <!-- bildcaption als separates element für bildvarianten-->
        <?php if(!empty($site_element['caption'])): ?>
        <div class="c-container c-legend-single">
            <div class="c-text-small c-legend">
                <span class="c-line"><?= $site_element['caption']; ?></span>
            </div>
        </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="c-container c-container-no-padding">
            <div class="c-row">
                <?php
                $colsmall = 4;
                // Check if large image
                foreach( $site_element['images'] as $image ){
                    if($image['large'] == '1'){
                        $colsmall = 3;
                    }
                }
                ?>
                <?php foreach( $site_element['images'] as $image ): ?>
                <div class="c-col-<?= ($image['large'] == '1') ? '6' : $colsmall ;?> c-col-img-var c-img-var-align-<?= $image['align']; ?>">
                    <figure>
                        <?php $imageid = $image['image']; ?>
                        <?= do_shortcode("[render_imagetag id=\"$imageid\"]"); ?>
                    </figure>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>