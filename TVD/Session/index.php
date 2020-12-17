<?php
 session_start ();//yc phia sever xay dung phien lam viec phia sever phai dc dat dau tien


require_once ("register.php");
//    var_dump ($_COOKIE);
//setcookie ("name", "", 0, "/"); //xoá cookie
//setcookie ("userName", "", 0, "/");
//setcookie ("pwd", "", 0, "/");
//setcookie ("email", "", 0, "/");
//setcookie ("phone", "", 0, "/");
register ();
?>
<!doctype html>
<html>
<head>
    <title>PHP Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <form method="POST" action="">
        <div class="form-group">
            <label for="userName">UserName:</label>
            <input type="text" class="form-control" placeholder="Enter EserName" id="userName" name="userName">
        </div>
        <div class="form-group">
            <label for="name">Full name:</label>
            <input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="phone">Phone number:</label>
            <input type="number" class="form-control" placeholder="Enter phone number" id="phone" name="phone">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>