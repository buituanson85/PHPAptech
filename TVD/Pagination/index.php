<?php
    require_once('DBConnection.php');
?>
<!doctype html>
<html>
<head>
    <title>PHP Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
<?php
    $sql = 'select count(id) as number from sanpham';
    $result = executeResult ($sql);
//    var_dump ($result);
    $number = 0;
    if ($result != null && count ($result) > 0){
        $number = $result[0]['number'];
    }
    $pages = ceil ($number / 8);

    $current_page = 1;
    $index = 0;
    if (isset($_GET['page'])){
        $current_page = $_GET['page'];

    }
    $index = ($current_page - 1)*8;
    $sql = 'select * from sanpham limit '.$index.', 8';
    $result = executeResult($sql);
    foreach ($result as $sanpham){
        echo '<div class="col-md-3">
                <img src="'.$sanpham['thumbnail'].'" height="300px" width="100%"/>
                <p>'.$sanpham['title'].'</p>
                <p>'.$sanpham['price'].' <del>'.$sanpham['discount'].'</del></p>
            </div>';
    }
?>
        </div>
        <div class="row">
            <ul class="pagination">
<?php
    for($i = 0; $i < $pages; $i++){
        echo '<li><a href="?page='.($i + 1).'">'.($i + 1).'</a></li>';
    }
?>
            </ul>
        </div>
    </div>
</body>
</html>