<!-- get_bloginfo() -->
<?php $url = get_bloginfo( 'stylesheet_directory' ); ?>
 <!-- FOOTER -->
 <footer class="footer">
            <div class="footer-widgets">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="widget">
                                <h4 class="widget-title">About Us</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin ultrices suscipit. Sed commodo vel mauris vel dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <ul class="social-icons">

                                    <?php $socials = get_field('social_network', 'option'); ?>
                                    <li><a href="<?= $socials['facebook'] ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?= $socials['twitter'] ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?= $socials['instagram'] ?>" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="<?= $socials['pinterest'] ?>" class="pinterest"><i class="fa fa-pinterest"></i></a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget">
                                <?= do_shortcode( '[contact-form-7 id="272" title="Form Sales Up"]' ) ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-categories">
                                <h4 class="widget-title">Information</h4>
                                <?php 
                                    wp_nav_menu( array( 
                                        'theme_location' => 'bottom_nav', 
                                        'container' => 'false', 
                                        'menu_id' => 'bottom_nav', 
                                        'menu_class' => 'nav_link') ); 
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-tag-cloud">
                                <h4 class="widget-title">Item Tags</h4>
                                <ul>
                                    <?php 
                                      $args = array( 
                                        'hide_empty' => 0,
                                        'taxonomy' => 'product_tag',
                                        'orderby' => 'count',
                                        'number' => 11,
                                        'order' => 'DESC'
                                      ); 
                                      $tags = get_categories( $args ); 
                                      foreach ( $tags as $tag ) { ?>
                                        <li><a href="<?= get_term_link($tag->slug, 'product_tag')?>"><?= $tag->name ?></a></li>
                                      <?php }
                                    ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer-meta">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="copyright"><?= get_field('copyright', 'option') ?></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="payments">
                                <ul>
                                    <?php $payments = get_field('payment', 'option'); ?>
                                    <?php foreach ($payments as $link) { ?>
                                        <li><img src="<?= $link ?>"></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
        <!-- /FOOTER -->

        <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

    </div>
    <!-- /WRAPPER -->

    <?php wp_footer(); ?>
    <!-- JS Global -->
    <script src="<?= $url ?>/assets/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="<?= $url ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= $url ?>/assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="<?= $url ?>/assets/plugins/superfish/js/superfish.min.js"></script>
    <script src="<?= $url ?>/assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
    <script src="<?= $url ?>/assets/plugins/owl-carousel2/owl.carousel.min.js"></script>
    <script src="<?= $url ?>/assets/plugins/jquery.sticky.min.js"></script>
    <script src="<?= $url ?>/assets/plugins/jquery.easing.min.js"></script>
    <script src="<?= $url ?>/assets/plugins/jquery.smoothscroll.min.js"></script>
    <script src="<?= $url ?>/assets/plugins/smooth-scrollbar.min.js"></script>

    <!-- JS Page Level -->
    <script src="<?= $url ?>/assets/js/theme.js"></script>

    <script src="<?= $url ?>/assets/plugins/jquery.cookie.js"></script>
    <!--<![endif]-->

</body>

</html>