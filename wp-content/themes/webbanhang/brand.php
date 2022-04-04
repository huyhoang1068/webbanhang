<!-- get_bloginfo() -->
<?php $url = get_bloginfo( 'stylesheet_directory' ); ?>

<!-- PAGE -->
<section class="page-section">
<div class="container">
    <h2 class="section-title"><span>Brand &amp; Clients</span></h2>
    <div class="partners-carousel">
        <div class="owl-carousel" id="partners">
            <?php 
              //hk-category
              $args = array( 
                'hide_empty' => 0,
                'taxonomy' => 'thuong-hieu',
                'exclude' => array( 10 ),
                'orderby' => 'id',
                'parent' => 0
              ); 
              $cates = get_categories( $args ); 
              foreach ( $cates as $cate ) { ?>
                <div>
                    <a href="<?= get_term_link($cate->slug, 'thuong-hieu') ?>">
                        <img src="<?= the_field('avatar', $cate) ?>" alt="<?= $cate->name ?>"/>
                    </a>
                </div>
              <?php } ?>
        </div>
    </div>
</div>
</section>
<!-- /PAGE -->