<?php

    include('includes/header.php');

?>
    <div class="col-sm-9 col-md-10">
        <div class="row mx-5 text-center">
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Yêu cầu đã nhận</div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo $submitrequest; ?>
                        </h4>
                        <a class="btn text-white" href="request.php">Lượt xem</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Công việc được giao</div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo $assignwork; ?>
                        </h4>
                        <a class="btn text-white" href="work.php">Lượt xem</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header">Số kỹ thuật viên</div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo $totaltech; ?>
                        </h4>
                        <a class="btn text-white" href="technician.php">Lượt xem</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-5 mt-5 text-center">
            <!--Table-->
            <p class=" bg-dark text-white p-2">Danh sách người yêu cầu</p>
            <?php
            $sql = "SELECT * FROM requesterlogin_tb";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                echo '<table class="table">
                          <thead>
                           <tr>
                            <th scope="col">ID người yêu cầu</th>
                            <th scope="col">Họ Và Tên</th>
                            <th scope="col">Email</th>
                           </tr>
                          </thead>
                            <tbody>';
                            while($row = $result->fetch_assoc()){
                                echo '<tr>';
                                echo '<th scope="row">'.$row["r_login_id"].'</th>';
                                echo '<td>'. $row["r_name"].'</td>';
                                echo '<td>'.$row["r_email"].'</td>';
                            }
                            echo '</tbody>
                     </table>';
            } else {
                echo "0 Result";
            }
            ?>
        </div>
      </div>
   </div>
</div>
<?php include('includes/footer.php'); ?>