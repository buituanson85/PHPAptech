<?php
    global $conn;
    define('TITLE', 'Product Report');
    define('PAGE', 'sellreport');
    include('includes/header.php');
    include('../dbConnection/dbConnection.php');
    session_start();
    if(isset($_SESSION['is_adminlogin'])){
        $aEmail = $_SESSION['aEmail'];
    } else {
        echo "<script> location.href='login.php'; </script>";
    }
?>
    <div class="col-sm-9 col-md-10 mt-5 text-center">
        <form action="" method="POST" class="d-print-none">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="date" class="form-control" id="startdate" name="startdate">
                </div> <span> to </span>
                <div class="form-group col-md-2">
                    <input type="date" class="form-control" id="enddate" name="enddate">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Tìm kiếm">
                </div>
            </div>
        </form>
        <?php
        if(isset($_REQUEST['searchsubmit'])){
            $startdate = $_REQUEST['startdate'];
            $enddate = $_REQUEST['enddate'];
            // $sql = "SELECT * FROM customer_tb WHERE cpdate BETWEEN '2018-10-11' AND '2018-10-13'";
            $sql = "SELECT * FROM customer_tb WHERE cpdate BETWEEN '$startdate' AND '$enddate'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                echo '
  <p class=" bg-dark text-white p-2 mt-4">Chi tiết</p>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID Khách hàng</th>
        <th scope="col">Tên Khách hàng</th>
        <th scope="col">ĐỊa chỉ</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Giá bán</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Ngày</th>
      </tr>
    </thead>
    <tbody>';
                while($row = $result->fetch_assoc()){
                    echo '<tr>
        <th scope="row">'.$row["custid"].'</th>
        <td>'.$row["custname"].'</td>
        <td>'.$row["custadd"].'</td>
        <td>'.$row["cpname"].'</td>
        <td>'.$row["cpquantity"].'</td>
        <td>'.$row["cpeach"].'</td>
        <td>'.$row["cptotal"].'</td>
        <td>'.$row["cpdate"].'</td>
      </tr>';
                }
                echo '<tr>
    <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="In" onClick="window.print()"></form></td>
  </tr></tbody>
  </table>';
            } else {
                echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> Không có dữ liệu được tìm thấy ! </div>";
            }
        }
        ?>
    </div>
    </div>
    </div>

<?php include('includes/footer.php'); ?>