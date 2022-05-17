<!-- text only, für rechts alinierung c-row-justify-right einfügen, siehe beispiel-->
<div class="c-container c-text-only">
    <div class="c-row <?= ($site_element['align_right'] == 1) ? 'c-row-justify-right' : '' ;?>">
        <div class="c-col-8 c-text-block">
            <?php //$site_element['content']; ?>
            <?php $text = $site_element['content']; ?>
            <?= do_shortcode("[render_animation_elements text='".$text."']");?>            
        </div>
    </div>
</div>