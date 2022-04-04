<!-- HEADER -->
<?php
    get_header();
?>
<!-- /HEADER -->

        <!-- CONTENT AREA -->
        <div class="content-area">

            <!-- PAGE -->
            <?php get_template_part( 'slider' ); ?>
            <!-- /PAGE -->
            
            <!-- PAGE -->
            <section class="page-section">
                <div class="container">
                    <div class="row">

                        <?php $banners = get_field('banner_home', 'option'); ?>
                        <?php foreach ($banners as $key => $value) { ?>
                            <div class="col-md-6">
                                <div class="thumbnail no-border no-padding thumbnail-banner size-1x3">
                                    <div class="media">
                                        <a class="media-link" href="<?= $value['link'] ?>">
                                            <div class="img-bg" style="background-image: url('<?= $value['banner'] ?>')"></div>
                                            <div class="caption">
                                                <div class="caption-wrapper div-table">
                                                    <div class="caption-inner div-cell">
                                                        <?= $value['content'] ?>
                                                        <span class="btn btn-theme btn-theme-sm"><?= $value['text_link'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </section>
            <!-- /PAGE -->

            <!-- PAGE -->
            <section class="page-section">
                <div class="container">

                    <div class="tabs">
                        <ul id="tabs" class="nav nav-justified-off"><!--
                            --><li class=""><a href="#tab-1" data-toggle="tab">Featured</a></li><!--
                            --><li class="active"><a href="#tab-2" data-toggle="tab">Newest</a></li><!--
                            --><li class=""><a href="#tab-3" data-toggle="tab">Top Sellers</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">

                        <!-- tab 1 -->
                        <!-- GET PRODUCT FEATURED -->
                        <div class="tab-pane fade" id="tab-1">
                            <div class="row">
                                <!-- hk-query -->
                                <?php
                                    $tax_query[] = array(
                                        'taxonomy' => 'product_visibility',
                                        'field'    => 'name',
                                        'terms'    => 'featured',
                                        'operator' => 'IN',
                                    );
                                    $args = array( 
                                        'post_type' => 'product',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 4,
                                        'tax_query' => $tax_query); 
                                ?>
                                <?php $getposts = new WP_query( $args); ?>
                                <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                <?php global $product; ?>
                                    <div class="col-md-3 col-sm-6">
                                        <?php get_template_part('content/item-product', 'content'); ?>  
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>

                            </div>
                        </div>

                        <!-- tab 2 -->
                        <!-- GET PRODUCT NEWEST -->
                        <div class="tab-pane fade active in" id="tab-2">
                            <div class="row">

                                <?php $args = array( 
                                    'post_type' => 'product', 
                                    'post_status' => 'publish',
                                    'posts_per_page' => 4 ); 
                                ?>
                                <?php $getposts = new WP_query( $args); ?>
                                <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                <?php global $product; ?>
                                    <div class="col-md-3 col-sm-6">
                                        <?php get_template_part('content/item-product', 'content'); ?>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>

                            </div>
                        </div>

                        <!-- tab 3 -->
                        <!-- GET PRODUCT TOP SELLERS -->
                        <div class="tab-pane fade" id="tab-3">
                            <div class="row">
                                <?php $args = array( 
                                    'post_type' => 'product', 
                                    'post_status' => 'publish',
                                    'posts_per_page' => 4, 
                                    'meta_key' => 'total_sales',
                                    'orderby' => 'meta_value_num'); 
                                ?>
                                <?php $getposts = new WP_query( $args); ?>
                                <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                <?php global $product; ?>
                                    <div class="col-md-3 col-sm-6">
                                        <?php get_template_part('content/item-product', 'content'); ?>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>

                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- /PAGE -->

            <!-- PAGE -->
            <section class="page-section">
                <div class="container">
                    <div class="message-box">
                        <div class="message-box-inner">
                            <h2><?= the_field( 'slogan', 'option' ) ?></h2>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /PAGE -->

            <!-- PAGE -->
            <section class="page-section">
                <div class="container">
                    <h2 class="section-title"><span>Top Rated Products</span></h2>
                    <div class="top-products-carousel">
                        <div class="owl-carousel" id="top-products-carousel">

                            <?php $args = array( 
                                'post_type' => 'product', 
                                'post_status' => 'publish',
                                'posts_per_page' => 10, 
                                'meta_key' => '_wc_average_rating',
                                'orderby' => 'meta_value_num'); 
                            ?>
                            <?php $getposts = new WP_query( $args); ?>
                            <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                            <?php global $product; ?>
                            <?php global $hide_icon; $hide_icon = 1; ?>
                                    <?php get_template_part('content/item-product', 'content'); ?>
                            <?php endwhile; wp_reset_postdata(); ?>

                        </div>
                    </div>
                </div>
            </section>
            <!-- /PAGE -->

            <!-- PAGE -->
            <section class="page-section">
                <div class="container">
                    <a class="btn btn-theme btn-title-more btn-icon-left" href="/news"><i class="fa fa-file-text-o"></i>See All Posts</a>
                    <h2 class="block-title"><span>Our Recent posts</span></h2>
                    <div class="row">
                        <?php $args = array( 
                            'post_type' => 'post', 
                            'posts_per_page' => 4, 
                            'post_status' => 'publish'); 
                        ?>
                        <?php $getposts = new WP_query( $args);?>
                        <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <?php global $product; ?>
                        <div class="col-md-6">
                            <div class="recent-post">
                                <div class="media">
                                    <a class="pull-left media-link" href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'thumbnail', ['class' => 'media-object'] ); ?>
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <div class="media-body">
                                        <p class="media-category"><?php the_category( '/ ' )?></p>
                                        <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php echo short_content(20); ?>
                                        <div class="media-meta">
                                            <?php echo get_the_date(); ?>
                                            <span class="divider">/</span><a href="<?php the_permalink();?>/#comment"><i class="fa fa-comment"></i><?php echo get_comments_number(get_the_ID()); ?></a>
                                            <span class="divider">/</span><a href="#<?php the_ID(); ?>"><i class="fa fa-heart"></i>18</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
            <!-- /PAGE -->

            <!-- PAGE -->
            <?php get_template_part('brand'); ?>
            <!-- /PAGE -->

            <!-- PAGE -->
            <section class="page-section">
                <div class="container">
                    <div class="row">
                        <?php 
                            $args = array( 
                                'hide_empty' => 0,
                                'taxonomy' => 'product_cat',
                                'exclude' => array( 9 ),
                                'orderby' => 'id',
                                'parent' => 0
                            ); 
                            $cates = get_categories( $args ); 
                            foreach ( $cates as $cate ) { ?>
                                <div class="col-md-4">
                                    <div class="product-list">
                                        <a class="btn btn-theme btn-title-more" href="<?= get_term_link($cate->slug, 'product_cat') ?>">See All</a>
                                        <h4 class="block-title"><span><?= $cate->name ?></span></h4>
                                        <?php 
                                        $args = array( 
                                            'post_type' => 'product', 
                                            'posts_per_page' => 3, 
                                            'post_status' => 'publish',
                                            'product_cat' => $cate->slug); 
                                        ?>
                                        <?php $getposts = new WP_query( $args);?>
                                        <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                        <?php global $product; ?>
                                            <div class="media">
                                                <?php get_template_part('content/item-product', 'media'); ?>
                                            </div>
                                        <?php endwhile; wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            <?php } ?>
                    </div>
                </div>
            </section>
            <!-- /PAGE -->

            <!-- PAGE -->
            <section class="page-section no-padding-top">
                <div class="container">
                    <div class="row blocks shop-info-banners">
                        <?php $service = get_field( 'info_service', 'option'); ?>
                        <?php foreach ($service as $key => $value) { ?>
                            <div class="col-md-4">
                            <div class="block">
                                <div class="media">
                                    <div class="pull-right"><?= $value['icon'] ?></div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?= $value['tittle'] ?></h4>
                                        <?= $value['content'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- /PAGE -->

        </div>
        <!-- /CONTENT AREA -->

<!-- FOOTER -->        
<?php
    get_footer();
?>
<!-- /FOOTER -->