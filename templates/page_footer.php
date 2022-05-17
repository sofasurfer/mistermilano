
        </main>

        <!-- footer-->
        <footer class="c-footer" role="contentinfo">
            <!-- line vertical-->
            <span class="c-line-vertical"></span>
            
            
            <!-- footer main-->
            <div class="c-container-wide c-line-top c-line-bottom"> 
                <div class="c-container c-container-no-padding c-footer-main">
                    <div class="c-footer-logo">
                        <span class="c-header-logo-stripes"><img src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/images/logo-lanz-stripes.svg" alt="Lanz Architekten" /></span>
                    </div>
                    <div class="c-footer-main-address c-text-padding-inside">
                        <strong>Lanz</strong> Architekten AG<br />
                        Schulstrasse 1, CH 2572 Sutz, Tel. 
                        <a href="tel:<?= apply_filters('c_get_option','company_phone'); ?>"><?= apply_filters('c_get_option','company_phone'); ?></a>, 
                        <a href="mailto:<?= apply_filters('c_get_option','company_email'); ?>"><?= apply_filters('c_get_option','company_email'); ?></a>
                    </div>
                </div>
            </div>
            
            <div class="c-container c-container-no-padding c-footer-disclaimer">
                <div class="c-row c-row-reverse">
                    <div class="c-col-6 c-text-right c-text-padding-var">
                        <?php wp_nav_menu( 
                            array( 
                                'theme_location'    => 'footer-menu',
                                'container'         => false,
                                'menu_class'        => 'c-footer-disclaimer-list',
                            )
                        ); ?>                        
                    </div>
                    <div class="c-col-6 c-text-padding">
                        &copy; 2021 Lanz Architekten
                    </div>                  

                </div>
            </div>
        </footer>

        <!-- cookie notice-->
        <div class="c-cookie-notice c-text-light c-text-small c-text-block" id="cookie-notice">
            <?= apply_filters('c_get_option','archive_cookie_message'); ?>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/js/minimal.1.min.js?v=1.1"></script>
