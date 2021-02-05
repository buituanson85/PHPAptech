<?php
    include 'libs/session.php';
    Session::init ();
?>
<?php
    include_once 'libs/database.php';
    include_once 'helpers/format.php';

    spl_autoload_register (function($className){
        include_once "classes/".$className.".php";
    });

    $db = new Database();
    $fm = new Format();
//    $ct = new Cart();
//    $ur = new User();
    $cat = new Category();
    $pd = new Product();
    $brand = new Brand();
//    $cs = new Customer();
?>
<?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ashirwaad Jewelry</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="home_black_version">
    <header class="header_area header_black">
        <!-- header top starts -->
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="social_icone">
                            <ul>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="top_right text-right">
                            <ul>
                                <li class="language">
                                    <a href="#">English <i class="ion-chevron-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Germany</a></li>
                                        <li><a href="#">Hindi</a></li>
                                    </ul>
                                </li>
                                <li class="currency">
                                    <a href="#">INR <i class="ion-chevron-down"></i></a>
                                    <ul class="dropdown_currency">
                                        <li><a href="#">USD - Dollar</a></li>
                                        <li><a href="#">EUR - Euro</a></li>
                                        <li><a href="#">GBP - British Pound</a></li>
                                    </ul>
                                </li>
                                <li class="top_links">
                                    <a href="#">My Account <i class="ion-chevron-down"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Shopping Cart</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top ends -->

        <!-- header middle starts -->
        <div class="header_middel">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-5">
                        <div class="home_contact">
                            <div class="contact_icone">
                                <img src="images/icon/icon_phone.png" alt="">
                            </div>
                            <div class="contact_box">
                                <p>Inquiry / Helpline : <a href="tel: 1234567894">1234567894</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-4">
                        <div class="logo">
                            <a href="index.html"><img src="images/logo/logo-ash.png" alt=""></a>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-7 col-6">
                        <div class="middel_right">
                            <div class="search_btn">
                                <a href="#"><i class="ion-ios-search-strong"></i></a>
                                <div class="dropdown_search">
                                    <form action="#">
                                        <input type="text" placeholder="Search Product ....">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="wishlist_btn">
                                <a href="#"><i class="ion-heart"></i></a>
                            </div>
                            <div class="cart_link">
                                <a href="#"><i class="ion-android-cart"></i><span class="cart_text_quantity">Rs.
                                            67,598</span><i class="ion-chevron-down"></i></a>
                                <span class="cart_quantity">2</span>

                                <!-- mini cart -->
                                <div class="mini_cart">
                                    <div class="cart_close">
                                        <div class="cart_text">
                                            <h3>cart</h3>
                                        </div>
                                        <div class="mini_cart_close">
                                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="images/nav-product/product.jpg" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Earings</a>
                                            <span class="quantity">Qty : 1</span>
                                            <span class="price_cart">Rs. 54,599</span>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="images/nav-product/product2.jpg" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Bracelet</a>
                                            <span class="quantity">Qty : 1</span>
                                            <span class="price_cart">Rs. 12,999</span>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart_total">
                                        <span>Subtotal : </span>
                                        <span>Rs. 67,598</span>
                                    </div>
                                    <div class="mini_cart_footer">
                                        <div class="cart_button view_cart">
                                            <a href="#">View Cart</a>
                                        </div>
                                        <div class="cart_button checkout">
                                            <a href="#" class="active">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- mini cart ends  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- header middle ends -->

        <!-- header bottom starts -->

        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="main_menu_inner">
                            <div class="logo_sticky">
                                <a href="#"><img src="images/logo/logo-ash.png" alt="logo"></a>
                            </div>
                            <div class="main_menu">
                                <nav>
                                    <ul>
                                        <li class="active">
                                            <a href="#">Home </i></a>
<!--                                            <ul class="sub_menu">-->
<!--                                                <li><a href="#">Banner</a></li>-->
<!--                                                <li><a href="#">Featured</a></li>-->
<!--                                                <li><a href="#">Collection</a></li>-->
<!--                                                <li><a href="#">Best Selling</a></li>-->
<!--                                                <li><a href="#">News</a></li>-->
<!--                                                <li><a href="#">Blog</a></li>-->
<!--                                            </ul>-->
                                        </li>
                                        <li>
                                            <a href="#">Women <i class="ion-chevron-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <?php
                                                    $show_women = $brand->get_product_by_women ();
                                                    if ($show_women){
                                                        while ($result_women = $show_women->fetch_assoc()){
                                                ?>
                                                <li><a href="#"><?php echo $result_women['brandName']?></a></li>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Men <i class="ion-chevron-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <?php
                                                    $show_men = $brand->get_product_by_men ();
                                                    if ($show_women){
                                                        while ($result_men = $show_men-> fetch_assoc()){
                                                ?>
                                                <li><a href="#"><?php echo $result_men['brandName']?></a></li>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="#"> Unisex <i class="ion-chevron-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <?php
                                                $show_unisex = $brand->get_product_by_unisex ();
                                                if ($show_unisex){
                                                    while ($result_unisex = $show_unisex-> fetch_assoc()){
                                                        ?>
                                                        <li><a href="#"><?php echo $result_unisex['brandName']?></a></li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li>

                                        <li><a href="#">About Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header bottom ends -->
    </header>
