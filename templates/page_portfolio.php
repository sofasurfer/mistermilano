<!-- text steckbrief -->
<div class="c-container c-profile">
    <div class="c-row c-row-justify-between">
        <div class="c-col-3">
            <div class="">
                <ul class="c-profile-list c-line c-profile-list-portfolio">
                    <?php if( get_field('acf_portfolio_customer') ): ?>
                    <li class=" animation-element fade-up"><strong><div class="animation"><?= __('Kunde','neofluxe');?></strong><br />
                        <?= get_field('acf_portfolio_customer'); ?></div>
                    </li>
                    <?php endif; ?>
                    <?php if( get_field('acf_portfolio_client') ): ?>
                    <li class=" animation-element fade-up"><strong><div class="animation"><?= __('Auftraggeber','neofluxe');?></strong><br />
                        <?= get_field('acf_portfolio_client'); ?></div>
                    </li>
                    <?php endif; ?>
                    <?php if( get_field('acf_portfolio_services') ): ?>
                    <li class=" animation-element fade-up"><strong><div class="animation"><?= __('Leistungen','neofluxe');?></strong><br />
                        <?php 
                        $total = count(get_field('acf_portfolio_services'));
                        $counter = 2;
                        foreach (get_field('acf_portfolio_services') as $service): ?>

                        <?php
                        $args = array(
                            'post_type' => 'service',
                            'order' => 'ASC',
                            'orderby' => 'menu_order',
                            'taxonomy' => 'service_category',
                                    'field' => 'slug',
                                    'term' => $service->slug
                        );
                        $service_page = get_posts( $args );
                        if( !empty($service_page) ):
                        $s_link = get_post_permalink( $service_page[0]->ID );
                        ?>
                        <a href="<?= $s_link; ?>"><?= $service->name ?></a><?= ($counter <= $total) ? ',' : ''; $counter++; ?>
                        <?php else: ?>
                            <?= $service->name ?><?= ($counter <= $total) ? ',' : ''; $counter++; ?>
                        <?php 
                        endif;
                        endforeach;
                        ?>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php if( get_field('acf_portfolio_releasedate') ): ?>
                    <li class=" animation-element fade-up"><strong><div class="animation"><?= __('Releasedatum','neofluxe');?></strong><br />
                        <?= get_field('acf_portfolio_releasedate'); ?></div>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php if( get_field('acf_portfolio_website') ): ?>
                <div  class=" animation-element fade-up">
                    <div class="animation"><a class="c-link-extern" target="_blank" href="<?= get_field('acf_portfolio_website'); ?>"><?= __('Zum Projekt','neofluxe');?><span class="c-icon c-icon-extern"></span></a></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="c-col-8 c-text-block c-lead">
            <?php $text = str_replace("'","’",get_field('acf_portfolio_leadtext')); ?>
            <?= do_shortcode("[render_animation_elements text='".$text."']");?>
        </div>
    </div>
</div>
