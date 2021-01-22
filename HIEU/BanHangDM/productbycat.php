<?php
    include 'inc/header.php';
//    include 'inc/slider.php';
?>
<?php
    if (!isset($_GET['catid']) || $_GET['catid'] == null){
        echo "<script>window.location = '404.php'</script>";
    }else{
        $catId = $_GET['catid'];
    }

//    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//        $catName = $_POST['catName'];
//        $updateCat = $cat->updates_category($catName, $catId);
//    }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
            <?php
                $get_name_cat = $cat->get_name_cat($catId);
                if ($get_name_cat){
                    while ($result_cat = $get_name_cat->fetch_assoc()){
            ?>
    		<div class="heading">
    		<h3><?php echo $result_cat['catName']?></h3>
    		</div>
            <?php
                    }
                }
            ?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
              <?php
                $get_product_by_cat = $pd->get_product_by_cat($catId);
                if ($get_product_by_cat){
                    while ($result_pro = $get_product_by_cat->fetch_assoc()){
              ?>
				<div class="grid_1_of_4 images_1_of_4 w-50 h-75">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_pro['image']?>" alt="" /></a>
					 <h2><?php echo $result_pro['productName']?></h2>
					 <p><?php echo $fm->textShorten($result_pro['product_desc'], 70) ?></p>
					 <p><span class="price"><?php echo number_format ($result_pro['price']).' '.'$'?></span></p>
                     <div class="button"><span><a href="details.php?productId=<?php echo $result_pro['productId']?>">Add to cart</a></span></div>
				</div>
              <?php
                    }
                }
              ?>
			</div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>

