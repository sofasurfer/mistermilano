<!-- Contact Element with CTA -->
<?php
global $wp_query;
$post_type     = 'cta';
$fields        = $site_element;
$option_fields = get_field( 'company', 'options' );
$contact_form  = $site_element['contactform'];

$query = array(
	'post_type' => $post_type,
	'posts__in' => [ $site_element['cta'] ],
);

$cta        = get_posts( $query );
$cta        = $cta[0];
$cta_fields = get_fields( $cta->ID );

function make_phone_number( $number ) {
	return preg_replace( '~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $number ) . "\n";
}

?>

<!-- CONTACT -->
<div class="c-container-wide c-contact c-bg-light c-line-bottom">

    <div class="c-container-wide c-line-top">
        <div class="c-container c-container-no-padding c-contact-inner">
            <div class="c-row c-row-justify-center">
                <div class="c-col-8 c-text-block c-text-padding-var">
                    <span class="c-title-category"><?= __( 'Kontakt', 'neofluxe' ) ?></span>
                    <h2 class="c-h1"><?= $fields['title_bold'] ?: '' ?> <span><?= $fields['title_regular'] ?: '' ?></span></h2>
					<?= $fields['text'] ? '<p>' . $fields['text'] . '</p>' : '' ?>

                    <p><strong><?= $option_fields['company_title'] ?: '' ?></strong><br>
						<?= $option_fields['company_address'] ? str_replace( ",", "<br>", $option_fields['company_address'] ) : '' ?></p>
					<?php if ( $option_fields['company_phone'] ) { ?>
                        <a href="tel:<?= make_phone_number( $option_fields['company_phone'] ) ?>"><?= $option_fields['company_phone'] ?></a><br>
					<?php } ?>
					<?php if ( $option_fields['company_email'] ) { ?>
                        <a href="mailto:<?= $option_fields['company_email'] ?>"><?= $option_fields['company_email'] ?></a><br>
					<?php } ?>
					<?php if ( $option_fields['company_map_link'] ) { ?>
                        <a href="<?= $option_fields['company_map_link'] ?>"><?= __( 'Map', 'neofluxe' ) ?></a>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="c-container-wide c-line-top">
        <!-- content-->
        <div class="c-container c-container-no-padding c-contact-inner ">
            <div class="c-row c-row-justify-center">
                <div class="c-col-8 c-text-block c-text-padding-var">
                    <h3 class="c-h2"><?= $cta_fields['acf_header_title_bold'] ?: '' ?>
                        <span><?= $cta_fields['acf_header_title_regular'] ?: '' ?></span></h3>
					<?= $cta_fields['text'] ? '<p>' . $cta_fields['text'] . '</p>' : '' ?>

                    <!-- label um forminhalt aufzuklappen-->
                    <label class="c-btn" for="c-contact-form-content"><span class="c-icon c-link-arrow"><?= __( 'Anfrage schreiben', 'neofluxe' ) ?></span></label>
                </div>
            </div>
        </div>
    </div>

	<?php if ( $contact_form ) { ?>
        <div class="c-container-wide c-contact-form-container c-form-standard c-line-top">
            <div class="c-container c-container-no-padding c-contact-inner">
                <!-- close form-->
                <label class="c-btn-close c-ir" for="c-contact-form-content">Formular schliessen</label>

                <div class="c-row c-row-justify-center">
                    <div class="c-col-8 c-text-padding-var">
                        <!-- form start-->
						<?= do_shortcode( '[contact-form-7 id="' . $contact_form . '" title="Kontaktformular 1"]' ); ?>
                        <!-- form ende-->
                    </div>
                </div>
            </div>
        </div>
	<?php } ?>

</div>
