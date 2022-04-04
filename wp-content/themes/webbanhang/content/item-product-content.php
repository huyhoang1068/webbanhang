<?php 
    global $product;
    global $hide_icon;

    $rating_count = $product->get_rating_count();
    $reivew_count = $product->get_review_count();
    $average = $product->get_average_rating();
?>
<div class="thumbnail no-border no-padding">
    <div class="media">
        <a class="media-link" data-gal="prettyPhoto" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );?>">
            <!-- hk-thumb -->
            <img src='<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );?>' alt='<?php the_title(); ?>' />
            <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
        </a>
    </div>
    <div class="caption text-center">
        <h4 class="caption-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
        <div class="rating">
        <?php
            $round = round($average); 
            // if ($average < 1) {
            //     $round = 0;
            // } else {
            //     $round = round($average); 
            // }
            for ($i = 0; $i < 5; $i++) {
                if ($round == 5) {
                    echo '<span class="star active"></span>';
                }
                elseif ($round == 4) {
                    if ($i == 0) { 
                        echo '<span class="star"></span>';
                    } else {
                        echo '<span class="star active"></span>';
                    }
                }
                elseif ($round == 3) {
                    if ($i == 0 || $i == 1) { 
                        echo '<span class="star"></span>';
                    } else {
                        echo '<span class="star active"></span>';
                    }
                }
                elseif ($round == 2) {
                    if ($i == 0 || $i == 1 || $i == 2) { 
                        echo '<span class="star"></span>';
                    } else {
                        echo '<span class="star active"></span>';
                    }
                }
                elseif ($round == 1) {
                    if ($i == 0 || $i == 1 || $i == 2 || $i == 3) { 
                        echo '<span class="star"></span>';
                    } else {
                        echo '<span class="star active"></span>';
                    }
                }
                else {         
                    echo '<span class="star"></span>';
                }
            }
        ?>          
        </div>
        <div class="price">
            <?= $product->get_price_html() ?> 
        </div>
        <div class="buttons">
            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a>
            <a class="btn btn-theme btn-theme-transparent btn-icon-left" href="/?add-to-cart=<?php the_ID();?>"><?php echo $icon = (isset($hide_icon) && $hide_icon == 1) ? '' : '<i class="fa fa-shopping-cart"></i>';?>Add to Cart</a>
            <a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
        </div>
    </div>
</div>