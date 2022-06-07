<!-- text img -->
<div class="c-container-wide c-project-info c-line-top c-line-bottom">
    <div class="c-container c-container-no-padding">
        <div class="c-row">
            <div class="c-col-8 c-text-block c-text-padding">
                <ul>
					<?php foreach ( $site_element['items'] as $item ): ?>
                        <li><?= $item['text']; ?></li>
					<?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>