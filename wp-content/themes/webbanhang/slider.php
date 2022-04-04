<!-- PAGE -->
<section class="page-section no-padding slider">
    <div class="container full-width">

        <div class="main-slider">
            <div class="owl-carousel" id="main-slider">
                <?php $slider = get_field('slideshow', 'option');?>
                <?php foreach ($slider as $key => $value) { ?>
                    <!-- Slide 1 -->
                    <div class="item slide<?= $key+1 ?> <?php if($key == 1){ echo 'alt'; } else if($key == 2){ echo 'dark'; }?>">
                        <img class="slide-img" src="<?= $value['banner']?>" alt=""/>
                        <div class="caption">
                            <div class="container">
                                <div class="div-table">
                                    <div class="div-cell">
                                        <div class="caption-content">
                                            <?= $value['content'] ?>
                                            <p class="caption-text">
                                                <a class="btn btn-theme" href="<?= $value['link'] ?>"><?= $value['text_link'] ?></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Slide 1 -->
                <?php } ?>
            </div>
        </div>

    </div>
</section>
<!-- /PAGE -->
<!-- <pre>
    <?php //print_r($slider); ?>
</pre> -->