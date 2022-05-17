<!-- quote -->
<div class="c-container c-quote <?= ($site_element['show_lines']) ? 'c-quote-line' : ''; ?> ">
    <?php if($site_element['show_lines']): ?>
        <hr class="c-separator-line" />
    <?php endif; ?>
    <div class="c-row c-row-justify-center animation-element fade-up">
        <div class="c-col-8 c-text-block animation">
            <blockquote>
                <p><?= $site_element['text']; ?></p>
                <cite class="c-text-small"><?= $site_element['author']; ?></cite>
            </blockquote>
        </div>
    </div>
    <?php if($site_element['show_lines']): ?>
        <hr class="c-separator-line" />
    <?php endif; ?>    
</div>


    <!-- quote -->
    <div class="c-container-wide c-quote c-line-top c-line-bottom">
        <div class="c-container c-container-no-padding">
            <div class="c-row">
                <div class="c-col-9 c-text-block c-text-padding">
                    <blockquote>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                        <cite>Hans Muster, Funktion</cite>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    