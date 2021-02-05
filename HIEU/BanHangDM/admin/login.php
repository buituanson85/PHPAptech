<?php
    include '../classes/adminlogin.php';
?>
<?php
    $class = new Adminlogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $adminUser = $_POST['adminUser'];
        $adminPass = md5 ($_POST['adminPass']);
        $login_check = $class-> login_admin($adminUser, $adminPass);
    }
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Đăng nhập Admin</h1>
            <span style="color: red"><?php
                if (isset($login_check)){
                    echo $login_check;
                }
                ?>
            </span>
			<div>
				<input type="text" placeholder="Tên đăng nhập"  name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Mật khẩu" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">FPT Aptech</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>