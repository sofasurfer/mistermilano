<div class="c-container c-profile">
	<div class="c-row c-row-justify-between c-row-reverse">
		<div class="c-col-3 animation-element fade-up">
			<ul class="c-profile-list c-line animation">
				<li><strong><?= __('Autor','neofluxe');?></strong><br>
					<?php if( get_field('blog_teammember') ): ?>
						<?php
						$author = get_field('blog_author_team');
						?>
						<a href="<?= get_permalink($author); ?>"><?= get_the_title($author);?></a>
					<?php else: ?>
						<?= get_field('blog_author_externam'); ?>
					<?php endif; ?>
				</li>
				<li><strong><?= __('Veröffentlicht','neofluxe');?></strong><br>
					<?= get_the_date('d.m.Y'); ?>
				</li>
				<li><strong><?= __('Kategorie','neofluxe');?></strong><br>
					<?= do_shortcode("[c_get_categories pid=\"$post->ID\" posttype=\"category\"]"); ?>
				</li>
			</ul>

		</div>
		<div class="c-col-8 c-text-block animation-element fade-up">
			<div class="animation">
				<?= get_field('blog_content'); ?>
			</div>
		</div>
	</div>
</div>