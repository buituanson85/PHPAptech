<?php
    $filepath = realpath (dirname (__FILE__));
    include ($filepath.'/inc/header.php');
    global $pd, $cat, $ct;
?>
<?php
    if (!isset($_GET['productId']) || $_GET['productId'] == null){
        echo "<script>window.location = '404.php'</script>";
    }else{
        $productId = $_GET['productId'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $quantity = $_POST['quantity'];
        $addToCart = $ct->add_to_cart ($quantity, $productId);
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
						<p>Giá: <span><?php echo number_format ($result_details['price']).' '.'VNĐ'?></span></p>
						<p>Danh mục: <span><?php echo $result_details['catName']?></span></p>
						<p>Thương hiệu:<span><?php echo $result_details['brandName']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>
                    <?php
                    if (isset($addToCart)){
                        echo '<span style="color: red" class="pt-4">Sản phẩm đã có trong giỏ hàng</span>';
                    }
                    ?>
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
				      <li><a href="productbycat.php"><?php echo $result_category['catName']?></a></li>
                        <?php
                                }
                            }
                        ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
<?php include 'inc/footer.php'; ?>
