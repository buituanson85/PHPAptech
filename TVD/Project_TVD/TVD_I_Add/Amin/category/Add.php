<?php
require_once ('../../DBConnection/dbhelper.php');

$name = '';
if (!empty($_POST)){
    if (isset($_POST['name'])){
        $name = $_POST['name'];
        $name = str_replace ('"', '\\"', $name);
    }
    $created_at = $updated_at = date ('Y-m-d H:s:i');
    $sql = 'insert into category( name, created_at, updated_at)
            values ( "'.$name.'", "'.$created_at.'", "'.$updated_at.'")';
    execute ($sql);
    header ('Location: index.php');
    die();

}

?>
<!doctype html>
<html lang="en">
<head>
    <title>Thêm/Sửa danh mục sản phẩm</title>
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
            <a class="nav-link" href="../product/">Quản lý sản phẩm</a>
        </li>
        </li>
    </ul>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="padding: 30px 0">
                <h2 style="text-align: center">Thêm/Sửa danh mục sản phẩm</h2>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label for="name">Tên danh mục:</label>
                        <input required="true" type="text" class="form-control" id="name" name="name">
                    </div>
                    <button class="btn btn-success">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>




