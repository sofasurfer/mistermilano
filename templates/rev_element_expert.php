<!-- experten teaser-->
<?php $post = $site_element['team_member']; ?>

<article class="c-container c-teaser-expert">
    <div class="c-row">
        <div class="c-col-4">
            <figure class="c-teaser-img">
                <a href="<?= get_permalink($post); ?>">
                    <?php 
                    if( $site_element['team_second_image_first'] == 1 ){
                        $rev_image = get_field('rev_team_secondimage',$post);
                        $rev_image_2 = get_post_thumbnail_id($post);
                    }else{
                        $rev_image = get_post_thumbnail_id($post);
                        $rev_image_2 = get_field('rev_team_secondimage',$post);
                    }
                    ?>
                    <?= do_shortcode("[render_imagetag id=\"$rev_image\"]"); ?>
                    <span class="c-teaser-team-hover">
                    <?= do_shortcode("[render_imagetag id=\"$rev_image_2\"]"); ?>
                    </span>
                </a>
            </figure>
        </div>
        <div class="c-col-8 c-text-block">
            <div class="animation-element fade-up">
            <div class="animation">
                <span class="c-category-title"><?= __('Ihr Ansprechspartner','neofluxe');?></span>
                <a class="c-link-teaser" href="<?= get_permalink($post); ?>">                           
                    <h3 class="c-teaser-title"><span><?= get_the_title($post);?></span></h3>
                </a>
                <p><?= get_field('rev_team_jobtitlefancy',$post);?><br />
                <?= get_field('rev_team_jobtitlereal',$post);?></p>
            </div>
            </div>
            <div class="animation-element fade-up">
            <div class="animation">
                <p class="c-lead">
                    <a href="mailto:<?= get_field('rev_team_email'); ?>"><?= get_field('rev_team_email'); ?></a><br />
                    <a href="tel:<?= apply_filters('c_get_option','company_phone'); ?>"><?= apply_filters('c_get_option','company_phone'); ?></a>
                </p>
            </div>
            </div>
        </div>
    </div>  
</article>