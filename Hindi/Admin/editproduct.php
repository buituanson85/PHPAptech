<?php
    global $conn;
    define('TITLE', 'Update Product');
    define('PAGE', 'assets');
    include('includes/header.php');
    include('../dbConnection/dbConnection.php');
    session_start();
     if(isset($_SESSION['is_adminlogin'])){
      $aEmail = $_SESSION['aEmail'];
     } else {
      echo "<script> location.href='login.php'; </script>";
     }
     // update
     if(isset($_REQUEST['pupdate'])){
      // Checking for Empty Fields
      if(($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")){
       // msg displayed if required field missing
       $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Điền vào tất cả các trường </div>';
      } else {
        // Assigning User Values to Variable
        $pid = $_REQUEST['pid'];
        $pname = $_REQUEST['pname'];
        $pdop = $_REQUEST['pdop'];
        $pava = $_REQUEST['pava'];
        $ptotal = $_REQUEST['ptotal'];
        $poriginalcost = $_REQUEST['poriginalcost'];
        $psellingcost = $_REQUEST['psellingcost'];
      $sql = "UPDATE assets_tb SET pname = '$pname', pdop = '$pdop', pava = '$pava', ptotal = '$ptotal', poriginalcost = '$poriginalcost', psellingcost = '$psellingcost' WHERE pid = '$pid'";
        if($conn->query($sql) == TRUE){
         // below msg display on form submit success
         $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Cập nhật thành công </div>';
        } else {
         // below msg display on form submit failed
         $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Cập nhật không thành công </div>';
        }
      }
      }
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Cập nhật chi tiết sản phẩm</h3>
  <?php
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM assets_tb WHERE pid = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }
 ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="pid">ID sản phẩm</label>
      <input type="text" class="form-control" id="pid" name="pid" value="<?php if(isset($row['pid'])) {echo $row['pid']; }?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="pname">Tên sản phẩm</label>
      <input type="text" class="form-control" id="pname" name="pname" value="<?php if(isset($row['pname'])) {echo $row['pname']; }?>">
    </div>
    <div class="form-group">
      <label for="pdop">Ngày</label>
      <input type="date" class="form-control" id="pdop" name="pdop" value="<?php if(isset($row['pdop'])) {echo $row['pdop']; }?>">
    </div>
    <div class="form-group">
      <label for="pava">Tồn kho</label>
      <input type="text" class="form-control" id="pava" name="pava" value="<?php if(isset($row['pava'])) {echo $row['pava']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="ptotal">Tổng</label>
      <input type="text" class="form-control" id="ptotal" name="ptotal" value="<?php if(isset($row['ptotal'])) {echo $row['ptotal']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="poriginalcost">Giá gốc</label>
      <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" value="<?php if(isset($row['poriginalcost'])) {echo $row['poriginalcost']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="psellingcost">Giá bán</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?php if(isset($row['psellingcost'])) {echo $row['psellingcost']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="pupdate" name="pupdate">Cập nhật</button>
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
<?php
include('includes/footer.php'); 
?>