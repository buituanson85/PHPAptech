<?php
    global $conn;
    define('TITLE', 'Submit Request');
    define('PAGE', 'SubmitRequest');
    include('includes/header.php');
    include('../dbConnection/dbConnection.php');
    session_start();
    if($_SESSION['is_login']){
        $rEmail = $_SESSION['rEmail'];
    } else {
        echo "<script> location.href='RequesterLogin.php'; </script>";
    }
    if(isset($_REQUEST['submitrequest'])){
        // Checking for Empty Fields
        if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdate'] == "")){
            // msg displayed if required field missing
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Điền vào tất cả các trường </div>';
        } else {
            // Assigning User Values to Variable
            $rinfo = $_REQUEST['requestinfo'];
            $rdesc = $_REQUEST['requestdesc'];
            $rname = $_REQUEST['requestername'];
            $radd1 = $_REQUEST['requesteradd1'];
            $radd2 = $_REQUEST['requesteradd2'];
            $rcity = $_REQUEST['requestercity'];
            $rstate = $_REQUEST['requesterstate'];
            $rzip = $_REQUEST['requesterzip'];
            $remail = $_REQUEST['requesteremail'];
            $rmobile = $_REQUEST['requestermobile'];
            $rdate = $_REQUEST['requestdate'];
            $sql = "INSERT INTO submitrequest_tb(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date) VALUES ('$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
            if($conn->query($sql) == TRUE){
                // below msg display on form submit success
                $genid = mysqli_insert_id($conn);
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Yêu cầu được gửi thành công của bạn' . $genid .' </div>';
                session_start();
                $_SESSION['myid'] = $genid;
                echo "<script> location.href='submitrequestsuccess.php'; </script>";
                 include('submitrequestsuccess.php');
            } else {
                // below msg display on form submit failed
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Không thể gửi yêu cầu của bạn </div>';
            }
        }
    }
?>
    <div class="col-sm-9 col-md-10 mt-5">
        <form class="mx-5" action="" method="POST">
            <div class="form-group">
                <i class="fa fa-question-circle"></i>
                <label for="inputRequestInfo">Yêu cầu thông tin</label>
                <input type="text" class="form-control" id="inputRequestInfo" placeholder="Thông tin" name="requestinfo">
            </div>
            <div class="form-group">
                <i class="fas fa-audio-description"></i>
                <label for="inputRequestDescription">Mô tả</label>
                <input type="text" class="form-control" id="inputRequestDescription" placeholder="Nhập mô tả" name="requestdesc">
            </div>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <label for="inputName">Họ Và Tên</label>
                <input type="text" class="form-control" id="inputName" placeholder="Bùi Tuấn Sơn" name="requestername">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <i class="fas fa-map-marked"></i>
                    <label for="inputAddress">Địa chỉ thứ nhất</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Xã Đàn" name="requesteradd1">
                </div>
                <div class="form-group col-md-6">
                    <i class="fas fa-map-marked"></i>
                    <label for="inputAddress2">Địa chỉ Thứ 2</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Đống Đa" name="requesteradd2">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <i class="fas fa-address-card-o"></i>
                    <label for="inputCity">Thành Phố</label>
                    <input type="text" class="form-control" id="inputCity" name="requestercity">
                </div>
                <div class="form-group col-md-4">
                    <i class="fa fa-address-card-o"></i>
                    <label for="inputState">Quận</label>
                    <input type="text" class="form-control" id="inputState" name="requesterstate">
                </div>
                <div class="form-group col-md-2">
                    <i class="fas fa-file-zip-o"></i>
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <i class="fas fa-envelope"></i>
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="requesteremail">
                </div>
                <div class="form-group col-md-2">
                    <i class="fas fa-phone"></i>
                    <label for="inputMobile">Số điện thoại</label>
                    <input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)">
                </div>
                <div class="form-group col-md-2">
                    <i class="fas fa-birthday-cake"></i>
                    <label for="inputDate">Ngày Tháng Năm sinh</label>
                    <input type="date" class="form-control" id="inputDate" name="requestdate">
                </div>
            </div>

            <button type="submit" class="btn btn-danger" name="submitrequest">Gửi</button>
            <button type="reset" class="btn btn-secondary">Làm lại</button>
        </form>
        <!-- below msg display if required fill missing or form submitted success or failed -->
        <?php if(isset($msg)) {echo $msg; } ?>
    </div>
    </div>
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
$conn->close();
?>