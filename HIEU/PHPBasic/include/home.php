<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>D</span>anh
            <span>M</span>ục
            <span>S</span>ản
            <span>P</span>hẩm</h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <!-- first section -->
                    <?php
                    $sql_cat_home = mysqli_query ($con, "SELECT * FROM tbl_category order by category_id desc");
                    if ($sql_cat_home){
                        while ($row_cat_home = mysqli_fetch_array ($sql_cat_home)){
                            $id_category = $row_cat_home['category_id'];//lấy id
                            ?>
                            <!--                                        bắt đầu vòng lặp danh mục sản phẩm-->
                            <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                                <h3 class="heading-tittle text-center font-italic"><?php echo $row_cat_home['category_name']?></h3>
                                <div class="row">
                                    <?php
                                    $sql_sanpham = mysqli_query ($con, "select * from tbl_sanpham order by sanpham_id desc ");
                                    if ($sql_sanpham){
                                        while ($row_sanpham = mysqli_fetch_array ($sql_sanpham)){
                                            if ($row_sanpham['category_id'] == $id_category){
                                                ?>
                                                <!--                                bắt đầu vòng lặp sản phẩm-->
                                                <div class="col-md-4 product-men mt-5">
                                                    <div class="men-pro-item simpleCart_shelfItem">
                                                        <div class="men-thumb-item text-center">
                                                            <img src="images/<?php echo $row_sanpham['sanpham_image']?>" alt="">
                                                            <div class="men-cart-pro">
                                                                <div class="inner-men-cart-pro">
                                                                    <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="link-product-add-cart">Quick View</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item-info-product text-center border-top mt-4">
                                                            <h4 class="pt-1">
                                                                <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name']?></a>
                                                            </h4>
                                                            <div class="info-product-price my-2">
                                                                <span class="item_price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).' '.'vnđ'?></span>
                                                                <del><?php echo number_format($row_sanpham['sanpham_gia']).' '.'vnđ'?></del>
                                                            </div>
                                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                                <form action="?quanly=giohang" method="post">
                                                                    <fieldset>
                                                                        <input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name']?>" />

                                                                        <input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id']?>" />
                                                                        <input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_giakhuyenmai']?>" />

                                                                        <input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image']?>" />
                                                                        <input type="hidden" name="soluong" value="1" />

                                                                        <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
                                                                    </fieldset>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <!--                                kết thúc vòng lặp sản phẩm-->
                                </div>
                            </div>
                            <!--                                    kết thúc vòng lặp danh mục sản phẩm-->
                            <!-- //first section -->
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- //product left -->

            <!-- product right -->
            <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                <div class="side-bar p-sm-4 p-3">
                    <div class="search-hotel border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Tìm kiếm.</h3>
                        <form action="#" method="post">
                            <input type="search" placeholder="Sản phẩm..." name="search" required="">
                            <input type="submit" value=" ">
                        </form>
                    </div>
                    <!-- price -->
                    <div class="range border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Giá</h3>
                        <div class="w3l-range">
                            <ul>
                                <li>
                                    <a href="#">DƯới 1 triệu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //price -->
                    <!-- reviews -->
                    <div class="customer-rev border-bottom left-side py-2">
                        <h3 class="agileits-sear-head mb-3">Khách hàng Review</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>5.0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- //reviews -->
                    <!-- electronics -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Danh mục sản phẩm</h3>
                        <ul>
                            <?php
                            $sql_category_sidebar = mysqli_query ($con, "select * from tbl_category order by category_id desc ");
                            if ($sql_category_sidebar){
                                while ($row_category_sidebar = mysqli_fetch_array ($sql_category_sidebar)){


                                    ?>
                                    <li>
                                        <span class="span"><a href="danhmucsanpham.php?id=<?php echo $row_category_sidebar['category_id']?>"><?php echo $row_category_sidebar['category_name']?></a></span>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- //electronics -->
                    <!-- best seller -->
                    <div class="f-grid py-2">
                        <h3 class="agileits-sear-head mb-3">Sản phẩm bán chạy</h3>
                        <div class="box-scroll">
                            <div class="scroll">
                                <?php
                                $sql_sanpham_sidebar = mysqli_query ($con, "select * from tbl_sanpham where sanpham_hot = '0' order by sanpham_id desc ");
                                if ($sql_sanpham_sidebar){
                                    while ($row_sanpham_sidebar = mysqli_fetch_array ($sql_sanpham_sidebar)){
                                        ?>

                                        <div class="row">
                                            <div class="col-lg-3 col-sm-2 col-3 left-mar">
                                                <img src="images/<?php echo $row_sanpham_sidebar['sanpham_image']?>" alt="" class="img-fluid">
                                            </div>
                                            <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                                <a href=""><?php echo $row_sanpham_sidebar['sanpham_name']?></a>
                                                <a href="" class="price-mar mt-2"><?php echo number_format ($row_sanpham_sidebar['sanpham_giakhuyenmai']).' '.'vnđ'?></a>
                                                <a href="" class="price-mar mt-2"><del style="color: black"><?php echo number_format ($row_sanpham_sidebar['sanpham_gia']).' '.'vnđ'?></del></a>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- //best seller -->
                </div>
                <!-- //product right -->
            </div>
        </div>
    </div>
</div>
<!-- //top products -->

<!-- middle section -->
<div class="join-w3l1 py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <div class="row">
            <div class="col-lg-6">
                <div class="join-agile text-left p-4">
                    <div class="row">
                        <div class="col-sm-7 offer-name">
                            <h6>Smooth, Rich & Loud Audio</h6>
                            <h4 class="mt-2 mb-3">Branded Headphones</h4>
                            <p>Sale up to 25% off all in store</p>
                        </div>
                        <div class="col-sm-5 offerimg-w3l">
                            <img src="images/off1.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-5">
                <div class="join-agile text-left p-4">
                    <div class="row ">
                        <div class="col-sm-7 offer-name">
                            <h6>A Bigger Phone</h6>
                            <h4 class="mt-2 mb-3">Smart Phones 5</h4>
                            <p>Free shipping order over $100</p>
                        </div>
                        <div class="col-sm-5 offerimg-w3l">
                            <img src="images/off2.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- middle section -->