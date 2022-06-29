<?php

$options = get_fields('options');
$posttype = get_post_type( get_queried_object_id() );
$back_button    = false;
$backlist = array( 'projects', 'sales', 'post' );

if ( in_array( $posttype, $backlist ) ) {
	if ( $posttype == 'projects' ) {
		$backlink = get_permalink( apply_filters( 'c_get_option', 'archive_projects' ) );
	} else if ( $posttype == 'sales' ) {
		$backlink = get_permalink( apply_filters( 'c_get_option', 'archive_sales' ) );
	} else if ( $posttype == 'post' ) {
		$backlink = get_permalink( apply_filters( 'c_get_option', 'archive_blog' ) );
	}
}

if ( is_singular( 'projects' ) ) {
	$back_button = true;
	$back_link   = get_the_permalink( $options['site']['archive_project'] ) ?? false;
}

?>

<?php if ( $back_button ) { ?>
    <!-- link back top, nur auf projektdetailseiten-->
    <div class="c-container c-back">
        <div class="c-row">
            <div class="c-col-12 c-text-padding">
                <!-- link back , nur auf projektdetailseiten-->
                <a class="c-icon c-link-back c-text-small" href="<?= $back_link ?>"><?= __('Zurück zur Übersicht', 'neofluxe') ?></a>
            </div>
        </div>
    </div>
<?php } ?>

</main>

<!-- footer-->
<footer class="c-footer" role="contentinfo">
    <!-- line vertical-->
    <span class="c-line-vertical"></span>


    <!-- footer main-->
    <div class="c-container-wide c-line-top c-line-bottom">
        <div class="c-container c-container-no-padding c-footer-main">
            <div class="c-footer-logo">
                <span class="c-header-logo-stripes"><img src="<?= apply_filters( 'get_file_from_dist', 'logo-lanz-stripes.svg'); ?>" alt="Lanz Architekten"/></span>
            </div>
            <div class="c-footer-main-address c-text-padding-inside">
                <strong><?= strstr( $options['company']['company_title'], ' ', true ) ?></strong> <?= strstr( $options['company']['company_title'], ' ' ) ?><br/>
                <?= $options['company']['company_address'] ?>, Tel.
                <a href="tel:<?= apply_filters( 'c_get_option', 'company_phone' ); ?>"><?= apply_filters( 'c_get_option', 'company_phone' ); ?></a>,
                <a href="mailto:<?= apply_filters( 'c_get_option', 'company_email' ); ?>"><?= apply_filters( 'c_get_option', 'company_email' ); ?></a>
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
                &copy;<?= date("Y") ?> <?= $options['company']['company_title'] ?>
            </div>

        </div>
    </div>

    <?= wp_footer() ?>
</footer>

<!-- cookie notice-->
<div id="cookie-notice" class="c-cookie-notice c-text-block c-text-small">
	<?= apply_filters( 'c_get_option', 'archive_cookie_message' ); ?>
</div>