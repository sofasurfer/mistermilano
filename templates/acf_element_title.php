<?php
/** @var array $site_element */
$fields = $site_element;
$title  = $fields['title'];
$tag    = $fields['size'];
?>

<div class="c-container c-title">
    <<?= $tag ?>><?= $title ?></<?= $tag ?>>
</div>