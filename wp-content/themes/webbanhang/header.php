<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <title>Bella Shop</title> -->
    <?php wp_head(); ?>

</head>
<body id="home" <?= body_class(); ?>>
    <!-- PRELOADER -->
    <?php if(is_home()) { ?>
    <div id="preloader">
        <div id="preloader-status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
            <div id="preloader-title">Loading</div>
        </div>
    </div>
    <?php } ?>
    <!-- /PRELOADER -->

    <!-- WRAPPER -->
    <div class="wrapper">

        <!-- Popup: Shopping cart items -->
        <div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="container">
                    <div class="cart-items">
                        <div class="cart-items-inner">
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('cart') ) : ?><?php endif; ?>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- /Popup: Shopping cart items -->

        <!-- Header top bar -->
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-left">
                    <ul class="list-inline">
                        <li class="icon-user"><a href="/my-account"><img src="<?= $url ?>/assets/img/icon-1.png" alt=""/> <span>Login</span></a></li>
                        <li class="icon-form"><a href="/my-account"><img src="<?= $url ?>/assets/img/icon-2.png" alt=""/> <span>Not a Member? <span class="colored">Sign Up</span></span></a></li>
                        <li><a href="mailto:<?= the_field( 'email', 'option' ) ?>"><i class="fa fa-envelope"></i> <span><?= the_field( 'email', 'option' ) ?></span></a></li>
                    </ul>
                </div>
                <div class="top-bar-right">
                    <ul class="list-inline">
                        <li class="dropdown flags">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= $url ?>/assets/img/flag.gif" alt=""/> Eng<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#"><img src="<?= $url ?>/assets/img/flag.gif" alt=""/> EN</a></li>
                                <li><a href="#"><img src="<?= $url ?>/assets/img/flag.gif" alt=""/> VN</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php wp_nav_menu( 
                        array( 
                            'theme_location' => 'top_nav',
                            'container' => 'false',
                            'menu_id' => 'top_nav',
                            'menu_class' => 'list-inline')
                        ); 
                    ?>
                </div>
            </div>
        </div>
        <!-- /Header top bar -->

        <!-- HEADER -->
        <header class="header fixed">
            <div class="header-wrapper">
                <div class="container">

                    <!-- Logo -->
                    <div class="logo">
                        <a href="<?php bloginfo( 'url' ); ?>"><img src="<?= the_field( 'logo', 'option' ) ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
                    </div>
                    <!-- /Logo -->

                    <!-- Header search -->
                    <div class="header-search">
                        <form action="<?php bloginfo( 'url' ); ?>" method="get">
                            <input type="hidden" name="post_type" value="product">
                            <input class="form-control" name="s" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>" type="text" placeholder="What are you looking?"/>
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /Header search -->

                    <!-- Header shopping cart -->
                    <div class="header-cart">
                        <div class="cart-wrapper">
                            <a href="/my-wishlist" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-heart"></i></a>
                            <a href="/compare-products" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-exchange"></i></a>
                            <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart">
                                <i class="fa fa-shopping-cart"></i> <span class="hidden-xs"> 
                                    <span class="hidden-xs"><?php echo sprintf (_n( '%d Sản phẩm', '%d Sản phẩm', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></span> 
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <!-- Mobile menu toggle button -->
                            <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                            <!-- /Mobile menu toggle button -->
                        </div>
                    </div>
                    <!-- Header shopping cart -->

                </div>
            </div>
            <div class="navigation-wrapper">
                <div class="container">
                    <!-- Navigation -->
                    <nav class="navigation closed clearfix">
                        <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                        <!-- hk-menu -->
                        <?php wp_nav_menu( 
                            array( 
                                'theme_location' => 'main_nav', 
                                'container' => 'false', 
                                'menu_id' => 'main-nav', 
                                'menu_class' => 'nav sf-menu') ); 
                        ?>
                    </nav>
                    <!-- /Navigation -->
                </div>
            </div>
        </header>
        <!-- /HEADER -->