<?php

get_template_part('templates/header');

?><!-- section-title-->
<!-- title main-->
<div class="c-container c-title-main">
    <div class="c-row">
        <div class="c-col-10 c-text-block">
            <span class="c-category-title"><?= __('Seite nicht gefunden','neofluxe');?></span>
            <h1>404</h1>
        </div>
    </div>
</div>
<div class="c-container c-container-no-padding c-title-section">
    <div class="c-row">
        <div class="c-col-10 c-text-block">
            <h2><?= __('Leider können wir die von Ihnen gesuchte Seite nicht finden.','neofluxe');?></h2>
        </div>
    </div>
</div>

<?php
get_template_part('templates/footer');
