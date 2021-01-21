<?php
    include ('inc/header.php');
    include ('inc/slider.php');
    global $ct;
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
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
                                    while ($result_cart = $get_product_cart->fetch_assoc()){
                            ?>
							<tr>
								<td><?php echo $result_cart['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result_cart['image']?>" alt=""/></td>
								<td><?php echo number_format ($result_cart['price']).' '.'VNĐ'?></td>
								<td>
									<form action="" method="post">
										<input type="number" name="quantity" min="0" value="<?php echo $result_cart['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
                                        $total = $result_cart['quantity']*$result_cart['price'];
                                        echo number_format (($result_cart['quantity']*$result_cart['price'])).' '.'VNĐ';
                                        $subtotal += $total
                                    ?>
                                </td>
								<td><a href="">X</a></td>
							</tr>
                            <?php
                                    }
                                }
                            ?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php echo number_format ($subtotal).' '.'VNĐ'?></td>
							</tr>
							<tr>
								<th>VAT : 10%</th>
								<td><?php echo number_format (($subtotal*0.1)).' '.'VNĐ'?></td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php echo number_format (($subtotal) + ($subtotal*0.1)).' '.'VNĐ'?></td>
							</tr>
					   </table>
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

