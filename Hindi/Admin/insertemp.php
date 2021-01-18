<?php
    global $conn;
    define('TITLE', 'Add New Technician');
    define('PAGE', 'technician');
    include('includes/header.php');
    include('../dbConnection/dbConnection.php');
    session_start();
     if(isset($_SESSION['is_adminlogin'])){
      $aEmail = $_SESSION['aEmail'];
     } else {
      echo "<script> location.href='login.php'; </script>";
     }
    if(isset($_REQUEST['empsubmit'])){
     // Checking for Empty Fields
         if(($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")){
          // msg displayed if required field missing
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Điền vào tất cả các trường </div>';
         } else {
           // Assigning User Values to Variable
           $eName = $_REQUEST['empName'];
           $eCity = $_REQUEST['empCity'];
           $eMobile = $_REQUEST['empMobile'];
           $eEmail = $_REQUEST['empEmail'];
           $sql = "INSERT INTO technician_tb (empName, empCity, empMobile, empEmail) VALUES ('$eName', '$eCity','$eMobile', '$eEmail')";
           if($conn->query($sql) == TRUE){
            // below msg display on form submit success
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Thêm thành công </div>';
               } else {
                // below msg display on form submit failed
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Thêm không thành công </div>';
               }
         }
     }
?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Thêm kỹ thuật viên mới</h3>
  <form action="" method="POST">
    <div class="form-group">
      <label for="empName">Họ Và Tên</label>
      <input type="text" class="form-control" id="empName" name="empName">
    </div>
    <div class="form-group">
      <label for="empCity">Thành Phố</label>
      <input type="text" class="form-control" id="empCity" name="empCity">
    </div>
    <div class="form-group">
      <label for="empMobile">Số điện thoại</label>
      <input type="text" class="form-control" id="empMobile" name="empMobile" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="empEmail">Email</label>
      <input type="email" class="form-control" id="empEmail" name="empEmail">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="empsubmit" name="empsubmit">Gửi</button>
      <a href="technician.php" class="btn btn-secondary">Đóng</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php'); 
?>