<!-- team teaser-->
<?php
global $wp_query;
$post_type     = 'service';

$query = array(
	'post_type'   => $post_type,
	'numberposts' => - 1,
	'order'       => 'DESC',
);

$services = get_posts( $query );
?>

<div class="c-container-wide c-services c-line-top c-line-bottom">
    <div class="c-container c-container-no-padding">
        <div class="c-row">
			<?php foreach ( $services as $post ) { ?>
                <!-- Service -->
                <div class="c-col-6 c-text-block">
                    <h2 class="c-title-icon c-title-icon-rating"><?= $post->post_title ?></h2>
	                <?php if ( $post->post_content ) { ?>
                        <p><?= $post->post_content ?></p>
	                <?php } ?>
                </div>
                <!-- END -->
			<?php }; ?>
        </div>
    </div>
</div>