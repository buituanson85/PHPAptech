<html>
<head>
    <meta charset="utf-8">
    <meta content="IE-edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, intial-scale=1.0" name="viewport">
    <title>Shopping Website</title>
    <!--fav-icon---------------->
    <link rel="shortcut icon" href="images/fav-icon.png"/>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
<!--    Css-->
    <script type="text/javascript" src="js/slider.js"></script>
    <script type="text/javascript" src="js/categoryslide.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="libs/lightslider.css">
    <script src="libs/lightslider.js"></script>
    <!--using JQuery--------------->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/searchbar.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>
    <script type="text/javascript" src="js/navi.js"></script>
    <!--light-slider-files-->

    <!--js-link--------------------->
    <script src="js/jquery.js"></script>

    <!--style----->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body{
            font-family:poppins;
        }
    </style>

</head>
<body>
    <nav>
        <!--social-links-and-phone-number----------------->
        <div class="social-call">
            <!--social-links--->
            <div class="social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <!--phone-number------>
            <div class="phone">
                <span>Call: +123456789</span>
            </div>
        </div>
        <!--menu-bar----------------------------------------->
        <div class="navigation">
            <!--logo------------>
            <a href="#" class="logo"><img src="images/logo.png"></a>
            <!--menu-icon------------->
            <div class="toggle"></div>
            <!--menu----------------->
            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li  class="shop"><a href="#" >Shop</a></li>
                <li><a href="#">Men</a>
                    <!--lable---->
                    <span class="sale-lable">Sale</span>
                </li>
                <li><a href="#">Women</a></li>
                <li><a href="#">Kids</a></li>
            </ul>
            <!--right-menu----------->
            <div class="right-menu">
                <a href="javascript:void(0);" class="search">
                    <i class="fas fa-search"></i>
                </a>
                <a href="javascript:void(0);" class="user">
                    <i class="far fa-user"></i>
                </a>
                <a href="#">
                    <i class="fas fa-shopping-cart">
                        <span class="num-cart-product">0</span>
                    </i>
                </a>
            </div>
        </div>
    </nav>
    <!--search-bar----------------------------------->
    <div class="search-bar">

        <!--search-input------->
        <div class="search-input">
            <input type="text" placeholder="Search For Product" name="search" />
            <!--cancel-btn--->
            <a href="javascript:void(0);" class="search-cancel">
                <i class="fas fa-times"></i>
            </a>

        </div>
    </div>
    <!---login-and-sign-up--------------------------------->
    <div class="form">
        <!--login---------->
        <div class="login-form">
            <!--cancel-btn---------------->
            <a href="javascript:void(0);" class="form-cancel">
                <i class="fas fa-times"></i>
            </a>
            <strong>Log In</strong>
            <!--inputs-->
            <form>
                <input type="email" name="email" placeholder="Example@gmail.com" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <input type="submit" value="Log In"/>
            </form>
            <!--forget-and-sign-up-btn-->
            <div class="form-btns">
                <a href="#" class="forget">Forget Your Password?</a>
                <a href="javascript:void(0);" class="sign-up-btn">Create Account</a>
            </div>
        </div>
        <!--Sign-up---------->
        <div class="sign-up-form">
            <!--cancel-btn---------------->
            <a href="javascript:void(0);" class="form-cancel">
                <i class="fas fa-times"></i>
            </a>
            <strong>Sign Up</strong>
            <!--inputs-->
            <form>
                <input type="text" name="fullname" placeholder="Full Name" required/>
                <input type="email" name="email" placeholder="Example@gmail.com" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <input type="submit" value="Sign Up"/>
            </form>
            <!--forget-and-sign-up-btn-->
            <div class="form-btns">
                <a href="javascript:void(0);" class="already-account">
                    Already Have Account?</a>

            </div>
        </div>
    </div>

    <!-----------full-slider----------------------------->
    <ul id="adaptive" class="cs-hidden">

        <!--box-1--------------------------->
        <li class="item-a">
            <!---box------------------->
            <div class="full-slider-box f-slide-1">

                <div class="f-slider-text-container">
                    <div class="f-slider-text">
                        <span>Limited Offer</span>
                        <strong>30% Off<br/> With <font>Promo Code</font></strong>
                        <a href="#" class="f-slider-btn">Shop Now</a>
                    </div>
                </div>

            </div>
        </li>
        <!--box-2--------------------------->
        <li class="item-b">
            <!---box------------------->
            <div class="full-slider-box f-slide-2">

                <div class="f-slider-text-container">
                    <div class="f-slider-text">
                        <span>Limited Offer</span>
                        <strong>30% Off<br/> With <font>Promo Code</font></strong>
                        <a href="#" class="f-slider-btn">Shop Now</a>
                    </div>
                </div>

            </div>
        </li>
        <!--box-3--------------------------->
        <li class="item-c">
            <!---box------------------->
            <div class="full-slider-box f-slide-3">

                <div class="f-slider-text-container">
                    <div class="f-slider-text">
                        <span>Limited Offer</span>
                        <strong>30% Off<br/> With <font>Promo Code</font></strong>
                        <a href="#" class="f-slider-btn">Shop Now</a>
                    </div>
                </div>

            </div>
        </li>

    </ul>

    <!--product-categories-slider---------------------->
    <ul id="autoWidth" class="container" class="cs-hidden">
        <!--box-1--------------------->
        <li class="item">
            <div class="feature-box">
                <a href="#">
                    <img src="images/feature_1.jpg">
                </a>
            </div>
            <span>T-Shirts</span>
        </li>
        <!--box-2--------------------->
        <li class="item">
            <div class="feature-box">
                <a href="#">
                    <img src="images/feature_2.jpg">
                </a>
            </div>
            <span>Men T-Shirts</span>
        </li>
        <!--box-3--------------------->
        <li class="item">
            <div class="feature-box">
                <a href="#">
                    <img src="images/feature_3.jpg">
                </a>
            </div>
            <span>Kids T-Shirts</span>
        </li>
        <!--box-4--------------------->
        <li class="item">
            <div class="feature-box">
                <a href="#">
                    <img src="images/feature_4.jpg">
                </a>
            </div>
            <span>Pillow</span>
        </li>
        <!--box-5--------------------->
        <li class="item">
            <div class="feature-box">
                <a href="#">
                    <img src="images/feature_5.jpg">
                </a>
            </div>
            <span>Phone Cover</span>
        </li>
        <!--box-6--------------------->
        <li class="item">
            <div class="feature-box">
                <a href="#">
                    <img src="images/feature_6.jpg">
                </a>
            </div>
            <span>Shopping Bags</span>
        </li>

    </ul>

    <!--NEW ARRIVAL-------------------------------->
    <section class="new-arrival">

        <!--heading-------->
        <div class="arrival-heading">
            <strong>New Arrival</strong>
            <p>We Provide You New Fasion Design Clothes</p>
        </div>
        <!--products----------------------->
        <div class="product-container">

            <!--product-box-1---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                    <!--img------>
                    <img src="images/p-1.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>
            <!--product-box-2---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                    <!--img------>
                    <img src="images/p-2.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>
            <!--product-box-3---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                    <!--img------>
                    <img src="images/p-3.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>
            <!--product-box-4---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                    <!--img------>
                    <img src="images/p-4.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>
            <!--product-box-5---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                    <!--img------>
                    <img src="images/p-5.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>
            <!--product-box-6---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                    <!--img------>
                    <img src="images/p-6.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>
            <!--product-box-7---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                    <!--img------>
                    <img src="images/p-7.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>
            <!--product-box-8---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                    <!--img------>
                    <img src="images/p-8.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>
        </div>
    </section>

    <!---sale------------------------------------>
    <section class="sale">
        <!--sale-box-1-------------------->
        <div class="sale-box sale-1">
            <img src="images/sale-1.jpg">

            <a href="#">
                <div class="sale-text">
                    <strong>Bag with rose pattern</strong>
                    <span>Sale off 25%</span>
                </div></a>

        </div>
        <!--sale-box-2-------------------->
        <div class="sale-box sale-1">
            <img src="images/sale-2.jpg">

            <a href="#"><div class="sale-text">
                    <strong>Hello Summer</strong>
                    <span>Sale off 20%</span>
                </div></a>

        </div>
        <!--sale-box-3-------------------->
        <div class="sale-box sale-1">
            <img src="images/sale-3.jpg">

            <a href="#">
                <div class="sale-text">
                    <strong>Let's Party Hard Pillow</strong>
                    <span>Sale off 25%</span>
                </div></a>

        </div>

    </section>

