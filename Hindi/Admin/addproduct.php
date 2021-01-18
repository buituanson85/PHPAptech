<?php
    global $conn;
    define('TITLE', 'Add New Product');
    define('PAGE', 'assets');
    include('includes/header.php');
    include('../dbConnection/dbConnection.php');
    session_start();
     if(isset($_SESSION['is_adminlogin'])){
      $aEmail = $_SESSION['aEmail'];
     } else {
      echo "<script> location.href='login.php'; </script>";
     }
    if(isset($_REQUEST['psubmit'])){
         // Checking for Empty Fields
         if(($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")){
          // msg displayed if required field missing
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Điền vào tất cả các trường </div>';
         } else {
              // Assigning User Values to Variable
              $pname = $_REQUEST['pname'];
              $pdop = $_REQUEST['pdop'];
              $pava = $_REQUEST['pava'];
              $ptotal = $_REQUEST['ptotal'];
              $poriginalcost = $_REQUEST['poriginalcost'];
              $psellingcost = $_REQUEST['psellingcost'];
               $sql = "INSERT INTO assets_tb (pname, pdop, pava, ptotal, poriginalcost, psellingcost) VALUES ('$pname', '$pdop','$pava', '$ptotal', '$poriginalcost', '$psellingcost')";
               if($conn->query($sql) == TRUE){
                    // below msg display on form submit success
                    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Thêm thành công </div>';
                   } else {
                    // below msg display on form submit failed
                    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Không thể thêm </div>';
               }
         }
     }
?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Thêm sản phẩm mới</h3>
  <form action="" method="POST">
    <div class="form-group">
      <i class="fas fa-product-hunt"></i>
      <label for="pname">Tên sản phẩm</label>
      <input type="text" class="form-control" id="pname" name="pname">
    </div>
    <div class="form-group">
        <i class="fas fa-birthday-cake"></i>
      <label for="pdop">Ngày mua</label>
      <input type="date" class="form-control" id="pdop" name="pdop">
    </div>
    <div class="form-group">
      <i class="fas fa-warehouse"></i>
      <label for="pava">Tồn kho</label>
      <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <i class="fas fa-sort-amount-up-alt"></i>
      <label for="ptotal">Số lượng cần mua</label>
      <input type="text" class="form-control" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <i class="fas fa-money-bill-alt"></i>
      <label for="poriginalcost">Giá gốc</label>
      <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <i class="fas fa-money-bill-alt"></i>
      <label for="psellingcost">Giá bán</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Gửi</button>
      <a href="assets.php" class="btn btn-secondary">Đóng</a>
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
<?php include('includes/footer.php'); ?>