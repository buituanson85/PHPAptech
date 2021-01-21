<?php
    include 'inc/header.php';
    include 'inc/slider.php';
    global $pd, $fm;
?>

<div class="main">
    <?php

    ?>
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
              <?php
                $get_product_feature = $pd->get_product_feature();
                if ($get_product_feature){
                    while ($result = $get_product_feature->fetch_assoc()){
              ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?productId=<?php echo $result['productId']?>"><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['productName']?></h2>
					 <p><?php echo $fm->textShorten ($result['product_desc'], 80)?></p>
					 <p><span class="price"><?php echo number_format ($result['price']).' '.'VNĐ'?></span></p>
				     <div class="button"><span><a href="details.php?productId=<?php echo $result['productId']?>" class="details">Details</a></span></div>
				</div>
              <?php
                    }
                }
              ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
                <?php
                $get_product_new = $pd->get_product_new();
                if ($get_product_new){
                while ($result_new = $get_product_new->fetch_assoc()){
                ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?productId=<?php echo $result_new['productId']?>"><img src="admin/uploads/<?php echo $result_new['image']?>" alt="" /></a>
					 <h2><?php echo $result_new['productName']?></h2>
					 <p><span class="price"><?php echo number_format ($result_new['price']).' '.'VNĐ'?></span></p>
				     <div class="button"><span><a href="details.php?productId=<?php echo $result_new['productId']?>" class="details">Details</a></span></div>
				</div>
                    <?php
                        }
                    }
                ?>
			</div>
    </div>
 </div>
<?php include 'inc/footer.php';?>

