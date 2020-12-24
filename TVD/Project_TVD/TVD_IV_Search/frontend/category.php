<?php
require_once ('../DBConnection/dbhelper.php');
$id = '';
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = 'select * from category where id = '.$id;
    $category = executeSingleResult ($sql);
    if ($category != null){
        $name = $category['name'];
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Category page - <?=$name?></title>
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
                <h2 class="text-center">Vùng <?=$name?> </h2>
            </div>
            <div class="panel-body" style="padding-top: 30px">
                <div class="row">
<?php
    $sql = 'select product.id, product.title, product.price, product.thumbnail, product.updated_at,
        category.name as category_name from product 
        left join category on product.id_category = category.id
        where product.id_category = '.$id;
    $productList = executeResult ($sql);
    foreach ($productList as $item){
        echo '<div class="col-lg-3">
                        <a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%; height: 200px"></a>
                        <a href="detail.php?id='.$item['id'].'"><p>'.$item['title'].'</p></a>
                        <p style="color: red; font-weight: bold">'.$item['price'].'</p>
                    </div>';
    }
?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

