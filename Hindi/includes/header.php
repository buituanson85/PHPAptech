<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo TITLE ?></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    Bootstrap 4 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--    Fonta awesome -->
    <link rel="stylesheet" href="../libs/fontawesome/css/all.min.css">
    <!--    Custom Css-->
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
<!-- Top Navbar -->
<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sn-3 col-md-2 mr-0" href="dashboard.php">OSMS</a>
</nav>
<!--  Start COntainer -->
<div class="container-fluid" style="margin-top: 40px;">
    <div class="row">   <!-- Start Row -->
        <nav class="col-sm-2 bg-light sidebar py-5">  <!-- Start side Bar 1st Column -->
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php if (PAGE == 'dashboard'){ echo 'active';}?>" href="dashboard.php" ><i class="fas fa-tachometer-alt"></i> Dashboard </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (PAGE == 'word'){ echo 'active';}?>" href="word.php"><i class="fab fa-accessible-icon"></i> Work Order </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (PAGE == 'request'){ echo 'active';}?>" href="request.php"><i class="fas fa-align-center"></i> Requests </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (PAGE == 'assets'){ echo 'active';}?>" href="assets.php"><i class="fas fa-database"></i> Assets </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (PAGE == 'technician'){ echo 'active';}?>" href="technician.php"><i class="fas fa-teamspeak"></i> Technician </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (PAGE == 'requester'){ echo 'active';}?>" href="requester.php"><i class="fas fa-user"></i> Requester </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (PAGE == 'sellreport'){ echo 'active';}?>" href="soldproductreport.php"><i class="fas fa-table"></i> Sell Report </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (PAGE == 'wordreport'){ echo 'active';}?>" href="workreport.php"><i class="fas fa-table"></i> Work Report </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (PAGE == 'changepass'){ echo 'active';}?>" href="changepass.php"><i class="fas fa-key"></i> Change password </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="dashboard.php"><i class="fas fa-sign-out-alt"></i> Logout </a>
                    </li>
                </ul>
            </div>
        </nav><!-- End side bar 1colum-->
