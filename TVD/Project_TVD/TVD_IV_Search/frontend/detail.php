<?php
require_once ('../DBConnection/dbhelper.php');
$id = '';
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = 'select * from product where id = '.$id;
    $product = executeSingleResult ($sql);
    if ($product != null){
        $title = $product['title'];
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title><?=$title?></title>
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
                <h2 class="text-center"> <?=$title?> </h2>
            </div>
            <div class="panel-body" style="padding-top: 30px">
                <div class="row">
                    <div class="col-lg-12">
                        <?=$product['content']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


