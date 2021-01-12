<?php
include_once '../db/connect.php';
?>
<?php
if (isset($_POST['themsanpham'])){
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $soluong = $_POST['soluong'];
    $gia = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $danhmuc = $_POST['danhmuc'];

    $path = '../uploads/';
    $sql_insert_product = mysqli_query ($con, "insert into tbl_sanpham( sanpham_name, sanpham_chitiet, sanpham_mota, sanpham_gia, sanpham_giakhuyenmai, sanpham_soluong, sanpham_image, category_id) values ('$tensanpham', '$chitiet', '$mota', '$gia', '$giakhuyenmai', '$soluong', '$hinhanh', '$danhmuc')");
    move_uploaded_file ($hinhanh_tmp,$path.$hinhanh);
}elseif (isset($_POST['capnhatsanpham'])){
//    if (isset($_GET['capnhat_id'])){
//        $id_update = $_GET['capnhat_id'];
//    }else{
//        $id_update = '';
//    }   làm theo get
    $id_update = $_POST['id_update'];
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $soluong = $_POST['soluong'];
    $gia = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $danhmuc = $_POST['danhmuc'];
    $path = '../uploads/';
    if ($hinhanh == ''){ // !$hinhanh
        $sql_update_image = "update tbl_sanpham set sanpham_name = '$tensanpham', sanpham_chitiet = '$chitiet' , sanpham_mota = '$mota', sanpham_gia = '$gia', sanpham_giakhuyenmai = '$giakhuyenmai', sanpham_soluong = '$soluong', category_id = '$danhmuc' where sanpham_id = '$id_update'";
    }else{
        $sql_update_image = "update tbl_sanpham set sanpham_name = '$tensanpham', sanpham_chitiet = '$chitiet' , sanpham_mota = '$mota', sanpham_gia = '$gia', sanpham_giakhuyenmai = '$giakhuyenmai', sanpham_image = '$hinhanh', sanpham_soluong = '$soluong', category_id = '$danhmuc' where sanpham_id = '$id_update'";
    }
    mysqli_query ($con, $sql_update_image);
}
if (isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query ($con, "delete from tbl_sanpham where sanpham_id = '$id'");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <title>Sản phẩm</title>
</head>

<body>
<div class="col-lg-12" style="padding-top: 30px">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Đơn hàng <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulydanhmuc.php?quanly=danhmuc">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Khách hàng</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="container-fluid">
    <div class="row" style="padding-top: 30px">
        <?php
        if (isset($_GET['quanly']) == 'capnhat'){

            $id_capnhat = $_GET['capnhat_id'];
            $sql_capnhat = mysqli_query ($con, "select * from tbl_sanpham where sanpham_id = '$id_capnhat'");
            $row_capnhat = mysqli_fetch_array ($sql_capnhat);
            $id_category_1 = $row_capnhat['category_id'];
            ?>
            <div class="col-md-4">
                <h4>Cập nhật sản phẩm</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <label>Tên sản phẩm: </label>
                    <input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['sanpham_name']?>">
                    <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['sanpham_id']?>">
                    </br>
                    <label>Hình ảnh sản phẩm: </label>
                    <input type="file" class="form-control" name="hinhanh" placeholder="thêm hình ảnh sản phẩm">
                    <img src="../uploads/<?php echo $row_capnhat['sanpham_image']?>" style="width: 20%">
                    </br>
                    <label>Giá sản phẩm: </label>
                    <input type="number" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['sanpham_gia']?>">
                    </br>
                    <label>Giá khuyến mĩa: </label>
                    <input type="number" class="form-control" name="giakhuyenmai" value="<?php echo $row_capnhat['sanpham_giakhuyenmai']?>">
                    </br>
                    <label>Số lượng: </label>
                    <input type="number" class="form-control" name="soluong" value="<?php echo $row_capnhat['sanpham_soluong']?>">
                    </br>
                    <label>Mô tả: </label>
                    <textarea class="form-control" style="resize: none" name="mota"><?php echo $row_capnhat['sanpham_mota']?></textarea>
                    </br>
                    <label>Chi tiết: </label>
                    <textarea class="form-control" style="resize: none" name="chitiet"><?php echo $row_capnhat['sanpham_chitiet']?></textarea>
                    </br>
                    <label>Danh mục: </label>
                    <?php
                    $sql_danhmuc = mysqli_query ($con, "select * from tbl_category order by category_id desc ");

                    ?>
                    <select name="danhmuc" class="form-control">
                        <option value="0">======= Chọn danh mục =======</option>
                        <?php
                        if ($sql_danhmuc){
                            while ($row_danhmuc = mysqli_fetch_array ($sql_danhmuc)){
                                    if ($id_category_1 == $row_danhmuc['category_id']){
                                ?>
                                <option selected value="<?php echo  $row_danhmuc['category_id']?>"><?php echo  $row_danhmuc['category_name']?></option>
                                <?php
                                }else{
                                 ?>
                                 <option value="<?php echo  $row_danhmuc['category_id']?>"><?php echo  $row_danhmuc['category_name']?></option>
                                    <?php
                                 }
                            }
                        }
                        ?>

                    </select>
                    </br>
                    <input type="submit" name="capnhatsanpham" value="cập nhật sản phẩm" class="btn btn-success" style="padding-top: 10px">
                </form>
            </div>
            <?php
        }else{
            ?>
            <div class="col-md-4">
                <h4>Thêm sản phẩm</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <label>Tên sản phẩm: </label>
                    <input type="text" class="form-control" name="tensanpham" placeholder="Nhập tên sản phẩm">
                    </br>
                    <label>Hình ảnh sản phẩm: </label>
                    <input type="file" class="form-control" name="hinhanh" placeholder="thêm hình ảnh sản phẩm">
                    </br>
                    <label>Giá sản phẩm: </label>
                    <input type="number" class="form-control" name="giasanpham" placeholder="Nhập giá sản phẩm">
                    </br>
                    <label>Giá khuyến mĩa: </label>
                    <input type="number" class="form-control" name="giakhuyenmai" placeholder="Nhập giá khuyến mãi">
                    </br>
                    <label>Số lượng: </label>
                    <input type="number" class="form-control" name="soluong" placeholder="Nhập số lượng sản phẩm">
                    </br>
                    <label>Mô tả: </label>
                    <textarea class="form-control" style="resize: none" name="mota"></textarea>
                    </br>
                    <label>Chi tiết: </label>
                    <textarea class="form-control" style="resize: none" name="chitiet"></textarea>
                    </br>
                    <label>Danh mục: </label>
                    <?php
                        $sql_danhmuc = mysqli_query ($con, "select * from tbl_category order by category_id desc ");

                    ?>
                    <select name="danhmuc" class="form-control">
                        <option value="0">======= Chọn danh mục =======</option>
                        <?php
                            if ($sql_danhmuc){
                                while ($row_danhmuc = mysqli_fetch_array ($sql_danhmuc)){

                        ?>
                            <option value="<?php echo  $row_danhmuc['category_id']?>"><?php echo  $row_danhmuc['category_name']?></option>
                        <?php
                                }
                            }
                        ?>

                    </select>
                    </br>
                    <input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-success" style="padding-top: 10px">
                </form>
            </div>
            <?php
        }
        ?>
        <div class="col-md-8">
            <h4>Liệt kê sản phẩm</h4>
            <?php
            $sql_select_sp = mysqli_query ($con, "select * from tbl_sanpham,tbl_category where tbl_sanpham.category_id = tbl_category.category_id order by tbl_sanpham.sanpham_id desc ");
            ?>
            <table class="table table-bordered ">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Giá sản phẩm</th>
                    <th>Giá khuyến mãi</th>
                    <th>Quản lý</th>
                </tr>
                <tbody>
                <?php
                $index = 0;
                if ($sql_select_sp){
                    while ($row_select_sp = mysqli_fetch_array ($sql_select_sp)){
                        $index++;
                        ?>
                        <tr>
                            <td><?php echo $index?></td>
                            <td><?php echo $row_select_sp['sanpham_name']?></td>
                            <td style="width: 100px"><img src="../uploads/<?php echo $row_select_sp['sanpham_image']?>" style="width: 40%; height: 30%"></td>
                            <td><?php echo $row_select_sp['sanpham_soluong']?></td>
                            <td><?php echo $row_select_sp['category_name']?></td>
                            <td><?php echo number_format ($row_select_sp['sanpham_gia']).' '.'vnđ'?></td>
                            <td><?php echo number_format ($row_select_sp['sanpham_giakhuyenmai']).' '.'vnđ'?></td>
                            <td><a href="?xoa=<?php echo $row_select_sp['sanpham_id']?>">Xoá</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_select_sp['sanpham_id']?>">Cập nhật</a></td>
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
</body>
</html>

