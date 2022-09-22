<?php
$fields  = $site_element;
$slides  = $fields['repeater'];
$index   = 0;
$classes = [ 'splide--header', 'splide--narrow' ]
?>

<div class="c-container c-container-wide splide">
    <div class="splide__track">
        <ul class="splide__list">
			<?php foreach ( $slides as $slide ) { ?>
				<?php
				$title       = $slide['title'];
				$text        = $slide['text'];
				$image       = wp_get_attachment_image( $slide['image'], 'large' );
				$link        = $slide['link'];
				$link_title  = $link['title'];
				$link_url    = $link['url'];
				$link_target = $link['target'] ?: '_self';
				?>
                <li class="splide__slide c-showroom-slide">
                    <figure class="c-showroom-img">
                        <?= $image ?>
                    </figure>
                    <div class="c-container c-container-no-padding c-showroom-text">
                        <div class="c-row c-row-align-center">
                            <div class="c-col-6 c-showroom-text-inner c-text-light c-text-block">
                                <h1 class="c-h2"><?= $title ?></h1>
								<?php if ( $text ) { ?>
                                    <p class="c-lead"><?= $text ?></p>
								<?php } ?>
								<?php if ( $link_url ) { ?>
                                    <a class="c-btn" href="<?= $link_url ?>" target="<?= $link_target ?>"><?= $link_title ?></a>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </li>
				<?php
				$index ++;
			} ?>
        </ul>
    </div>
</div>