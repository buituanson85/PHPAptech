<?php
    include 'inc/header.php';
//    include 'inc/slider.php';
?>
<?php
    if (!isset($_GET['proId']) || $_GET['proId'] == null){
        echo "<script>window.location = '404.php'</script>";
    }else{
        $id = $_GET['proId'];
    }
    //khi nhấn vào submit buynow
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $quantity = $_POST['quantity'];
        $addtoCart = $ct-> add_to_cart($quantity, $id); // có hình ảnh phải có $_FILES  $_POST lấy tất cả dữ liệu
    }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <?php
                $get_product_details = $pd->get_details($id);
                if ($get_product_details){
                    while ($result_details = $get_product_details->fetch_assoc()){
            ?>
            <div class="cont-desc span_1_of_2">
                <div class="grid images_3_of_2">
                    <img src="admin/uploads/<?php echo $result_details['image']?>" alt="" />
                </div>
                <div class="desc span_3_of_2">
                    <h2><?php echo $result_details['productName']?></h2>
                    <p><?php echo $fm->textShorten ($result_details['product_desc'], 100)?></p>
                    <div class="price">
                        <p>Price: <span><?php echo $result_details['price']." "."VND"?></span></p>
                        <p>Category: <span><?php echo $result_details['catName']?></span></p>
                        <p>Brand:<span><?php echo $result_details['brandName']?></span></p>
                    </div>
                    <div class="add-cart">
                        <form action="" method="post">
                            <input type="number" class="buyfield" name="quantity" value="1" min="1"/>
                            <input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
                        </form>
                        <?php
                        if (isset($addtoCart)){
                            echo "</br><span class='error' style='color: red'>Product Already Added</span>";
                        }
                        ?>
                    </div>
                </div>
                <div class="product-desc">
                    <h2>Product Details</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </div>
            <?php
                    }
                }
            ?>
              <div class="rightsidebar span_3_of_1">
                    <h2>CATEGORIES</h2>
                    <ul>
                      <li><a href="productbycat.php">Mobile Phones</a></li>
                      <li><a href="productbycat.php">Desktop</a></li>
                      <li><a href="productbycat.php">Laptop</a></li>
                      <li><a href="productbycat.php">Accessories</a></li>
                      <li><a href="productbycat.php#">Software</a></li>
                       <li><a href="productbycat.php">Sports & Fitness</a></li>
                       <li><a href="productbycat.php">Footwear</a></li>
                       <li><a href="productbycat.php">Jewellery</a></li>
                       <li><a href="productbycat.php">Clothing</a></li>
                       <li><a href="productbycat.php">Home Decor & Kitchen</a></li>
                       <li><a href="productbycat.php">Beauty & Healthcare</a></li>
                       <li><a href="productbycat.php">Toys, Kids & Babies</a></li>
                    </ul>
             </div>
        </div>
    </div>
 <?php
    include 'inc/footer.php';
 ?>