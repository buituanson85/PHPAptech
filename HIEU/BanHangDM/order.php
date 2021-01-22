<?php
include 'inc/header.php';
//include 'inc/slider.php';
?>
<?php
    $login_check = Session::get ('customer_login');
    if ($login_check == false){
        header ('Location: login.php');
    }
?>
    <div class="main">
        <div class="content">
            <div class="cartoption">
                <div class="cartpage">
                    <center style="color: red; font-size: 24px">Order page</center>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

<?php
include 'inc/footer.php';
?>