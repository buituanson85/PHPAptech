<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" alt="logo" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="products.php">Products</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="account.php">Account</a></li>
                    </ul>
                </nav>
                <a href="cart.php"><img src="images/cart.png" alt="cart" width="30px" height="30px"></a>
                <img src="images/menu.png" alt="cart" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Give your workout<br>A New Style!</h1>
                    <p>Sussecss isn't always  abount greatness. It's abount
                        consistency. Consistent<br>hard work gains succsess.Geatness
                        will come.</p>
                    <a href="" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/image1.png" alt="slide">
                </div>
            </div>
        </div>
    </div>

<!-- featured categories -->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images/category-1.jpg" alt="cat-1">
                </div>
                <div class="col-3">
                    <img src="images/category-2.jpg" alt="cat-2">
                </div>
                <div class="col-3">
                    <img src="images/category-3.jpg" alt="cat-3">
                </div>
            </div>
        </div>

    </div>
    <!-- featured products -->
    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <a href="product-details.php"><img src="images/product-1.jpg" alt="pro-1"></a>
                <a href="product-details.php"><h4>Red Printed T-shirt</h4></a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <P>$50.00</P>
            </div>
            <div class="col-4">
                <img src="images/product-2.jpg" alt="pro-1">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <P>$50.00</P>
            </div>
            <div class="col-4">
                <img src="images/product-3.jpg" alt="pro-1">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <P>$50.00</P>
            </div>
            <div class="col-4">
                <img src="images/product-4.jpg" alt="pro-1">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <P>$50.00</P>
            </div>
        </div>
        <h2 class="title">Latest Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/product-5.jpg" alt="pro-1">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <P>$50.00</P>
            </div>
            <div class="col-4">
                <img src="images/product-6.jpg" alt="pro-1">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <P>$50.00</P>
            </div>
            <div class="col-4">
                <img src="images/product-7.jpg" alt="pro-1">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <P>$50.00</P>
            </div>
            <div class="col-4">
                <img src="images/product-8.jpg" alt="pro-1">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <P>$50.00</P>
            </div>
            <div class="col-4">
                <img src="images/product-9.jpg" alt="pro-1">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <P>$50.00</P>
            </div>
            <div class="col-4">
                <img src="images/product-10.jpg" alt="pro-1">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <P>$50.00</P>
            </div>
            <div class="col-4">
                <img src="images/product-11.jpg" alt="pro-1">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <P>$50.00</P>
            </div>
            <div class="col-4">
                <img src="images/product-12.jpg" alt="pro-1">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <P>$50.00</P>
            </div>
        </div>
    </div>
<!--  offer -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="images/exclusive.png" class="offer-img" alt="ex">
                </div>
                <div class="col-2">
                    <p>Exclusively Available on RedStore</p>
                    <h1>Smart Band 4</h1>
                    <small>The Mi Smart Nand 4 features a 39.9% larger
                    (than Mi Band 3) AMOLED color full-touch display with
                    adjustavle brightness, so everything is clear as can
                    be.</small>
                    <a href="#" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>
    <!--        testimonial    -->
    <div class="testimonial" style="padding-top: 100px">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem Ipsum is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="images/user-1.png" alt="usser">
                    <h3>Sean Parker</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem Ipsum is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="images/user-2.png" alt="usser">
                    <h3>Mike Smith</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem Ipsum is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="images/user-3.png" alt="usser">
                    <h3>Mabel joe</h3>
                </div>
            </div>
        </div>
    </div>
<!--       brands           -->
    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="images/logo-godrej.png" alt="god">
                </div>
                <div class="col-5">
                    <img src="images/logo-oppo.png" alt="god">
                </div>
                <div class="col-5">
                    <img src="images/logo-coca-cola.png" alt="god">
                </div>
                <div class="col-5">
                    <img src="images/logo-paypal.png" alt="god">
                </div>
                <div class="col-5">
                    <img src="images/logo-philips.png" alt="god">
                </div>
            </div>
        </div>
    </div>
<!--         footer      -->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="images/play-store.png" alt="play">
                        <img src="images/app-store.png" alt="play">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo-white.png" alt="logo">
                    <p>Our Purpose Is To Sustainably Make the Pleasure and
                    Benefits of Sports Accessible to the Many.</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2021 - Easy Tutorials</p>
        </div>
    </div>
<!--        js for toggle menu           -->
    <script type="text/javascript">
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";
        
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px"){
                MenuItems.style.maxHeight = "200px"
            }else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
</body>
</html>