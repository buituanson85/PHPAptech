<?php
include ('inc/header.php');
//    global $pd, $cat, $ct;
?>
<?php
    $login_check = Session::get ('customer_login');
    if ($login_check == false){
        header ('Location: login.php');
    }else{
        echo '';
    }
?>
<?php
    $id = Session::get ('customer_id');
//    if (!isset($_GET['productId']) || $_GET['productId'] == null){
//        echo "<script>window.location = '404.php'</script>";
//    }else{
//        $productId = $_GET['productId'];
//    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){

        $Update_customer = $cs->update_customer ($_POST, $id);
    }
?>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Update Customer profile</h3>
                </div>
                <div class="clear"></div>
            </div>
            <?php

            ?>
            <form action="" method="post">
                <table class="tblone">
                    <tr>
                        <td colspan="2">
                            <?php
                            if (isset($Update_customer)){
                                echo $Update_customer;
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    $id = Session::get ('customer_id');
                    $get_customer = $cs->show_customers ($id);
                    if ($get_customer){
                        while ($result_customer = $get_customer->fetch_assoc()){
                            ?>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td><input type="text" name="name" value="<?php echo $result_customer['name']?>"></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td>:</td>
                                <td><input type="text" name="address" value="<?php echo $result_customer['address']?>"></td>
                            </tr>
<!--                            <tr>-->
<!--                                <td>Thành phố</td>-->
<!--                                <td>:</td>-->
<!--                                <td><input type="text" name="city" value="--><?php //echo $result_customer['city']?><!--"></td>-->
<!--                            </tr>-->
                            <tr>
                                <td>Zipcode</td>
                                <td>:</td>
                                <td><input type="text" name="zipcode" value="<?php echo $result_customer['zipcode']?>"></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td><input type="text" name="phone" value="<?php echo $result_customer['phone']?>"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><input type="text" name="email" value="<?php echo $result_customer['email']?>"></td>
                            </tr>
                            <tr>
                                <td colspan="3"><input type="submit" class="grey" value="Save" name="save"></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </form>
        </div>
    </div>
    <?php include 'inc/footer.php'; ?>
