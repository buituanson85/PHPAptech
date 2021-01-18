<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/osms.css">

    <title>STNM</title>
</head>

<body>
<!-- Start Navigation -->
<nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
    <a href="index.php" class="navbar-brand">STNM</a>
    <span class="navbar-text">Hạnh phúc của khách hàng là mục tiêu của chúng tôi</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
        <ul class="navbar-nav pl-5 custom-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">Trang chủ</a></li>
            <li class="nav-item"><a href="#Services" class="nav-link">Dịch vụ</a></li>
            <li class="nav-item"><a href="#registration" class="nav-link">Đăng ký</a></li>
            <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Đăng nhập</a></li>
            <li class="nav-item"><a href="#Contact" class="nav-link">Liên hệ</a></li>
        </ul>
    </div>
</nav>
<!-- End Navigation -->
<!-- Start Header Jumbor-->
<header class="jumbotron back-image" style="background-image: url(images/Banner1.jpeg)">
<div class="myclass mainHeading">
    <h1 class="text-uppercase text-danger font-weight-bold">Chào mừng tới STNM</h1>
    <p class="font-italic">Hạnh phúc của khách hàng là mục tiêu của chúng tôi</p>
    <a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Đăng nhập</a>
    <a href="#registration" class="btn btn-danger mr-4">Đăng ký</a>
</div>
</header>
<!-- end Header Jumbor-->
<!-- Start introduction section container-->
<div class="container">
    <div class="jumbotron">
        <h3 class="text-center">Dịch vụ STNM</h3>
        <p>
            Dịch vụ STNM là chuỗi dịch vụ Điện tử và Điện đa thương hiệu hàng đầu của Việt Nam
            hội thảo cung cấp
            nhiều loại dịch vụ. Chúng tôi tập trung vào việc nâng cao trải nghiệm sử dụng của bạn bằng cách cung cấp
            Điện tử
            Dịch vụ bảo trì thiết bị. Sứ mệnh duy nhất của chúng tôi là “Cung cấp dịch vụ chăm sóc Thiết bị Điện tử
            dịch vụ cho
            giữ cho các thiết bị vừa vặn và khỏe mạnh và khách hàng luôn vui vẻ và mỉm cười ”.

            Với các trung tâm dịch vụ Thiết bị Điện tử được trang bị tốt và các thợ máy được đào tạo đầy đủ, chúng tôi
            cung cấp chất lượng
            dịch vụ với các gói tuyệt vời được thiết kế để mang lại cho bạn những khoản tiết kiệm lớn.

            Các xưởng hiện đại của chúng tôi có vị trí thuận tiện tại nhiều thành phố trên cả nước. Bây giờ bạn
            có thể sách
            dịch vụ của bạn trực tuyến bằng cách thực hiện Đăng ký.
        </p>
    </div>
</div>
<!-- End introduction section- container-->

<!-- start services section -->
<div class="container text-center" id="Services">
    <h2>Dịch vụ của chúng tôi</h2>
    <div class="row mt-4">
        <div class="col-sm-4 mb-4">
            <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
            <h4 class="mt-4">Thiết bị điện tử</h4>
        </div>
        <div class="col-sm-4 mb-4">
            <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
            <h4 class="mt-4">Bảo dưỡng phòng ngừa</h4>
        </div>
        <div class="col-sm-4 mb-4">
            <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
            <h4 class="mt-4">Sửa chữa lỗi</h4>
        </div>
    </div>
</div>
<!-- end services section -->

<!-- start registration from container -->
<?php include ('UserRegistration.php'); ?>
<!-- end registration from container -->

<!-- Start happy customer -->
<div class="jumbotron bg-danger">
    <div class="container">
        <h2 class="text-center text-white">Phản hồi từ khách hàng</h2>
        <div class="row mt-5">
            <!-- Start Customer 1st Column-->
            <div class="col-lg-3 col-sm-6">
                <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                        <img src="images/avtar1.jpeg" class="img-fluid" alt="avt1" style="border-radius: 100px;">
                        <h4 class="card-title">Bùi Tuấn Sơn</h4>
                        <p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                            ducimus voluptas
                            nesciunt debitis numquam.</p>
                    </div>
                </div>
            </div>
            <!-- End Customer 1st Column-->

            <!-- Start Customer 2nd Column-->
            <div class="col-lg-3 col-sm-6">
                <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                        <img src="images/avtar2.jpeg" class="img-fluid" style="border-radius: 100px;">
                        <h4 class="card-title">Hariwon</h4>
                        <p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                            ducimus voluptas
                            nesciunt debitis numquam.</p>
                    </div>
                </div>
            </div>
            <!-- End Customer 2nd Column-->

            <!-- Start Customer 3rd Column-->
            <div class="col-lg-3 col-sm-6">
                <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                        <img src="images/avtar3.jpeg" class="img-fluid" style="border-radius: 100px;" alt="avt3">
                        <h4 class="card-title">Nguyễn Quốc Việt</h4>
                        <p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                            ducimus voluptas
                            nesciunt debitis numquam.</p>
                    </div>
                </div>
            </div>
            <!-- End Customer 3rd Column-->

            <!-- Start Customer 4th Column-->
            <div class="col-lg-3 col-sm-6">
                <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                        <img src="images/avtar4.jpeg" class="img-fluid" style="border-radius: 100px;">
                        <h4 class="card-title">Hồ Ngọc Hà</h4>
                        <p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                            ducimus voluptas
                            nesciunt debitis numquam.</p>
                    </div>
                </div>
            </div>
            <!-- End Customer 4th Column-->
        </div>
    </div>
</div>
<!-- end happy customer -->

<!-- start contuct us -->
<div class="container" id="Contact">
    <h2 class="text-center mb-4">Liên hệ với chúng tôi</h2>
    <div class="row">
        <!--        Start 1st colum-->
        <?php include ('contactform.php'); ?>
        <!--        end 1st colum-->
        <!--        Start 2st colum-->
        <div class="col-md-4 text-center">
            <strong>Trụ sở chính:</strong><br>
            Số 8 Tôn Thất Thuyết,<br>
            Xuân thuỷ,Cầu giấy,Hà Nội<br>
            Bùi Tuấn Sơn  - 434567<br>
            Phone: 0906240410<br>
            <a href="#" target="_blank">www.fptaptech.edu.vn</a><br>
            <br> <br>
            <strong>Chi nhánh:</strong><br>
            Số 143 Xã Đàn,<br>
            Nam Đồng,Đống Đa,Hà Nội<br>
            Nguyễn Thị Thành  - 455567<br>
            Phone: 0964648837<br>
            <a href="#" target="_blank">www.fptaptech.edu.vn</a><br>
        </div>
        <!--        end 2st colum-->
    </div>
</div>
<!-- end contuct us -->

<!-- Start Footer -->
<footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
    <div class="container">
        <!-- Start Footer Container -->
        <div class="row py-3">
            <!-- Start Footer Row -->
            <div class="col-md-6">
                <!-- Start Footer 1st Column -->
                <span class="pr-2">Theo dõi: </span>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
            </div> <!-- End Footer 1st Column -->

            <div class="col-md-6 text-right">
                <!-- Start Footer 2nd Column -->
                <small> Thiết kế bởi &copy; 2021.
                </small>
                <small class="ml-2"><a href="Admin/login.php">Đăng nhập Admin</a></small>
            </div>
            <!-- End Footer 2nd Column -->
        </div>
        <!-- End Footer Row -->
    </div>
    <!-- End Footer Container -->
</footer>
<!-- end Footer -->
<!-- Boostrap JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>
