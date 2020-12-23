<?php
require_once ('../../DBConnection/dbhelper.php');
?>
<!doctype html>
<html lang="en">
<head>
    <title>Quản lý Sản phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    Css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!--    Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--    Js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--    Popper-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="../category/">Quản lý danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Quản lý sản phẩm</a>
        </li>
        </li>
    </ul>
    <div class="container" style="margin-top: 30px">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <center><h2>Quản lý sản phẩm</h2></center>
            </div>
            <div class="panel-body">
                <a href="Add.php"><button class="btn btn-success" style="margin-bottom: 15px">Thêm sản phẩm</button></a>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="50px">STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá bán</th>
                        <th>Danh mục nào</th>
                        <th>Ngày cập nhật</th>
                        <th style="width: 60px;"></th>
                        <th style="width: 60px;"></th>
                    </tr>
                    </thead>
                    <tbody>
<?php
//lấy danh sách danh mục từ database
$sql = 'select product.id, product.title, product.price, product.thumbnail, product.updated_at,
    category.name as category_name from product 
    left join category on product.id_category = category.id';
$productList = executeResult ($sql);
$index = 1;
foreach ($productList as $item){
    echo '<tr>
        <td>'.$index++.'</td>
        <td><img src="'.$item['thumbnail'].'" style="max-width: 100px"></td>
        <td>'.$item['title'].'</td>
        <td>'.$item['price'].'</td>
        <td>'.$item['category_name'].'</td>
        <td>'.$item['updated_at'].'</td>
        <td>
            <a href="Add.php?id='.$item['id'].'"><button class="btn btn-warning" >Sửa</button></a>
        </td>
        <td><button class="btn btn-danger" onclick="deleteProduct('.$item['id'].')">Xoá</button></td>
    </tr>';
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function deleteProduct(id) {
        // console.log(id);
        //chỉ dùng post khi xoá
        var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không');
        if (!option){
            return;
        }
        $.post('ajaxProduct.php', {
            'id': id,
            'action': 'delete' //ko cần dùng cũng đc nhưng nên tạo action để sau này tái sử dụng code
        }, function(data) {
            location.reload();
        })
    }
</script>
</body>
</html>

