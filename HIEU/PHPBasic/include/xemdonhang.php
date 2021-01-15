<?php
    if (isset($_GET['yeucauhuydon']) && $_GET['magiaodich']){
        $huydon = $_GET['yeucauhuydon'];
        $magiaodich = $_GET['magiaodich'];
    }else{
        $huydon = '';
        $magiaodich = '';
    }

    $sql_update_giaodich = mysqli_query ($con, "update tbl_giaodich set yeucauhuydon = '$huydon' where magiaodich = '$magiaodich'");
    $sql_update_donhang = mysqli_query ($con, "update tbl_donhang set yeucauhuydon = '$huydon' where mahang = '$magiaodich'");
?>
<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Xem đơn hàng</h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                        <div class="row">
                            <?php
                                if (isset($_SESSION['dangnhap_home'])){
                                    echo 'Đơn hàng: '.$_SESSION['dangnhap_home'];
                                }
                            ?>
                            <div class="col-md-12">
                                </br>
                                <h4>Liệt kê đơn hàng</h4>
                                </br>
                                <?php

                                if (isset($_GET['khachhang'])) {
                                    $id_khachhang = $_GET['khachhang'];
                                }else {
                                    $id_khachhang = '';
                                }
                                    $sql_select_donhang = mysqli_query ($con, "select * from tbl_giaodich where khachhang_id = '$id_khachhang' group by magiaodich order by giaodich_id desc ");
                                    ?>
                                    <table class="table table-bordered ">
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã giao dịch</th>
                                            <th>Ngày đặt</th>
                                            <th>Quản lý</th>
                                            <th>Tình trạng</th>
                                            <th>Yêu cầu huỷ</th>
                                        </tr>
                                        <tbody>
                                        <?php
                                        $index = 0;
                                        if ($sql_select_donhang){
                                            while ($row_donhang = mysqli_fetch_array ($sql_select_donhang)){
                                                $index++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $index?></td>
                                                    <td><?php echo $row_donhang['magiaodich']?></td>
                                                    <td><?php echo $row_donhang['ngaythang']?></td>
                                                    <td>
                                                        <?php
                                                            if ($row_donhang['tinhtrangdon'] == 0){
                                                                echo 'Đang chờ xử lý';
                                                            }else if($row_donhang['tinhtrangdon'] == 2){
                                                                echo 'Huỷ';
                                                            }else if($row_donhang['tinhtrangdon'] == 1){
                                                                echo 'Hoàn thành';
                                                            }
                                                        ?>
                                                    </td>

                                                    <td><a href="index.php?quanly=xemdonhang&khachhang=<?php echo $row_donhang['khachhang_id']?>&magiaodich=<?php echo $row_donhang['magiaodich']?>">Xem chi tiết đơn hàng</a></td>

                                                    <td>
                                                        <?php
                                                            if ($row_donhang['yeucauhuydon'] == 0){

                                                        ?>
                                                        <a href="index.php?quanly=xemdonhang&khachhang=<?php echo $row_donhang['khachhang_id']?>&magiaodich=<?php echo $row_donhang['magiaodich']?>&yeucauhuydon=1">Yêu cầu huỷ</a>
                                                        <?php
                                                            }elseif($row_donhang['yeucauhuydon'] == 1){
                                                        ?>
                                                          <p>Đang chờ huỷ</p>
                                                                <?php
                                                            }else{
                                                                echo 'đã huỷ đơn';
                                                            }
                                                                ?>
                                                                </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="col-md-12">
                                </br>
                                <p>Chi tiết đơn hàng</p>
                                <?php
                                if (isset($_GET['magiaodich'])){
                                    $magiaodich = $_GET['magiaodich'];
                                }else{
                                    $magiaodich = '';
                                }
                                    $sql_select_donhang = mysqli_query ($con, "select * from tbl_giaodich, tbl_khachhang, tbl_sanpham where tbl_giaodich.khachhang_id = tbl_khachhang.khachhang_id and tbl_giaodich.sanpham_id = tbl_sanpham.sanpham_id and tbl_giaodich.magiaodich = '$magiaodich'  order by tbl_giaodich.giaodich_id desc ");
                                    ?>
                                    <table class="table table-bordered ">
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã giao dịch</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Ngày đặt</th>

                                        </tr>
                                        <tbody>
                                        <?php
                                        $index = 0;
                                        if ($sql_select_donhang){
                                            while ($row_donhang = mysqli_fetch_array ($sql_select_donhang)){
                                                $index++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $index?></td>
                                                    <td><?php echo $row_donhang['magiaodich']?></td>
                                                    <td><?php echo $row_donhang['sanpham_name']?></td>
                                                    <td><?php echo $row_donhang['soluong']?></td>
                                                    <td><?php echo $row_donhang['ngaythang']?></td>

                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                    <!-- //first section -->
                </div>
            </div>
            <!-- //product left -->

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
                            <img src="../images/off1.png" alt="" class="img-fluid">
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
                            <img src="../images/off2.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- middle section -->