<!--  product list 2-->
    <!--Feature-items-------------------------------->
    <section class="feature-item">

        <!--heading-------->
        <div class="feature-heading">
            <strong>Featured Items</strong>
            <p>We Provide You New Fasion Design Clothes</p>
        </div>
        <!--products----------------------->
        <div class="product-container">

            <!--product-box-1---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                    <!--img------>
                    <img src="images/p-1.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>
            <!--product-box-2---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                    <!--img------>
                    <img src="images/p-2.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>
            <!--product-box-3---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                    <!--img------>
                    <img src="images/p-3.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>
            <!--product-box-4---------->
            <div class="product-box">
                <!--product-img------------>
                <div class="product-img">
                    <!--add-cart---->
                    <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                    <!--img------>
                    <img src="images/p-4.png">
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="#" class="p-name">Drawstring T-Shirt</a>
                    <span class="p-price">$22.00</span>
                </div>
            </div>

        </div>
    </section>

    <!--banner-->
    <div class="banner-box f-slide-3">

        <div class="banner-text-container">
            <div class="banner-text">
                <span>Limited Offer</span>
                <strong>30% Off<br/> With <font>Promo Code</font></strong>
                <a href="#" class="banner-btn">Shop Now</a>
            </div>
        </div>

    </div>
    <!--services------------------------->
    <section class="services">
        <!--services-box---------->
        <div class="services-box">
            <i class="fas fa-shipping-fast"></i>
            <span>Free Shipping</span>
            <p>Free Shipping for all US order</p>
        </div>
        <!--services-box---------->
        <div class="services-box">
            <i class="fas fa-headphones-alt"></i>
            <span>Support 24/7</span>
            <p>We support 24h a day</p>
        </div>
        <!--services-box---------->
        <div class="services-box">
            <i class="fas fa-sync"></i>
            <span>100% Money Back</span>
            <p>You have 30 days to Return</p>
        </div>

    </section>
    <!--footer---------------------------->
    <footer>
        <!--copyright-------------->
        <span class="copyright">
            Copyright 2020 - GoingToInternet
        </span>
        <!--subcribe---------------->
        <div class="subscribe">
            <form>
                <input type="email" placeholder="Example@gmail.com" required/>
                <input type="submit" value="Subscribe">
            </form>
        </div>
    </footer>
</body>
</html>