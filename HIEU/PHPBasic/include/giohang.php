<?php

$con = mysqli_connect("localhost:3306","root","","banhangdienmay");

// Check connection
if (mysqli_connect_errno()) { //khi kết nỗi lỗi
    echo "Failed to connect to MySQL: " . mysqli_connect_errno() -> connect_error;
}

mysqli_set_charset ($con, "utf8"); //sét font
?>
<?php
if (isset($_POST['themgiohang'])){
    $tensanpham = $_POST['tensanpham'];
    $sanpham_id = $_POST['sanpham_id'];
    $hinhanh = $_POST['hinhanh'];
    $gia = $_POST['giasanpham'];
    $soluong = $_POST['soluong'];


    //gom những sản phẩm giống nhau trong giỏ hàng.
    $select_giohang = "select * from tbl_giohang where sanpham_id = '$sanpham_id'";
    $sql_select_giohang = mysqli_query ($con, $select_giohang);
    $count = mysqli_num_rows ($sql_select_giohang);//hàm num rows chỉ dùng cho select
    if ($count > 0){
        $row_sanpham = mysqli_fetch_array ($sql_select_giohang);
        $soluong = $row_sanpham['soluong'] + 1;
        $giohang = "update  tbl_giohang set soluong = '$soluong' where sanpham_id = '$sanpham_id'";
    }else{
        $soluong = $soluong;
        $giohang = "insert into tbl_giohang( tensanpham, sanpham_id, giasanpham, hinhanh, soluong) values ( '$tensanpham', '$sanpham_id', '$gia', '$hinhanh', '$soluong')";
    }

    $sql_giohang = mysqli_query ($con, $giohang);
    if ($sql_giohang == 0){
        header ('Location:index.php?quanly=chitietsp&id='.$sanpham_id);
    }
}elseif (isset($_POST['capnhatsoluong'])){ //update gio hang

    for($i = 0; $i < count($_POST['product_id']); $i++){
        $sanpham_id = $_POST['product_id'][$i];
        $soluong = $_POST['soluong'][$i];
        if ($soluong <= 0){
            $delete_giohang = "delete from tbl_giohang where sanpham_id = '$sanpham_id'";
            $sql_delete = mysqli_query ($con, $delete_giohang);
        }else{
            $update_giohang = "UPDATE tbl_giohang set soluong = '$soluong' where sanpham_id = '$sanpham_id'";
            $sql_update = mysqli_query ($con, $update_giohang);
        }
    }
}elseif(isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    $del_giohang = "delete from tbl_giohang where giohang_id = '$id'";
    $sql_del = mysqli_query ($con, $del_giohang);
}elseif (isset($_POST['thanhtoan'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $giaohang = $_POST['giaohang'];
    $khach_hang = "insert into tbl_khachhang( name, phone, address, note, email, giaohang) values ( '$name', '$phone', '$address', '$note', '$email', '$giaohang')";
    $sql_khachhang = mysqli_query ($con, $khach_hang);
    //lưu đơn hàng sau khi khach hang da khai bao thong tin thanh cong.
    if ($sql_khachhang){
        $sql_select_khachhang = mysqli_query ($con, "select * from tbl_khachhang order by khachhang_id desc LIMIT 1");
        $mahang = rand (0,9999);
        $row_khachhang = mysqli_fetch_array ($sql_select_khachhang);
        $khachhang_id = $row_khachhang['khachhang_id'];
        for($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++){

            $sanpham_id = $_POST['thanhtoan_product_id'][$i];
            $soluong = $_POST['thanhtoan_soluong'][$i];
            $sql_donhang = mysqli_query ($con, "insert into tbl_donhang( sanpham_id, soluong, mahang, khachhang_id) values ( '$sanpham_id', '$soluong', '$mahang', '$khachhang_id')");
            $sql_delete_thanhtoan = mysqli_query ($con, "delete from tbl_giohang where sanpham_id = '$sanpham_id'");
        }

    }
}
?>

<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>G</span>iỏ hàng của bạn
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <?php
            $lay_giohang = "select * from tbl_giohang order by giohang_id desc ";
                $sql_lay_giohang = mysqli_query ($con, $lay_giohang);
            ?>
            <div class="table-responsive">
                <form action="" method="post">
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>Thứ tự</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tên sản phẩm</th>

                        <th>Giá</th>
                        <th>Giá tổng</th>
                        <th>Quản lý</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $index = 0;
                        $sum = 0;
                        if ($sql_lay_giohang){
                            while ($row_lay_giohang = mysqli_fetch_array ($sql_lay_giohang)){
                                $index++;
                    ?>
                    <tr class="rem1">
                        <td class="invert"> <?php echo $index ?></td>
                        <td class="invert-image">
                            <a href="">
                                <img src="images/<?php echo $row_lay_giohang['hinhanh']?>" alt=" " class="img-responsive">
                            </a>
                        </td>
                        <td class="invert">
                            <input type="number" name="soluong[]" value="<?php echo $row_lay_giohang['soluong'] ?>" min="0">
                            <input type="hidden" name="product_id[]" value="<?php echo $row_lay_giohang['sanpham_id'] ?>" min="0">
                        </td>
                        <td class="invert"><?php echo $row_lay_giohang['tensanpham']?></td>
                        <td class="invert"><?php echo number_format ($row_lay_giohang['giasanpham'])?></td>
                        <td class="invert">
                            <?php
                                $total = $row_lay_giohang['giasanpham'] * $row_lay_giohang['soluong'];
                                echo number_format ($total);
                            ?>
                        </td>
                        <td class="invert">
                            <a href="?quanly=giohang&xoa=<?php echo $row_lay_giohang['giohang_id']?>">Xoá</a>
                        </td>
                    </tr>
                    <?php
                                $sum += $total;
                            }
                        }
                    ?>
                    <tr>
                        <td colspan = "7">Tổng tiền: <?php echo number_format ($sum).' '.'vnđ'?></td>
                    </tr>
                    <tr>
                        <td colspan="7"> <input type="submit" class="btn btn-success" value="Cập nhật giỏ hàng" name="capnhatsoluong"></td>
                    </tr>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
        <div class="checkout-left">
            <div class="address_form_agile mt-sm-5 mt-4">
                <h4 class="mb-sm-4 mb-3">Thêm địa chỉ giao hàng</h4>

                <form action="" method="post" class="creditly-card-form agileinfo_form">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="controls form-group">
                                    <input class="billing-address-name form-control" type="text" name="name" placeholder="Điền tên" required="">
                                </div>
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left form-group">
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" required="">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right form-group">
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Địa chỉ" name="address" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" class="form-control" placeholder="Email" name="email" required="">
                                </div>
                                <div class="controls form-group">
                                    <textarea style="resize: none" type="text" class="form-control" placeholder="Ghi chú" name="note" required=""></textarea>
                                </div>
                                <div class="controls form-group">
                                    <select class="option-w3ls" name="giaohang">
                                        <option>Chọn hình thức giao hàng</option>
                                        <option value="1">Thanh toán online</option>
                                        <option value="0">Tại nhà</option>

                                    </select>
                                </div>
                            </div>
                                <?php
                                    $lay_thanhtoan_giohang = "select * from tbl_giohang order by giohang_id desc";
                                    $sql_lay_thanhtoan_giohang = mysqli_query ($con, $lay_thanhtoan_giohang);
                                    if ($sql_lay_thanhtoan_giohang){
                                        while ($row_lay_thanhtoan_giohang = mysqli_fetch_array ($sql_lay_thanhtoan_giohang)){
                                ?>
                            <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_lay_thanhtoan_giohang['soluong'] ?>" min="0">
                            <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_lay_thanhtoan_giohang['sanpham_id'] ?>" min="0">
                                <?php
                                        }
                                    }
                                ?>
                            <input type="submit" name="thanhtoan" class="btn btn-success" style="width: 20%" value="Thanh toán">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //checkout page -->
