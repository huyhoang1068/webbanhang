<?php 
    global $product;

    // $rating_count = $product->get_rating_count();
    // $reivew_count = $product->get_review_count();
    $average = $product->get_average_rating();
?>

<a class="pull-left media-link" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );?>">
    <img style="max-width: 70px" class="media-object" src='<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );?>' alt='<?php the_title(); ?>' />
    <i class="fa fa-plus"></i>
</a>
<div class="media-body">
    <h4 class="media-heading"><a href="<?=  the_permalink() ?>"><?php the_title(); ?></a></h4>
    <div class="rating">
    <?php
        $round = round($average); 

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
    <div class="price"><?= $product->get_price_html() ?></div>
</div>