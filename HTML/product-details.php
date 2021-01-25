<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products - RedStore</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="navbar">
        <div class="logo">
            <img src="images/logo.png" alt="logo" width="125px">
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="">Home</a></li>
                <li><a href="">Products</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Account</a></li>
            </ul>
        </nav>
        <img src="images/cart.png" alt="cart" width="30px" height="30px">
        <img src="images/menu.png" alt="cart" class="menu-icon" onclick="menutoggle()">
    </div>
</div>

<!-- Single product details  -->
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="images/gallery-1.jpg" alt="a" width="100%" id="ProductImg" class="small-img">
            <div class="small-img-row">
                <div class="small-img-col">
                    <img src="images/gallery-1.jpg" alt="1" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="images/gallery-2.jpg" alt="1" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="images/gallery-3.jpg" alt="1" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="images/gallery-4.jpg" alt="1" width="100%" class="small-img">
                </div>
            </div>
        </div>
        <div class="col-2">
            <p>Home / T-Shirt</p>
            <h1>Red Printd T-Shirt by HRX</h1>
            <h4>$50.00</h4>
            <select>
                <option value="">Select Size</option>
                <option value="">XXL</option>
                <option value="">Xl</option>
                <option value="">Large</option>
                <option value="">Medium</option>
                <option value="">Small</option>
            </select>
            <input type="number" value="1">
            <a href="" class="btn">Add To Cart</a>
            <h3>Product Details <i class="fa fa-indent"></i></h3>
            <br>
            <p>Give your summer wardrobe astyle upgrade with the HRX
            Men's Active T-Shirt. Team it with a pair of shorts for
            your morning workout or a denims for an evening out with
            the guys.</p>
        </div>
    </div>
</div>

<!--         Title          -->

<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
        <p>View More</p>
    </div>
</div>

<!--        Product      -->
<div class="small-container">
    <div class="row">
        <div class="col-4">
            <img src="images/product-1.jpg" alt="pro-1">
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

<!--               js for product gallery          -->

<script type="text/javascript">
    var ProductImg = document.getElementById("ProductImg");
    var SmallImg= document.getElementsByClassName("small-img");

    SmallImg[0].onclick = function (){
        ProductImg.src = SmallImg[0].src;
    }
    SmallImg[1].onclick = function (){
        ProductImg.src = SmallImg[1].src;
    }
    SmallImg[2].onclick = function (){
        ProductImg.src = SmallImg[2].src;
    }
    SmallImg[3].onclick = function (){
        ProductImg.src = SmallImg[3].src;
    }
    SmallImg[4].onclick = function (){
        ProductImg.src = SmallImg[4].src;
    }
</script>
</body>
</html>
