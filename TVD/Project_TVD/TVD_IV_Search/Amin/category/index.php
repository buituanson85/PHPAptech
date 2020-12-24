<?php
require_once ('../../DBConnection/dbhelper.php');
require_once ('../../common/utility.php');
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
                <div class="row">
                    <div class="col-lg-6">
                        <a href="Add.php"><button class="btn btn-success" style="margin-bottom: 15px">Thêm danh mục</button></a>
                    </div>
                    <div class="col-lg-6">
                        <form method="get">
                            <div class="form-group" style="width: 200px; float: right">
                                <input type="text" class="form-control" placeholder="Searching...." id="search" name="search">
                            </div>
                        </form>
                    </div>
                </div>
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
                    //tìm kiếm
                    $search = '';
                    if (isset($_GET['search'])){
                        $search = $_GET['search'];
                    }
                    $additional = '';
                    if (!empty($search)){
                        $additional = 'and name like "%'.$search.'%"';
                    }
                    //phân trang
                    $limit = 5;
                    $page =1;
                    if ($page <= 0){
                        $page = 1;
                    }
                    if (isset($_GET['page'])){
                        $page = $_GET['page'];
                    }
                    $firstIndex = ($page - 1) * $limit;
                    //trang cần lấy sản phẩm, só phần tử trên một trang: $limit
                    //lấy danh sách danh mục từ database
//                    $sql = 'select * from category';
                    $sql = 'select * from category where 1 '.$additional.' limit '.$firstIndex.','.$limit;
                    $categoryList = executeResult ($sql);
                    //đếm số trang
                    $sql =  'select count(id) as total from category where 1 '.$additional;
                    $countResult = executeSingleResult ($sql);
                    if ($countResult != null){
                        $count = $countResult['total'];
                        $number = ceil ($count/$limit);
                    }
                    foreach ($categoryList as $item){
                        echo '<tr>
                            <td>'.++$firstIndex.'</td>
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
<!--                Bài toán phân trang-->


<?php //kiểm tra tạo điều kiện hiển thị phân trang
    if ($number > 1){
?>
                <ul class="pagination">
<?php
    if ($page > 1){
        echo '<li class="page-item"><a class="page-link" href="?page='.($page - 1).'&search='.$search.'">Previous</a></li>';
    }
?>
<?php
    $avaiablePage = [1, $page - 1, $page, $page + 1, $number];
    $isFirst = $isLast = false;
    for ($i = 0; $i < $number; $i++){
        if (!in_array ($i + 1, $avaiablePage)){//nếu page i+1 ko nằm trong $avaiablePage thì sẽ ko hiện ra
            if (!$isFirst && $page > 3){
                echo '<li class="page-item"><a class="page-link"
                href="?page='.($page - 2).'&search='.$search.'" >...</a></li>';
                $isFirst = true;
            }
            if (!$isLast && $i > $page){
                echo '<li class="page-item"><a class="page-link"
                href="?page='.($page + 2).'&search='.$search.'" >...</a></li>';
                $isLast = true;
            }
            continue;
        }

        if ($page == ($i +1)){
            echo '<li class="page-item active"><a class="page-link"
                href="#" >'.($i + 1).'</a></li>';
        }else{
            echo '<li class="page-item"><a class="page-link"
                href="?page='.($i + 1).'&search='.$search.'">'.($i + 1).'</a></li>';
        }
    }
?>

<?php
    if ($page < $number){
        echo '<li class="page-item"><a class="page-link" href="?page='.($page + 1).'&search='.$search.'">Next</a></li>';
    }
?>
                </ul>
<?php
    }
?>
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
