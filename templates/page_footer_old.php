
    <!-- page nav -->
    <?php
    $posttype = get_post_type( get_queried_object_id() );
    $backlist = array('portfolio','service','post');
    if( in_array($posttype, $backlist) ): 
        if( $posttype == 'portfolio' ) {
            $backlink = get_permalink( apply_filters('c_get_option','archive_portfolio') );
        }else if( $posttype == 'service' ) {
            $backlink = get_permalink( apply_filters('c_get_option','archive_services') );
        }else if( $posttype == 'post' ) {
            $backlink = get_permalink( apply_filters('c_get_option','archive_blog') );
        }
        ?>
        <div class="c-container c-pagenav">
            <div class="c-row c-row-align-center">
                <div class="c-col-4">
                    <a class="c-icon c-link-back c-ir" href="<?= $backlink; ?>"><?= __('Back','neofluxe');?></a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    </main>

    <!-- footer-->
    <footer class="c-footer" role="contentinfo">
        <div class="c-container c-footer-main">
            <div class="c-row">
                <div class="c-col-4 ">
                    <a href="<?php echo get_home_url(); ?>">
                    <div class="c-footer-logo"><img src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/images/neofluxe-logo-white.svg" alt="" /></div></a>
                    <?= apply_filters('c_get_option','company_slogan'); ?><br/>
                    <div class="c-footer-line c-line">
                        <a href="mailto:<?= apply_filters('c_get_option','company_email'); ?>"><?= apply_filters('c_get_option','company_email'); ?></a></br>
                        <a href="tel:<?= apply_filters('c_get_option','company_phone'); ?>"><?= apply_filters('c_get_option','company_phone'); ?></a>
                    </div>
                    
                    <?= do_shortcode("[c_socialmedia_list]"); ?>
                    
                    <a class="c-footer-link-swissmade c-ir" href="https://www.swissmadesoftware.org/" target="_blank" alt="<?= __('swiss made software','neofluxe');?>" title="<?= __('swiss made software','neofluxe');?>"><?= __('swiss made software','neofluxe');?></a>

                </div>
                <div class="c-col-3">
                    <?php wp_nav_menu( 
                        array( 
                            'theme_location'    => 'header-menu',
                            'container'         => false,
                            'menu_class'        => 'c-footer-nav-list',
                        )
                    ); ?>                    
                </div>                  
                <div class="c-col-5">
                    <p class="c-title-footer"><?= __('Newsletter abonnieren','neofluxe');?></p>
                        <fieldset class="c-form-footer newsletter">
							<div class="c-row">
								<div class="c-col-6">
									<div class="c-form-item">
										<label for="newsletter-firstname"><?= __('Vorname','neofluxe');?></label>
										<input class="c-form-text" type="text" id="newsletter-firstname" name="firstname" />
                                        <span class="c-form-error hidden" id="newsletter-firstname-error"><?= __('Ungültiger Vorname.', 'neofluxe');?></span>

									</div>
								</div>
								<div class="c-col-6">
									<div class="c-form-item">
										<label for="newsletter-lastname"><?= __('Nachname','neofluxe');?></label>
										<input class="c-form-text" type="text" id="newsletter-lastname" name="lastname" />
                                        <span class="c-form-error hidden" id="newsletter-lastname-error"><?= __('Ungültiger Nachname.', 'neofluxe');?></span>
									</div>
								</div>
							</div>
							<div class="c-form-item-nl">
								<label for="newsletter-email">
                                    <?= __('Email','neofluxe');?>
                                </label>
								<div class="c-form-item">
									<input class="c-form-text not-empty" type="email" id="newsletter-email" name="email" />
                                    <span class="c-form-error hidden" id="newsletter-email-error"><?= __('Ungültige E-Mail Adresse.', 'neofluxe');?></span>
                                    <input type="hidden" id="newsletter-language" value="<?= ICL_LANGUAGE_CODE; ?>" />

                                    <button class="c-icon c-btn-send">
                                        <?= __('Senden', 'neofluxe') ?>
                                    </button>
								</div>
								<span class="c-text-small"></span>
							</div>
                            <div>
                                <span class="c-form-confirmation hidden" id="newsletter-confirmation" ><?= __('Vielen Dank.', 'neofluxe');?></span>
                                <span class="c-form-error hidden" id="newsletter-error"></span>

                            </div>
						</fieldset>
                </div>
            </div>
        </div>
        
        <div class="c-container c-container-no-padding c-footer-disclaimer">
            <div class="c-row c-row-reverse">
                <div class="c-col-6 c-text-right">
                    <?php wp_nav_menu( 
                        array( 
                            'theme_location'    => 'footer-menu',
                            'container'         => false,
                            'menu_class'        => 'c-footer-disclaimer-list',
                        )
                    ); ?>
                </div>
                <div class="c-col-6">
                    <?= __('&copy; neofluxe','neofluxe');?>
                </div>                  

            </div>
        </div>
    </footer>

    <!-- cookie notice-->
    <div class="c-cookie-notice c-text-light c-text-small c-text-block" id="cookie-notice">
        <?= apply_filters('c_get_option','archive_cookie_message'); ?>
    </div>

    <script type="text/javascript">
    var templateUrl = '<?= get_bloginfo("template_url"); ?>';
    /* <![CDATA[ */
    var myAjax = {"ajaxurl":"<?=  str_replace("/", "\/", admin_url('admin-ajax.php') ); ?>"};
    /* ]]> */
    </script>

    <script src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/js/minimal.1.min.js?v=<?= do_shortcode('[wp_version]') ;?>"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164964841-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-164964841-2');
    </script>

</body>
</html>