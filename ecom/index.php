<?php
require('top.php');
?>
<div class="body__overlay"></div>

<!-- Start Slider Area -->
<div class="slider__container slider--one bg__cat--3">
    <div class="slide__container slider__activation__wrap owl-carousel">
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height"style="background-color:burlywood">
            <div class="container">
                <div class="row align-items__center">
                <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="images/slider/fornt-img/Uniform4.jpg" alt="slider images">
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h1>UNIFORM</h1>
                                <h2>&nbsp;Vendor System</h2><br>
                                <h2><i>"Here we care"</i></h2><br>
                                <div class="cr__btn">
                                    <?php if(isset($_SESSION['USER_LOGIN'])){
                                        echo '<a href="my_order.php">My Orders</a>';
                                    ?>
                                    <?php }
                                    else{
                                        echo '<a href="login.php">Sign In</a>';
                                    }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <!-- <div class="single__slide animation__style01 slider__fixed--height"style="background-color:burlywood">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h1 style="font-size: 70px;">WHY System</h1>
            <h2><i>"Wide range of Uniforms"</i></h2><br>
                                <div class="cr__btn">
                                    <?php if(isset($_SESSION['USER_LOGIN'])){
                                        echo '<a href="my_order.php">My Orders</a>';
                                    ?>
                                    <?php }
                                    else{
                                        echo '<a href="login.php">Sign In</a>';
                                    }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="images/slider/fornt-img/Uniform2.png" alt="slider images">
                        </div>
                    </div>
                </div>
                
            </div>
        </div> -->
        <!-- End Single Slide -->
    </div>
</div>
<!-- Start Slider Area -->
<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Best Uniforms</h2>
                    <p>Check out our highly efficient, newly arrived products</p>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <?php
                    $get_product=get_product($con,4);
                    foreach($get_product as $list){
                    ?>
                    <!-- Start Single Category -->
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="product.php?id=<?php echo $list['id'] ?>">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>" alt="product images">
                                </a>
                            </div>
                            <div class="fr__hover__info">
                            <ul class="product__action">
                            <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="icon-heart icons"></i></a></li>

                            <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>

                            </ul>
                        </div>
                            <div class="fr__product__inner">
                                <h4><a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name'] ?></a></h4>
                                <ul class="fr__pro__prize">
                                    <li class="old__prize"><?php echo $list['mrp']?></li>
                                    <li><?php echo $list['price']?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Category -->
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->
<!-- Start Product Area -->
<section class="ftr__product__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Best Offers</h2>
                    <!-- <p>Have a look at our highly efficient, best selling products.</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__list clearfix mt--30">
                    <?php
                    $get_product=get_product($con,4,'','','','','yes');
                    foreach($get_product as $list){
                    ?>
                    <!-- Start Single Category -->
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="product.php?id=<?php echo $list['id'] ?>">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>" alt="product images">
                                </a>
                            </div>
                            <div class="fr__hover__info">
                            <ul class="product__action">
                            <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="icon-heart icons"></i></a></li>
                                <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>

                            </ul>
                        </div>
                            <div class="fr__product__inner">
                                <h4><a href="product-details.html"><?php echo $list['name'] ?></a></h4>
                                <ul class="fr__pro__prize">
                                    <li class="old__prize"><?php echo $list['mrp'] ?></li>
                                    <li><?php echo $list['price'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Category -->
                <?php } ?>
                </div>
        </div>
    </div>
</section>

<!-- End Product Area -->
<?php
require('footer.php');
?>