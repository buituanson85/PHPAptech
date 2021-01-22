<?php
    include ('inc/header.php');
//    include ('inc/slider.php');
//    global $ct;
?>
<?php
    if (isset($_GET['cartid'])){
        $id = $_GET['cartid'];
        $delpro = $ct->del_product_cart ($id);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $update_quantity_cart = $ct->update_quantity_cart ($cartId, $quantity);

        if ($quantity <= 0){
            $delpro = $ct->del_product_cart ($cartId);
        }
    }
?>
<?php
    if (!isset($_GET['id'])){
        echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
    }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
                    <?php
                        if (isset($update_quantity_cart)){
                            echo $update_quantity_cart;
                        }
                    ?>
                    <?php
                        if (isset($delpro)){
                            echo $delpro;
                        }
                    ?>
						<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								<th width="10%">Action</th>
							</tr>
                            <?php
                                $get_product_cart = $ct->get_product_cart ();
                                if ($get_product_cart){
                                    $subtotal = 0;
                                    $qty = 0;
                                    while ($result_cart = $get_product_cart->fetch_assoc()){
                            ?>
							<tr>
								<td><?php echo $result_cart['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result_cart['image']?>" alt=""/></td>
								<td><?php echo number_format ($result_cart['price']).' '.'$'?></td>
								<td>
									<form action="" method="post">
                                        <input type="hidden" name="cartId" min="0" value="<?php echo $result_cart['cartId']?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result_cart['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
                                        $total = $result_cart['quantity'] * $result_cart['price'];
                                        echo number_format ($total).' '.'$';
                                    ?>
                                </td>
								<td><a onclick="return confirm('Bạn có muốn xoá danh mục này không?')" href="?cartid=<?php echo $result_cart['cartId']?>">Xoá</a></td>
							</tr>
                            <?php
                                        $subtotal += $total;
                                        $qty += $result_cart['quantity'];
                                    }
                                }
                            ?>
						</table>
                        <?php
                            $get_check_cart = $ct->get_check_cart();
                            if ($get_check_cart){
                        ?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>
                                    <?php
//                                        $qty = $qty + $result_cart['quantity'];
                                        echo number_format ($subtotal).' '.'$';
                                        Session::set ('sum', $subtotal);
                                        Session::set ('qty', $qty);
                                    ?>
                                </td>
							</tr>
							<tr>
								<th>VAT : 10%</th>
								<td>
                                    <?php
                                        $vatTotal = $subtotal*0.1;
                                        echo number_format ($vatTotal).' '.'$'
                                    ?>
                                </td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>
                                    <?php
                                        $grandTotal = $subtotal + $vatTotal;
                                        echo number_format ($grandTotal).' '.'$';
                                    Session::set('sum',$subtotal);
                                    ?>
                                </td>
							</tr>
					   </table>
                        <?php
                            }else{
                                echo 'Giỏ hàng bạn chống';
                            }
                        ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include ('inc/footer.php'); ?>

