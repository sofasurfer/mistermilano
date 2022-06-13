<?php

$images        = $site_element['images'];
$no_of_images  = count( $images );
$count         = 0;
$left_is_large = $site_element['left_image_is_large'] ? 1 : 0;

?>

<div class="c-container-wide <?= ( $no_of_images < 2 ) ? 'c-img-wide' : 'c-img-2-col' ?> c-line-top">
    <div class="c-container">
        <div class="c-row">
            <!-- img 2 col -->
			<?php foreach ( $images as $image ) {
				$count ++;
                $dark_text = $image['dark_text'] ? 'c-text-dark' : 'c-text-light';
				$col_class = $count % 2 == $left_is_large ? 'c-col-7' : 'c-col-5';

				if ( $no_of_images < 2 ) {
					$col_class = '';
				}
				?>
                <div class="<?= $col_class ?> <?= ( $no_of_images < 2 ) ? 'c-col-12' : '' ?>">
                    <figure>
                        <span class="c-copyright-container">
                            <?= do_shortcode( "[render_imagetag id='" . $image['image'] . "']" ); ?>
                            <!-- class c-text-light hinzufügen, wenn text hell sein soll-->
                            <span class="c-copyright-text c-text-small <?= $dark_text ?>"><?= $image['caption'] ?></span>
                        </span>

						<?php if ( $image['legend'] ) { ?>
                            <figcaption class="c-legend c-text-padding-inside"><?= $image['legend'] ?></figcaption>
                        <?php } ?>
                    </figure>
                </div>
			<?php } ?>
        </div>
    </div>
</div>