<?php
require_once ('../DBConnection/dbhelper.php');
?>
<!doctype html>
<html lang="en">
<head>
    <title>Home page</title>
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
    <div class="container" style="margin-top: 30px">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <center><h2>Quản lý danh mục</h2></center>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="50px">STT</th>
                        <th>Tên danh mục</th>
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
                            <td><a href="category.php?id='.$item['id'].'">'.$item['name'].'</a></td>
                        </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
