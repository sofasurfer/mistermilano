<?php 

// ToDo: use filter to get data
$pageid = get_queried_object_id();
$imageid = get_field('acf_header_image_desktop');
$imageid_mobile = get_field('acf_header_image_mobile');
$video_url = get_field('acf_header_video');
if($video_url){
    $video_poster = wp_get_attachment_image_src($imageid, 'full');
}

// Get page title
if( get_post_type() == 'team' || get_post_type() == 'post' ){
    $pagetitle = get_the_title($pageid);
}else{
    $pagetitle = get_field('acf_header_title');
}

// Get category list
if( get_post_type() == 'portfolio' ){
    $categories = do_shortcode("[c_get_categories pid=\"$pageid\" posttype=\"portfolio_category\"]");
}elseif( get_post_type() == 'team' ){
    $categories = get_field('acf_team_jobtitlereal');
}elseif( get_field('acf_header_subtitle') ){
    $categories = get_field('acf_header_subtitle');
}


?>



<!-- line vertical-->
<span class="c-line-vertical"></span>

<!-- title-main -->
<div class="c-container-wide c-title-main c-line-top">
    <div class="c-container">
        <div class="c-row">
            <div class="c-col-9 c-text-padding">
                <!-- link back top, nur auf projektdetailseiten-->
                <a class="c-icon c-link-back-top c-ir" href="../../../index.html">Zurück zur Übersicht</a>
                
                <!-- category title nur bei projekten-->
                <span class="c-title-category">Architektur / Wohnbau</span>
                <h1><?= $pagetitle; ?></h1>
                <p class="c-lead">
                    Entspannt Architekturprojekte realisieren. <br />
                    Erfahren Sie mehr über unsere Dienstleistungen rund ums Bauen.
                </p>
            </div>
        </div>
    </div>
</div>
            
<?php if($imageid): ?>
<!-- img showroom -->
<div class="c-container-wide c-showroom">
    <!-- anderes bildratio auf mobile-->                        
    <figure>                    
        <span class="c-copyright-container">
            <?= do_shortcode("[render_imagetag id=\"$imageid\" mobile=\"$imageid_mobile\"]"); ?>
            <!-- class c-text-light hinzufügen, wenn text hell sein soll-->
            <span class="c-copyright-text c-text-small c-text-light">&copy; Vorname Name</span>
        </span>
    </figure>
</div>
<?php endif; ?>
            
