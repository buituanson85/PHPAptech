<?php
$hoten = '';
if (isset($_GET['ten'])){
    $hoten = $_GET['ten'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    Css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--    Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--    Js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--    Popper-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>
    <center><h2 style="color: red">Chúc mừng <span style="color: darkblue"><?=$hoten?></span> đã đăng ký thành công </h2></center>
</body>
</html>
