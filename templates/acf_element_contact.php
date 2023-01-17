<?php
$options = get_fields( 'options' );
?>

<div class="c-container c-contact c-text-block">
    <h3><?= __( 'Kontakt', 'neofluxe' ) ?></h3>
    <p><strong><?= $options['company']['company_title'] ?></strong><br/>
		<?= $options['company']['company_address'] ?></p>
	<?php if ( isset( $options['google_maps'] ) ) { ?>
        <p><a href="<?= $options['google_maps'] ?>"><?= __( 'Routenplaner (Link auf Google Map)', 'neofluxe' ) ?></a></p>
	<?php } ?>
    <a href="tel:<?= apply_filters( 'c_convert_phone_number', $options['company']['company_phone'] ); ?>"><?= __( 'Tel.', 'neofluxe' ) ?> <?= $options['company']['company_phone'] ?></a><br/>
    <a href="mailto:<?= $options['company']['company_email'] ?>"><?= $options['company']['company_email'] ?></a>
</div>