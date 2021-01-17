<?php
    define ('TITLE', 'Dashboard');
    define ('PAGE', 'dashboard');
    include ('../dbConnection/dbConnection.php');
    include ('../includes/header.php');

global $con;
?>
            <div class="col-sm-9 col-md-10"><!-- start dash 2nd colom-->
                <div class="row text-center mx-5">
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-danger bm-3" style="max-width: 18rem;">
                            <div class="card-header">Requests Received</div>
                            <div class="card-body">
                                <h4 class="card-title">43</h4>
                                <a class="btn text-white" href="#">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-success bm-3" style="max-width: 18rem;">
                            <div class="card-header">Assigned work</div>
                            <div class="card-body">
                                <h4 class="card-title">23</h4>
                                <a class="btn text-white" href="#">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-info bm-3" style="max-width: 18rem;">
                            <div class="card-header">No. of Technician</div>
                            <div class="card-body">
                                <h4 class="card-title">2</h4>
                                <a class="btn text-white" href="#">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="mx-5 mt-5 text-center">
                <p class="bg-dark text-white p-2">List of Requesters</p>
                <?php
                    $sql = "SELECT * FROM requesterlogin_tb order by r_login_id";
                    $result = mysqli_query ($con, $sql);
                    if ($result->num_rows > 0){
                        echo '
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Requester ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>';
                            while ($row = $result -> fetch_assoc ()){
                               echo  '<tr>';
                               echo  '<td>'.$row['r_login_id'].'</td>';
                               echo  '<td>'.$row['r_name'].'</td>';
                               echo  '<td>'.$row['r_email'].'</td>';
                               echo  '</tr>';
                                }
                          echo  '</tbody>
                        </table>   
                        ';
                    }
                ?>
            </div>
            </div><!-- End dash 2nd colom-->
            <?php include ('../includes/footer.php'); ?>

