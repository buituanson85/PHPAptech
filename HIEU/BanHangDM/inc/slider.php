
<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <?php
                $get_lastes_iphone = $pd->get_lastes_apple ();
                if ($get_lastes_iphone){
                    while ($result_iphone = $get_lastes_iphone->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?productId=<?php echo $result_iphone['productId']?>"> <img src="admin/uploads/<?php echo $result_iphone['image']?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Iphone</h2>
                    <p><?php echo $fm->textShorten ($result_iphone['productName'], 50)?></p>
                    <div class="button"><span><a href="details.php?productId=<?php echo $result_iphone['productId']?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
            <?php
                $get_lastes_samsung = $pd->get_lastes_samsung ();
                if ($get_lastes_samsung){
                    while ($result_samsung = $get_lastes_samsung->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?productId=<?php echo $result_samsung['productId']?>"><img src="admin/uploads/<?php echo $result_samsung['image']?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Samsung</h2>
                    <p><?php echo $fm->textShorten ($result_samsung['productName'], 50)?></p>
                    <div class="button"><span><a href="details.php?productId=<?php echo $result_samsung['productId']?>">Add to cart</a></span></div>
                </div>
            </div>
                <?php
                    }
                }
            ?>
        </div>
        <div class="section group">
            <?php
                $get_lastes_vinsmart = $pd->get_lastes_vinsmart ();
                if ($get_lastes_vinsmart){
                    while ($result_vinsmart = $get_lastes_vinsmart->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?productId=<?php echo $result_vinsmart['productId']?>"><img src="admin/uploads/<?php echo $result_vinsmart['image']?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Vinsmart</h2>
                    <p><?php echo $fm->textShorten ($result_vinsmart['productName'], 50)?></p>
                    <div class="button"><span><a href="details.php?productId=<?php echo $result_vinsmart['productId']?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
            <?php
                $get_lastes_oppe = $pd->get_lastes_oppe ();
                if ($get_lastes_oppe){
                    while ($result_oppe = $get_lastes_oppe->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?productId=<?php echo $result_oppe['productId']?>"><img src="admin/uploads/<?php echo $result_oppe['image']?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Dell</h2>
                    <p><?php echo $fm->textShorten ($result_oppe['productName'], 50)?></p>
                    <div class="button"><span><a href="details.php?productId=<?php echo $result_oppe['productId']?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="images/1.jpg" alt=""/></li>
                    <li><img src="images/2.jpg" alt=""/></li>
                    <li><img src="images/3.jpg" alt=""/></li>
                    <li><img src="images/4.jpg" alt=""/></li>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>