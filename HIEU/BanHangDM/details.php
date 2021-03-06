<?php
    include ('inc/header.php');
//    global $pd, $cat, $ct;
?>
<?php
    if (!isset($_GET['productId']) || $_GET['productId'] == null){
        echo "<script>window.location = '404.php'</script>";
    }else{
        $productId = $_GET['productId'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $quantity = $_POST['quantity'];
        $AddToCart = $ct->add_to_cart ($productId, $quantity);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <?php
                $get_product_details = $pd->get_details ($productId);
                if ($get_product_details){
                    while ($result_details = $get_product_details->fetch_assoc()){

            ?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['image']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName']?></h2>
					<p><?php echo $result_details['product_desc']?></p>
					<div class="price">
						<p>Giá: <span><?php echo number_format ($result_details['price']).' '.'$'?></span></p>
						<p>Danh mục: <span><?php echo $result_details['catName']?></span></p>
						<p>Thương hiệu:<span><?php echo $result_details['brandName']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua ngay"/>
					</form>
                    <?php
                        if (isset($AddToCart)){
                            echo "</br><span class='error' style='color: red'>Sản phẩm đã được bạn thêm vào giỏ hàng</span>";
                        }
                    ?>
				</div>
                    <div class="add-cart">
                        <div class="button_details">
                            <form action="" method="POST">

                                <input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>


                                <?php

                                $login_check = Session::get('customer_login');
                                if($login_check){
                                    echo '<input type="submit" class="buysubmit" name="compare" value="So sánh sản phẩm"/>'.'  ';

                                }else{
                                    echo '';
                                }

                                ?>


                            </form>

                            <form action="" method="POST">

                                <input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>


                                <?php

                                $login_check = Session::get('customer_login');
                                if($login_check){

                                    echo '<input type="submit" class="buysubmit" name="wishlist" value="Lưu vào yêu thích" />';
                                }else{
                                    echo '';
                                }

                                ?>
                                <?php
                                if(isset($insertWishlist)) {
                                    echo $insertWishlist;
                                }
                                ?>

                            </form>
                        </div>
                        <div class="clear"></div>
                    </div>
			</div>
			<div class="product-desc">
                <h2>Thông tin chi tiết sản phẩm</h2>
			<p><?php echo $result_details['product_desc']?></p>
	    </div>
	</div>
            <?php
                    }
                }
            ?>
				<div class="rightsidebar span_3_of_1">
					<h2>Danh mục sản phẩm</h2>
                    <?php
                        $get_product_category = $cat->show_category ();
                        if ($get_product_category){
                        while ($result_category = $get_product_category->fetch_assoc()){
                    ?>
					<ul>
				      <li><a href="productbycat.php?catid=<?php echo $result_category['catId']?>"><?php echo $result_category['catName']?></a></li>
                        <?php
                                }
                            }
                        ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
<?php include 'inc/footer.php'; ?>
