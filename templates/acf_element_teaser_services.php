<!-- teaser service, verschiedene hintergrundfarben, naming analog sonstiges farbsystem: c-bg-service-primary (blau), c-bg-service-highlight (grün). c-bg-service-light (hellgrau), c-bg-service-dark (dunkelgrau), gibt es jeweils mit und ohne horizont, bei der classe -horizon am schluss anhängen -->
<article class="c-container-wide <?= $site_element['bg_color']; ?><?= ($site_element['horizon']) ? '-horizon' : ''; ?> <?= ($site_element['bg_color'] != 'c-bg-service-light') ? 'c-text-light' : ''; ?> c-teaser-service">
    
    <a class="c-link-teaser" href="<?= get_permalink($site_element['cta']);?>">
        <div class="c-teaser-service-inner">
            <div class="c-teaser-service-visual">
                <?php if($site_element['video']): ?>
                    <video poster="<?= $poster[0]; ?>" class="c-video paused">
                        <source src="<?= $site_element['video']; ?>">
                    </video>                    
                    <figure class="c-teaser-service-img-mobile">
                        <?php $imageid = $site_element['bg_mobile']; ?>
                        <?= do_shortcode("[render_imagetag id=\"$imageid\"]"); ?> 
                    </figure>
                <?php else: ?>
                    <figure class="c-teaser-service-img">
                        <?php 
                        $imageid = $site_element['bg_image'];
                        $imagemobile_id = $site_element['bg_mobile'];
                        ?>
                        <?= do_shortcode("[render_imagetag id=\"$imageid\" mobile=\"$imagemobile_id\" ]"); ?> 
                    </figure>                    
                <?php endif; ?>
            </div>
            <div class="c-teaser-service-desc">
                <div class="c-container c-container-no-padding">
                    <div class="c-row c-row-justify-right">
                        <div class="c-col-6 c-teaser-service-text">
                            <div class="animation-element fade-up">
                                <div class="animation">
                                    <h3 class="c-teaser-title"><span><?= $site_element['title']; ?></span></h3>
                                    <p><?= $site_element['lead']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a> 
</article>  
