<?php

$options  = get_fields( 'options' );
$title    = $options['company']['company_title'];
$address  = $options['company']['company_address'];
$phone    = apply_filters( 'c_get_option', 'company_phone' );
$email    = apply_filters( 'c_get_option', 'company_email' );
$logo_src = apply_filters( 'get_file_from_dist', '../images/logo-lanz-stripes.svg' );

?>

</main>

<footer class="c-footer" role="contentinfo">
    <div class="c-container-wide c-line-top c-line-bottom">
        <div class="c-container c-container-no-padding c-footer-main">
            <div class="c-footer-logo">
                <span class="c-header-logo-stripes">
                    <img src="<?= $logo_src ?>" alt="<?= __( 'Neofluxe', 'neofluxe' ) ?>"/>
                </span>
            </div>
            <div class="c-footer-main-address c-text-padding-inside">
				<?= $title ?><br/>
				<?= $address ?><br/>
                <a href="tel:<?= $phone ?>"><?= $phone ?></a><br/>
                <a href="mailto:<?= $email ?>"><?= $email ?></a>
            </div>
        </div>
    </div>

    <div class="c-container c-container-no-padding c-footer-disclaimer">
        <div class="c-row c-row-reverse">
            <div class="c-col-6 c-text-right c-text-padding-var">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'container'      => false,
						'menu_class'     => 'c-footer-disclaimer-list',
					)
				); ?>
            </div>
            <div class="c-col-6 c-text-padding">
                &copy;<?= date( "Y" ) ?> <?= $title ?>
            </div>

        </div>
    </div>

	<?= wp_footer() ?>
</footer>

<div id="cookie-notice" class="c-cookie-notice c-text-block c-text-small">
	<?= apply_filters( 'c_get_option', 'archive_cookie_message' ); ?>
</div>

</body>
</html>
