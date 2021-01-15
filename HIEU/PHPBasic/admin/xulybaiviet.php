<?php
include_once '../db/connect.php';
?>
<?php
if (isset($_POST['thembaiviet'])){
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $danhmuc = $_POST['danhmuc'];

    $path = '../uploads/';
    $sql_insert_product = mysqli_query ($con, "insert into tbl_baiviet( tenbaiviet, tomtat, noidung, danhmuctin_id, baiviet_image) values ('$tenbaiviet', '$mota', '$chitiet', '$danhmuc', '$hinhanh')");
    move_uploaded_file ($hinhanh_tmp,$path.$hinhanh);
}elseif (isset($_POST['capnhatbaiviet'])){
//    if (isset($_GET['capnhat_id'])){
//        $id_update = $_GET['capnhat_id'];
//    }else{
//        $id_update = '';
//    }   làm theo get
    $id_update = $_POST['id_update'];
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $danhmuc = $_POST['danhmuc'];
    $path = '../uploads/';
    if ($hinhanh == ''){ // !$hinhanh
        $sql_update_image = "update tbl_baiviet set tenbaiviet = '$tenbaiviet', tomtat = '$mota', noidung = '$chitiet', danhmuctin_id = '$danhmuc' where baiviet_id = '$id_update'";
    }else{
        $sql_update_image = "update tbl_baiviet set tenbaiviet = '$tenbaiviet', tomtat = '$mota', noidung = '$chitiet' , danhmuctin_id = '$danhmuc', baiviet_image = '$hinhanh' where baiviet_id = '$id_update'";
    }
    mysqli_query ($con, $sql_update_image);
}

?>
<?php
if (isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query ($con, "delete from tbl_baiviet where baiviet_id = '$id'");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <title>Bài viết</title>
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
                    <a class="nav-link" href="xulydonhang.php">Đơn hàng <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulydanhmuc.php?quanly=danhmuc">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulydanhmucbaiviet.php">Danh mục bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulybaiviet.php">Bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="xulykhachhang.php">Khách hàng</a>
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
            $sql_capnhat = mysqli_query ($con, "select * from tbl_baiviet where baiviet_id = '$id_capnhat'");
            $row_capnhat = mysqli_fetch_array ($sql_capnhat);
            $id_category_1 = $row_capnhat['danhmuctin_id'];
            ?>
            <div class="col-md-4">
                <h4>Cập nhật bài viết</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <label>Tên sản phẩm: </label>
                        <input type="text" class="form-control" name="tenbaiviet" value="<?php echo $row_capnhat['tenbaiviet']?>">
                        <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['baiviet_id']?>">
                        </br>
                        <label>Hình ảnh sản phẩm: </label>
                        <input type="file" class="form-control" name="hinhanh" placeholder="thêm hình ảnh"></br>
                        <img src="../uploads/<?php echo $row_capnhat['baiviet_image']?>" style="width: 200px">
                        </br>
                        <label>Mô tả: </label>
                        <textarea class="form-control" style="resize: none" name="mota"><?php echo $row_capnhat['tomtat']?></textarea>
                        </br>
                        <label>Chi tiết: </label>
                        <textarea class="form-control" style="resize: none" name="chitiet"><?php echo $row_capnhat['noidung']?></textarea>
                        </br>
                        <label>Danh mục: </label>
                        <?php
                        $sql_danhmuc = mysqli_query ($con, "select * from tbl_danhmuctin order by danhmuctin_id desc ");

                        ?>
                        <select name="danhmuc" class="form-control">
                            <option value="0">======= Chọn danh mục =======</option>
                            <?php
                            if ($sql_danhmuc){
                                while ($row_danhmuc = mysqli_fetch_array ($sql_danhmuc)){
                                    if ($id_category_1 == $row_danhmuc['danhmuctin_id']){
                                        ?>
                                        <option selected value="<?php echo  $row_danhmuc['danhmuctin_id']?>"><?php echo  $row_danhmuc['tendanhmuc']?></option>
                                        <?php
                                    }else{
                                        ?>
                                        <option value="<?php echo  $row_danhmuc['danhmuctin_id']?>"><?php echo  $row_danhmuc['tendanhmuc']?></option>
                                        <?php
                                    }
                                }
                            }
                            ?>

                        </select>
                        </br>
                        <input type="submit" name="capnhatbaiviet" value="cập nhật bài viết" class="btn btn-success" style="padding-top: 10px">
                    </form>

            </div>
            <?php
        }else{
            ?>
            <div class="col-md-4">
                <h4>Thêm bài viết</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <label>Tên bài viết: </label>
                    <input type="text" class="form-control" name="tenbaiviet" placeholder="Nhập tên bài viết">
                    </br>
                    <label>Hình ảnh: </label>
                    <input type="file" class="form-control" name="hinhanh" placeholder="thêm hình ảnh">
                    </br>
                    <label>Mô tả: </label>
                    <textarea class="form-control" style="resize: none" name="mota"></textarea>
                    </br>
                    <label>Chi tiết: </label>
                    <textarea class="form-control" style="resize: none" name="chitiet"></textarea>
                    </br>
                    <label>Danh mục: </label>
                    <?php
                    $sql_danhmuc = mysqli_query ($con, "select * from tbl_danhmuctin order by danhmuctin_id desc ");

                    ?>
                    <select name="danhmuc" class="form-control">
                        <option value="0">======= Chọn danh mục =======</option>
                        <?php
                        if ($sql_danhmuc){
                            while ($row_danhmuc = mysqli_fetch_array ($sql_danhmuc)){

                                ?>
                                <option value="<?php echo  $row_danhmuc['danhmuctin_id']?>"><?php echo  $row_danhmuc['tendanhmuc']?></option>
                                <?php
                            }
                        }
                        ?>

                    </select>
                    </br>
                    <input type="submit" name="thembaiviet" value="Thêm bài viết" class="btn btn-success" style="padding-top: 10px">
                </form>
            </div>
            <?php
        }
        ?>
        <div class="col-md-8">
            <h4>Liệt kê bài viết</h4>
            <?php
            $sql_select_sp = mysqli_query ($con, "select * from tbl_baiviet,tbl_danhmuctin where tbl_baiviet.danhmuctin_id = tbl_danhmuctin.danhmuctin_id order by tbl_baiviet.danhmuctin_id desc ");
            ?>
            <table class="table table-bordered ">
                <tr>
                    <th>STT</th>
                    <th>Tên bài viết</th>
                    <th>Hình ảnh</th>
                    <th>Tóm tắt</th>
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
                            <td><?php echo $row_select_sp['tenbaiviet']?></td>
                            <td style="width: 100px"><img src="../uploads/<?php echo $row_select_sp['baiviet_image']?>" style="width: 50px" ></td>
                            <td><?php echo $row_select_sp['tomtat']?></td>
                            <td><a href="?xoa=<?php echo $row_select_sp['baiviet_id']?>">Xoá</a> || <a href="xulybaiviet.php?quanly=capnhat&capnhat_id=<?php echo $row_select_sp['baiviet_id']?>">Cập nhật</a></td>
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


