<!-- text img -->
<?php $counter = 1; ?>
<?php if( $site_element['largelist'] == 1 ): ?>
    <!-- text img mit linie-->
    <?php foreach( $site_element['items'] as $item ): ?>
    <div class="c-container c-text-img-2col">
        <div class="c-row">
            <div class="c-col-4">
                <figure>
                    <?php $imageid = $item['image']; ?>
                    <?= do_shortcode("[render_imagetag id=\"$imageid\"]"); ?>
                </figure>
            </div>
            <div class="c-col-8 c-text-block">
                <div class="animation-element fade-up"><span class="c-line c-subline-number animation"><?= sprintf("%02d", $counter); ?></span></div>
                <div class="animation-element fade-up">
                    <h3 class="animation"><?= $item['title']; ?></h3>
                    <p class="animation"><?= $item['text']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php $counter++; ?>
    <?php endforeach; ?>
<?php else: ?>
    <!-- text 3 col mit line -->
    <div class="c-container c-container-no-padding c-text-3col">
        <div class="c-row">
            <?php foreach( $site_element['items'] as $item ): ?>
            <div class="c-col-4 c-text-block">
                <?php if( $item['image'] ): ?>
                <figure class="c-figure-padding">
                    <?php $imageid = $item['image']; ?>
                    <?= do_shortcode("[render_imagetag id=\"$imageid\"]"); ?>
                </figure>
                <?php endif; ?>          
                <div class="animation-element fade-up"><span class="c-line c-subline-number animation"><?= sprintf("%02d", $counter); ?></span></div>
                <div class="animation-element fade-up">
                    <h3 class="animation"><?= $item['title']; ?></h3>
                    <p class="animation"><?= $item['text']; ?></p>
                </div>
            </div>
            <?php $counter++; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>