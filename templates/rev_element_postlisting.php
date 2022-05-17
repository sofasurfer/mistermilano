<?php
// ToDo: use an filter
if($site_element['manual_selection'] == 1 ){
    $rev_posts = $site_element['items'];
}else{
    // Get posts
    global $wp_query;
    $news_query = array(
        'post_type' => $site_element['posttype'],
        'orderby'   => $site_element['oderby'],
        'order'     => $site_element['order'],
        'posts_per_page' => $site_element['numberofposts']  
    );
    $rev_posts = get_posts( $news_query ); 
}
?>

<?php if( $site_element['listlarge'] == 1 ): ?>

    <!-- teaser small home -->
    <?php foreach($rev_posts as $post): ?>
        <?php 
        // Get taxonomy name
        $taxonomy = 'category';
        if( $post->post_type != 'post' ){
            $taxonomy = $post->post_type . '_category';
        }
        ?>            
        <article class="c-container c-teaser-1col">
            <div class="c-row">
                <div class="c-col-7">
                    <figure class="c-teaser-img c-ratiobox c-ratiobox-16by9">
                        <a href="<?= get_permalink($post); ?>">
                            <?php $rev_image = get_post_thumbnail_id($post); ?>
                            <?= do_shortcode("[render_imagetag id=\"$rev_image\"]"); ?>
                        </a>
                    </figure>
                </div>
                <div class="c-col-5 c-teaser-text  animation-element fade-up">
                    <?php if( $post->post_type == 'post' ): ?>
                        <span class="c-category-title"><?= get_the_date('d.m.Y', $post); ?> / <?= do_shortcode("[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]"); ?></span>
                        <a class="c-link-teaser" href="<?= get_permalink($post); ?>">                           
                            <h3 class="c-teaser-title animation"><span><?= get_the_title($post);?></span></h3>
                        </a>
                    <?php else: ?>
                        <span class="c-category-title"><?= do_shortcode("[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]"); ?></span>
                        <a class="c-link-teaser" href="<?= get_permalink($post); ?>">                           
                            <h3 class="c-teaser-title animation"><span><?= get_field('rev_header_title',$post);?></span></h3>
                        </a>
                    <?php endif; ?>
                </div>          
            </div>          
        </article>
    <?php endforeach; ?>

<?php elseif( $site_element['posttype'] == 'team' ): ?>

    <!-- teaser team-->
    <div class="c-container c-container-no-padding c-teaser-team">
        <div class="c-row">
            <!-- team member-->
            <?php foreach($rev_posts as $post): ?>
            <div class="c-col-4">
                <article class="c-teaser-item">
                    <figure class="c-teaser-img">
                        <a href="<?= get_permalink($post); ?>">
                            <?php $rev_image = get_post_thumbnail_id($post); ?>
                            <?= do_shortcode("[render_imagetag id=\"$rev_image\"]"); ?>
                            <span class="c-teaser-team-hover">
                                <?php $rev_image = get_field('rev_team_secondimage'); ?>
                                <?= do_shortcode("[render_imagetag id=\"$rev_image\"]"); ?>
                            </span>                            
                        </a>
                    </figure>
                    <div class="c-teaser-text">
                        <div  class="animation-element fade-up">
                            <a class="c-link-teaser" href="<?= get_permalink($post); ?>">                           
                                <h3 class="animation"><span><?= get_the_title($post);?></span></h3>
                            </a>
                        </div>
                        <div  class="animation-element fade-up">
                            <p class="animation"><?= get_field('rev_team_jobtitlefancy',$post);?></p>
                        </div>
                    </div>
                </article>
            </div> 
            <?php endforeach; ?>               
        </div>
    </div>

<?php else: ?>
    <!-- teaser 2 col , für portfolio teaser, crossteaser, blog-teaser -->
    <div class="c-container c-container-no-padding c-teaser-2col">
        <div class="c-row">
            <?php foreach($rev_posts as $post): ?>
            <?php 
            // Get taxonomy name
            $taxonomy = 'category';
            if( $post->post_type != 'post' ){
                $taxonomy = $post->post_type . '_category';
            }
            ?>  
            <div class="c-col-6">
                <article class="c-teaser-item">
                    <figure class="c-teaser-img c-ratiobox c-ratiobox-16by9">
                        <a href="<?= get_permalink($post); ?>">
                            <?php $rev_image = get_post_thumbnail_id($post); ?>
                            <?= do_shortcode("[render_imagetag id=\"$rev_image\"]"); ?>
                        </a>
                    </figure>
                    <div class="c-teaser-text animation-element fade-up">
                        <?php if( $post->post_type == 'post' ): ?>
                        <span class="c-category-title"><?= get_the_date('d.m.Y', $post); ?> / <?= do_shortcode("[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]"); ?></span>
                        <?php elseif( $post->post_type == 'service' ): ?>
                        <span class="c-category-title"><?= get_field('rev_header_subtitle', $post); ?></span>
                        <?php else: ?>
                        <span class="c-category-title"><?= do_shortcode("[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]"); ?></span>
                        <?php endif; ?>                        
                        <a class="c-link-teaser" href="<?= get_permalink($post); ?>">    
                            <?php if( $post->post_type == 'post' ): ?>
                                <h3 class="c-teaser-title animation"><span><?= get_the_title($post);?></span></h3>
                            <?php else: ?>
                                <h3 class="c-teaser-title animation"><span><?= get_field('rev_header_title',$post);?></span></h3>
                            <?php endif; ?>
                        </a>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>              
    </div>
<?php endif; ?>

