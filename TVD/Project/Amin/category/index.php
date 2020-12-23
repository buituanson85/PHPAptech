<?php
require_once ('../../DBConnection/dbhelper.php');
?>
<!doctype html>
<html lang="en">
<head>
    <title>Quản lý danh mục</title>
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
            <a class="nav-link active" href="#">Quản lý danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../product/">Quản lý sản phẩm</a>
        </li>
        </li>
    </ul>
    <div class="container" style="margin-top: 30px">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <center><h2>Quản lý danh mục</h2></center>
            </div>
            <div class="panel-body">
                <a href="Add.php"><button class="btn btn-success" style="margin-bottom: 15px">Thêm danh mục</button></a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th>Tên danh mục</th>
                            <th style="width: 60px;"></th>
                            <th style="width: 60px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //lấy danh sách danh mục từ database
                    $sql = 'select * from category';
                    $categoryList = executeResult ($sql);
                    $index = 1;
                    foreach ($categoryList as $item){
                        echo '<tr>
                            <td>'.$index++.'</td>
                            <td>'.$item['name'].'</td>
                            <td>
                                <a href="Add.php?id='.$item['id'].'"><button class="btn btn-warning" >Sửa</button></a>
                            </td>
                            <td><button class="btn btn-danger" onclick="deleteCategory('.$item['id'].')">Xoá</button></td>
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
    function deleteCategory(id) {
        // console.log(id);
        //chỉ dùng post khi xoá
        var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không');
        if (!option){
            return;
        }
        $.post('ajaxCategory.php', {
            'id': id,
            'action': 'delete' //ko cần dùng cũng đc nhưng nên tạo action để sau này tái sử dụng code
        }, function(data) {
            location.reload();
        })
    }
</script>
</body>
</html>
