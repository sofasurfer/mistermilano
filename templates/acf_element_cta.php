<!-- CTA teaser-->
<?php
global $wp_query;
$post_type = 'cta';

$query = array(
	'post_type' => $post_type,
	'posts__in' => [ $site_element['cta'] ],
);

$cta = get_posts( $query );
?>

<?php foreach ( $cta as $post ) {
	$terms = get_the_terms( $post, 'cta_category' );
	$field = get_fields();
	?>
    <div class="c-container-wide c-teaser-cta c-bg-light c-line-top c-line-bottom">
        <span class="c-line-vertical"></span>
        <div class="c-container c-container-no-padding c-contact-inner">
            <div class="c-row c-row-justify-center">
                <div class="c-col-8 c-text-block c-text-padding-var">
                <span class="c-title-category"><?php
	                $last_key = array_key_last( $terms );
	                foreach ( $terms as $key => $value ) {
		                $return = $value->name;

		                if ( $key != $last_key ) {
			                $return .= ', ';
		                }

		                echo $return;
	                }
	                ?></span>
                    <h2 class="c-h1"><?= $field['acf_header_title_bold'] ?: '' ?> <span><?= $field['acf_header_title_regular'] ?: '' ?></span></h2>
					<?= $field['text'] ? '<p>' . $field['text'] . '</p>' : '' ?>

					<?php if ( isset( $field['link'] ) && $field['link']['url'] ) { ?>
                        <a class="c-btn" href="<?= $field['link']['url'] ?>" target="<?= $field['link']['target'] ?: '_self' ?>"><span class="c-icon c-link-arrow"><?= $field['link']['title'] ?></span></a>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php }; ?>