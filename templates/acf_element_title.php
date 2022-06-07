<?php
$title_small = $site_element['title_small'] ? '<span>' . $site_element['title_small'] . '</span>' : '';
?>

<!-- section-title-->
<div class="c-container-wide c-title-secondary c-line-top">
    <div class="c-container c-container-no-padding">
        <div class="c-row">
            <div class="c-col-9 c-text-padding">
                <h2 class="c-h1"><?= $site_element['title']; ?> <?= $title_small; ?></h2>
            </div>
        </div>
    </div>
</div>