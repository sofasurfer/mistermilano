
<?php if( $site_element['type'] == 'twocol' ): ?>
    <!-- img 2 col -->
    <div class="c-container c-img-2col">
        <div class="c-row">
            <div class="c-col-6">
                <figure>
                    <?php $imageid = $site_element['image']; ?>
                    <?= do_shortcode("[render_imagetag id=\"$imageid\"]"); ?>
                    <?php if(!empty($site_element['caption'])): ?>
                    <figcaption class="c-text-small c-legend">
                        <span class="c-line"><?= $site_element['caption']; ?></span>
                    </figcaption>
                    <?php endif; ?>
                </figure>
            </div>
            <div class="c-col-6">
                <figure>
                    <?php $imageid = $site_element['image_2']; ?>
                    <?= do_shortcode("[render_imagetag id=\"$imageid\"]"); ?>
                    <?php if(!empty($site_element['caption_2'])): ?>
                    <figcaption class="c-text-small c-legend">
                        <span class="c-line"><?= $site_element['caption_2']; ?></span>
                    </figcaption>
                    <?php endif; ?>
                </figure>
            </div>
        </div>
    </div>
<?php elseif( $site_element['type'] == 'singlelarge' ): ?>
    <!-- img left-->                
    <div class="c-container c-img <?= ($site_element['align_right'] == '1') ? 'c-img-right' : ''; ?>">
        <figure class="c-row c-row-align-bottom">
            <div class="c-col-8">
                <?php $imageid = $site_element['image']; ?>
                <?= do_shortcode("[render_imagetag id=\"$imageid\"]"); ?>
            </div>
            <?php if(!empty($site_element['caption'])): ?>
            <figcaption class="c-col-4 c-text-small c-legend">
                <span class="c-line"><?= $site_element['caption']; ?></span>
            </figcaption>
            <?php endif; ?>
        </figure>
    </div>
<?php elseif( $site_element['type'] == 'tiles' ): ?>
    <!-- img tiles, zusatzclass c-color-change-bottom hinzufügen, falls nachfolgend noch anderer inhalt kommt!-->           
    <div class="c-container-wide c-img-tiles <?= ($site_element['padding']) ? 'c-color-change-bottom' : ''; ?>">
        <div class="c-row">
            <?php foreach( $site_element['tiles'] as $image ): ?>
            <div class="c-col-4">
                <figure class="c-ratiobox c-ratiobox-4by3">
                    <?php $imageid = $image; ?>
                    <?= do_shortcode("[render_imagetag id=\"$imageid\"]"); ?>
                </figure>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php elseif( $site_element['type'] == 'singlefullscreen' ): ?>
    <!-- bild 100% breite, bildhöhe kann variieren, es sollte aber möglich sein, für mobile ein bild in einem anderen ratio einzufügen. zusatzclass c-color-change-bottom hinzufügen, falls nachfolgend noch anderer inhalt kommt und keine Bildlegende benutzt wurde -->
    <div class="c-container-wide c-img-wide <?= ($site_element['padding']) ? 'c-color-change-bottom' : ''; ?>">
        <figure>
            <?php $imageid = $site_element['image']; ?>
            <?= do_shortcode("[render_imagetag id=\"$imageid\"]"); ?>
            <?php if(!empty($site_element['caption'])): ?>
            <figcaption class="c-container c-text-small c-legend">
                <span class="c-line"><?= $site_element['caption']; ?></span>
            </figcaption>
            <?php endif; ?>
        </figure>
    </div>
<?php endif; ?>