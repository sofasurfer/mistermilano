<?php

$fields         = get_fields();
$details        = $fields['details'];

if ($details) {
	/** Yes this is beautiful... **/
	$details_html                   = [];
	$details_html['place']          = false ? [ 'slug' => 'place', 'value' => $details['place'], 'title' => __( 'Ort', 'neofluxe' ) ] : false;
	$details_html['client']         = $details['client'] ? [ 'slug' => 'client', 'value' => $details['client'], 'title' => __( 'Auftraggeber', 'neofluxe' ) ] : false;
	$details_html['cooperation']    = $details['cooperation'] ? [ 'slug' => 'cooperation', 'value' => $details['cooperation'], 'title' => __( 'Zusammenarbeit', 'neofluxe' ) ] : false;
	$details_html['date']           = $details['date'] ? [ 'slug' => 'date', 'value' => $details['date'], 'title' => __( 'Fertigstellung', 'neofluxe' ) ] : false;
	$details_html['monuments']      = $details['monuments'] ? [ 'slug' => 'monuments', 'value' => $details['monuments'], 'title' => __( 'Denkmalpflege', 'neofluxe' ) ] : false;
	$details_html['proceedings']    = $details['proceedings'] ? [ 'slug' => 'proceedings', 'value' => $details['proceedings'], 'title' => __( 'Verfahren', 'neofluxe' ) ] : false;
	$details_html['mandate']        = $details['mandate'] ? [ 'slug' => 'mandate', 'value' => $details['mandate'], 'title' => __( 'Mandat & Funktion', 'neofluxe' ) ] : false;
	$details_html['area']           = $details['area'] ? [ 'slug' => 'area', 'value' => $details['area'], 'title' => __( 'Fläche', 'neofluxe' ) ] : false;
	$details_html['sustainability'] = $details['sustainability'] ? [ 'slug' => 'sustainability', 'value' => $details['sustainability'], 'title' => __( 'Nachhaltigkeit', 'neofluxe' ) ] : false;
	$details_html['award']          = $details['award'] ? [ 'slug' => 'award', 'value' => $details['award'], 'title' => __( 'Auszeichnungen', 'neofluxe' ) ] : false;

	foreach ( $details_html as $key => $detail ) {
		if ( ! $detail ) {
			unset( $details_html[ $key ] );
		}
	}
}

if ( isset( $details ) ) { ?>
    <div class="c-container-wide c-project-info c-line-top c-line-bottom">
        <div class="c-container c-container-no-padding">
            <div class="c-row">
                <div class="c-col-6 c-text-block c-text-padding">
                    <dl class="c-info-list">
						<?php
						$index = 0;
						$half  = floor( count( $details_html ) / 2 ) + 1;
						foreach ( $details_html as $detail ) {
							$index ++;
							?>
                            <dt><?= $detail['title']; ?></dt>
                            <dd><?= $detail['value']; ?></dd>

							<?php
							if ( $index == $half ) {
								echo '</dl></div><div class="c-col-6 c-text-block c-text-padding-var"><dl class="c-info-list">';
							}
							?>
						<?php } ?>
                    </dl>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

