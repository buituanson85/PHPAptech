<?php
    require_once ('DBConnection.php');
    if (isset($_GET['delete_id'])){
        $delete_id = $_GET['delete_id'];
        $sql = 'delete from student where id = '.$delete_id;
        execute ($sql);
    }

    $fullName = $age = $address = '';
    if (isset($_POST['fullName'])){
        $fullName = $_POST['fullName'];
    }
    if (isset($_POST['age'])){
        $age = $_POST['age'];
    }
    if (isset($_POST['address'])){
        $address = $_POST['address'];
    }

    if ($fullName != '' && $age != '' && $address != ''){
        $sql = 'insert into student( fullName, age, address) values("'.$fullName.'", "'.$age.'", "'.$address.'")';
        execute ($sql);
    }
?>
<!doctype html>
<html>
<head>
    <title>PHP Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Management Student's Detail Information
            </div>
            <div class="panel-body">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Full name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th width="60px"></th>
                    </tr>
<?php
    $sql = 'select * from student';
    $result =executeResult ($sql);
    $no =1;
    foreach ($result as $row){
        echo '<tr>
                        <td>'.($no++).'</td>
                        <td>'.($row['fullName']).'</td>
                        <td>'.($row['age']).'</td>
                        <td>'.($row['address']).'</td>
                        <td><a href="?delete_id='.$row['id'].'"><button class="btn btn-danger">Delete</button></a></td>
                    </tr>';
    }
?>


                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Input
            </div>
            <div class="panel-body">
                <form method="post" >
                    <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" name="fullName" id="fullName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" id="age" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                    <button class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
