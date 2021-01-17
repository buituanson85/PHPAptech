<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '';
    }
    $chitiet = "select * from tbl_sanpham where sanpham_id = '$id'";
    $chitiet_title = "select * from tbl_sanpham where sanpham_id = '$id'";
    $sql_chitiet = mysqli_query ($con, $chitiet);
    $sql_chitiet_title = mysqli_query ($con, $chitiet);
    $row_title_sanpham = mysqli_fetch_array ($sql_chitiet_title);
    $title_sanpham = $row_title_sanpham['sanpham_name'];
?>
<!---->
<?php
//    if (isset($_POST['themgiohang'])){
//        $tensanpham = $_POST['tensanpham'];
//        $sanpham_id = $_POST['sanpham_id'];
//        $hinhanh = $_POST['hinhanh'];
//        $gia = $_POST['giasanpham'];
//        $soluong = $_POST['soluong'];
//        $giohang = "insert into tbl_giohang( tensanpham, sanpham_id, giasanpham, hinhanh, soluong) values ( '$tensanpham', '$sanpham_id', '$gia', '$hinhanh', '$soluong')";
//        $sql_giohang = mysqli_query ($con, $giohang);
//        $count_giohang = mysqli_num_rows ($sql_giohang);
//        if ($count_giohang > 0){
//            header ('Location:dashboard.php?quanly=giohang');
//        }else{
//            header ('Location:dashboard.php?quanly=chitietsp&id='.$sanpham_id);
//        }
//    }
//?>
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.php">Home</a>
                    <i>|</i>
                </li>
                <li><?php echo $title_sanpham ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<?php
    if ($sql_chitiet){
        while ($row_chitiet = mysqli_fetch_array ($sql_chitiet)){
?>
<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">  </h3>
        <!-- //tittle heading -->
        <div class="row">
            <div class="col-lg-5 col-md-8 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <?php

                            ?>
                            <li data-thumb="images/si1.jpg">
                                <div class="thumb-image">
                                    <img src="images/<?php echo $row_chitiet['sanpham_image']?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
                            </li>
                            <?php

                            ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                <h3 class="mb-3"><?php echo $row_chitiet['sanpham_name']?></h3>
                <p class="mb-3">
                    <span class="item_price"><?php echo number_format ($row_chitiet['sanpham_giakhuyenmai']).' '.'vnđ'?></span>
                    <del class="mx-2 font-weight-light"><?php echo number_format ($row_chitiet['sanpham_giakhuyenmai']).' '.'vnđ'?></del>
                    <label>Miễn phí vận chuyển</label>
                </p>

                <div class="product-single-w3l">
                    <p class="my-sm-4 my-3">
                        <?php
                            echo $row_chitiet['sanpham_chitiet'];
                        ?>
                    </p></br>
                    <p class="my-sm-4 my-3">
                        <?php
                        echo $row_chitiet['sanpham_mota'];
                        ?>
                    </p>
                </div>
                <div class="occasion-cart">
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        <form action="?quanly=giohang" method="post">
                            <fieldset>
                                <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name']?>" />

                                <input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id']?>" />
                                <input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_giakhuyenmai']?>" />

                                <input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_image']?>" />
                                <input type="hidden" name="soluong" value="1" />

                                <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Single Page -->
<?php
        }
    }
?>
