<!-- text 2 col-->
<div class="c-container c-text-2col">
    <div class="c-row">
        <div class="c-col-6 c-text-block animation-element fade-up">
            <?php if( $site_element['islead'] == 1 ): ?>
            <p class="c-lead animation"><?= $site_element['leadtext']; ?></p>
            <?php else: ?>
                <div class="animation"><?= $site_element['col1']; ?></div>
            <?php endif; ?>
        </div>
        <div class="c-col-5 c-text-block animation-element fade-up">
            <div class="animation">
                <?= apply_filters('the_content', $site_element['content']); ?>
            </div>
        </div>
    </div>
</div>
