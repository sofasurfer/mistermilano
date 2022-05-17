<!-- keyfacts, class c-color-change-bottom hinzufügen, wenn nachfolgend abstand gebraucht wird -->
<div class="c-container-wide c-bg-primary c-keyfacts c-text-light c-color-change-top c-color-change-bottom">
    <div class="c-container">
        <div class="c-row c-row-justify-center">
            <?php foreach( $site_element['items'] as $fact ): ?>
                <div class="c-col-4 animation-element fade-up">
                    <div class="animation">
                        <span class="c-line c-keyfacts-nr"><?= $fact['fact']; ?></span>
                        <span class="c-keyfacts-desc"><?= $fact['description']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>