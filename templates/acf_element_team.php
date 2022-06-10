<!-- team teaser-->
<?php
global $wp_query;
$post_type     = 'team';

$query = array(
	'post_type'   => $post_type,
	'numberposts' => - 1,
	'order'       => 'DESC',
);

$posts = get_posts( $query );
?>

<div class="c-container-wide c-team c-line-top">
    <div class="c-container c-container-no-padding">
        <div class="c-row">
			<?php foreach ( $posts as $post ) { ?>
                <!-- Team Member -->
                <div class="c-col-4">
					<?php if ( get_the_post_thumbnail( $post ) ) { ?>
                        <figure>
							<?= get_the_post_thumbnail( $post, 'large' ) ?>
                        </figure>
					<?php } ?>
                    <div class="c-text-block c-text-padding-inside">
                        <h3><?= $post->post_title ?></h3>
						<?php if ( $post->post_excerpt ) { ?>
                            <p><?= $post->post_excerpt ?></p>
						<?php } ?>
                    </div>
                </div>
                <!-- END -->
			<?php }; ?>
        </div>
    </div>
</div>