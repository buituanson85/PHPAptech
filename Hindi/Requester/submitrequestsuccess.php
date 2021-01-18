<?php
    global $conn;
    define('TITLE', 'Success');
    include('includes/header.php');
    include('../dbConnection/dbConnection.php');
    session_start();
    if($_SESSION['is_login']){
        $rEmail = $_SESSION['rEmail'];
    } else {
        echo "<script> location.href='RequesterLogin.php'; </script>";
    }
    $sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_SESSION['myid']}";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        echo "<div class='ml-5 mt-5'>
     <table class='table'>
      <tbody>
       <tr>
         <th>ID yêu cầu</th>
         <td>".$row['request_id']."</td>
       </tr>
       <tr>
         <th>Họ Và Tên</th>
         <td>".$row['requester_name']."</td>
       </tr>
       <tr>
       <th>Email ID</th>
       <td>".$row['requester_email']."</td>
      </tr>
       <tr>
        <th>Yêu cầu thông tin</th>
        <td>".$row['request_info']."</td>
       </tr>
       <tr>
        <th>Yêu cầu mô tả</th>
        <td>".$row['request_desc']."</td>
       </tr>
    
       <tr>
        <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='In' onClick='window.print()'></form></td>
      </tr>
      </tbody>
     </table> </div>
     ";


    } else {
        echo "Failed";
    }
?>


<?php
    include('includes/footer.php');
    $conn->close();
?>