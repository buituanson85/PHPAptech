<?php
    global $conn;
    define('TITLE', 'Work Order');
    define('PAGE', 'work');
    include('includes/header.php');
    include('../dbConnection/dbConnection.php');
    session_start();
    if(isset($_SESSION['is_adminlogin'])){
        $aEmail = $_SESSION['aEmail'];
    } else {
        echo "<script> location.href='login.php'; </script>";
    }
?>

<div class="col-sm-6 mt-5  mx-3">
    <h3 class="text-center">Assigned Work Details</h3>
    <?php
    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td>ID yêu cầu</td>
            <td>
                <?php if(isset($row['request_id'])) {echo $row['request_id']; }?>
            </td>
        </tr>
        <tr>
            <td>Thông tin yêu cầu</td>
            <td>
                <?php if(isset($row['request_info'])) {echo $row['request_info']; }?>
            </td>
        </tr>
        <tr>
            <td>Yêu cầu mô tả</td>
            <td>
                <?php if(isset($row['request_desc'])) {echo $row['request_desc']; }?>
            </td>
        </tr>
        <tr>
            <td>Họ Và Tên</td>
            <td>
                <?php if(isset($row['requester_name'])) {echo $row['requester_name']; }?>
            </td>
        </tr>
        <tr>
            <td>Địa chỉ 1</td>
            <td>
                <?php if(isset($row['requester_add1'])) {echo $row['requester_add1']; }?>
            </td>
        </tr>
        <tr>
            <td>Địa chỉ 2</td>
            <td>
                <?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; }?>
            </td>
        </tr>
        <tr>
            <td>Thành phố</td>
            <td>
                <?php if(isset($row['requester_city'])) {echo $row['requester_city']; }?>
            </td>
        </tr>
        <tr>
            <td>Quận</td>
            <td>
                <?php if(isset($row['requester_state'])) {echo $row['requester_state']; }?>
            </td>
        </tr>
        <tr>
            <td>Mã Pin</td>
            <td>
                <?php if(isset($row['requester_zip'])) {echo $row['requester_zip']; }?>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <?php if(isset($row['requester_email'])) {echo $row['requester_email']; }?>
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td>
                <?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; }?>
            </td>
        </tr>
        <tr>
            <td>Ngày đăng ký</td>
            <td>
                <?php if(isset($row['assign_date'])) {echo $row['assign_date']; }?>
            </td>
        </tr>
        <tr>
            <td>Tên kỹ thuật viên</td>
            <td>
                <?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; }?>
            </td>
        </tr>
        <tr>
            <td>Ký hiệu khách hàng</td>
            <td></td>
        </tr>
        <tr>
            <td>Kỹ thuật viên ký</td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <div class="text-center">
        <form class='d-print-none d-inline mr-3'><input class='btn btn-danger' type='submit' value='In' onClick='window.print()'></form>
        <form class='d-print-none d-inline' action="work.php"><input class='btn btn-secondary' type='submit' value='Đóng'></form>
    </div>
</div>

<?php
include('includes/footer.php');
?>
