<div class="c-container c-text-img-2col-symmetric">
    <div class="c-row ">
        <div class="c-col-5">
            <figure>
                <?php $acf_image = get_post_thumbnail_id(); ?>
                <?= do_shortcode("[render_imagetag id=\"$acf_image\"]"); ?>
            </figure>
        </div>
        <div class="c-col-5 c-col-offset-1 c-text-block">
            <div class="animation-element fade-up">
                <div class="animation">
                    <h3><?= get_field('acf_team_jobtitlefancy'); ?><br />
                        <?= get_field('acf_team_jobtitlereal'); ?>
                    </h3>                       
                    <p class="c-lead">
                        <a href="mailto:<?= get_field('acf_team_email'); ?>"><?= get_field('acf_team_email'); ?></a>
                    </p>
                </div>
            </div>
            <div class="animation-element fade-up">
                <div class="animation">            
                    <?php if(get_field('acf_team_socialmediaaccounts')): ?>
                    <ul class="c-list-social">
                        <?php foreach(get_field('acf_team_socialmediaaccounts' ) as $s_account): ?>  
                        <li><a target="<?= $s_account['link']['target']; ?>" class="c-icon c-btn-social c-btn-social-<?= $s_account['icon']; ?> c-ir" href="<?= $s_account['link']['url']; ?>"><?= $s_account['link']['title']; ?></a></li>
                        <?php endforeach; ?>                       
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <?php $text = apply_filters('the_content', get_post_field('post_content', get_queried_object_id())); ?>
            <?= do_shortcode("[render_animation_elements text='".$text."']");?>
        </div>
    </div>
</div>

<!-- page nav -->
<?php
$pdata = apply_filters('c_get_team_paging',false);
$backlink = get_permalink( apply_filters('c_get_option','archive_team') );
?>
<div class="c-container c-pagenav">
    <div class="c-row c-row-align-center">
        <div class="c-col-4">
            <a class="c-icon c-link-back c-ir" href="<?= $backlink; ?>"><?= __('Zur Übersicht','neofluxe');?></a>
        </div>
        <div class="c-col-8">
            <ul class="c-paging-list">
                <li><a class="c-icon c-link-back-small c-ir" href="<?= get_permalink($pdata['prev']->ID); ?>"><?= __('Zurück','neofluxe');?></a></li>
                <li class="c-text-small"><?= $pdata['current'];?>/<?= $pdata['total'];?></li>
                <li><a class="c-icon c-link-next-small c-ir" href="<?= get_permalink($pdata['next']->ID); ?>"><?= __('Nächster','neofluxe');?></a></li>
            </ul>
        </div>
    </div>
</div>