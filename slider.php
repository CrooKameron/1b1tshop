<div class="main-slide">
    <div id="sync1" class="owl-carousel">



        <?php
        $askslider = $db->prepare("SELECT * FROM slider");
        $askslider->execute(array());

        while ($sliderget = $askslider->fetch(PDO::FETCH_ASSOC)) {
            if ($sliderget['slider_status'] == 1) {
        ?>

                <div class="item">
                    <div class="slide-desc">
                        <div class="inner">
                            <h1><?php echo $sliderget['slider_title']?></h1>
                            <div class="slider-description"><?php echo $sliderget['slider_desc'] ?></div>
                            <a href="<?php echo $sliderget['slider_link'] ?>"> <button class="btn btn-default btn-red btn-lg">Add to cart</button></a>
                        </div>
                        <div class="inner">
                            <div class="pro-pricetag big-deal">
                                <div class="inner">
                                    <span class="oldprice"><?php echo $sliderget['slider_oldprice'] ?></span>
                                    <span><?php echo $sliderget['slider_price'] ?></span>
                                    <span class="ondeal">Best Deal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-type-1">
                        <a href="<?php echo $sliderget['slider_link'] ?>"> <img src="<?php echo $sliderget['slider_imagepath'] ?>" style="width: 940px; height: 378px;" alt="" class="img-responsive"> </a>
                    </div>
                </div>
        <?php }
        }   ?>






    </div>
</div>





<br class="no-select">




<div class="bar"></div>
<div id="sync2" class="owl-carousel">

<?php
        $askslider = $db->prepare("SELECT * FROM slider");
        $askslider->execute(array());

        while ($sliderget = $askslider->fetch(PDO::FETCH_ASSOC)) {
            if ($sliderget['slider_status'] == 1) {
        ?>

    <div class="item">
        <div class="slide-type-1-sync">
            <h3><?php echo $sliderget['slider_title']?></h3>
        </div>
    </div>

    <?php }
        }   ?>


</div>
</div>