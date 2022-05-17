<?php if($site_element['large']): ?>
    <!-- teaser big home, class c-color-change für abstand nach unten -->
    <article class="c-container-wide c-teaser-big c-text-light <?= ($site_element['padding_bottom']==1) ? 'c-color-change-bottom' : ''; ?> c-bg-primary">
        <a class="c-link-teaser" href="<?= get_field('rev_teaser_cta',$site_element['teaser'])['url']; ?>">
            <figure class="c-teaser-big-img">
                <?php 
                $rev_image = get_post_thumbnail_id($site_element['teaser']); 
                $rev_image_mobile = get_field('rev_teaser_image_mobile',$site_element['teaser']);
                ?>
                <?= do_shortcode("[render_imagetag id=\"$rev_image\" mobile=\"$rev_image_mobile\"]"); ?>   ***     

            </figure>
            <!--div class="img-load-mask"></div-->
            <!--text-->
            <div class="c-container c-container-no-padding c-teaser-big-text">
                <div class="c-row">
                    <div class="c-col-10 c-teaser-big-text-inner">
                        <?php $tid = $site_element['teaser']->ID; ?>
                        <span class="c-category-title"><?= do_shortcode("[c_get_categories pid=\"$tid\" posttype=\"teaser_category\"]"); ?></span>
                        <div class="animation-element fade-up">
                            <h3 class="c-h1 animation"><span><?= get_the_title($site_element['teaser']);?></span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </article>
<?php else: ?>
            
    <!-- teaser cta, class c-color-change top steht für padding am anfang, c-color-change-bottom für margin unten, falls nachfolgend weiterer inhalt kommt -->
    <div class="c-container-wide c-bg-light c-teaser-cta c-color-change-top <?= ($site_element['padding_bottom']==1) ? 'c-color-change-bottom' : ''; ?>">
        <div class="c-container">
            <div class="c-row animation-element fade-right">
                <div class="c-col-10 c-text-block animation">
                    <a class="c-link-cta" href="<?= get_field('rev_teaser_cta',$site_element['teaser'])['url']; ?>"><?= get_the_title($site_element['teaser']);?><span class="c-icon c-icon-arrow-big"></span></a>                     
                </div>
            </div>              
        </div>
    </div>

<?php endif; ?>