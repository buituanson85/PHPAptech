<!doctype html>
<html lang="en">
<head>
    <title>PHP Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<center><h1>Welcome FPT APtech</h1></center>
<div class="container-fluid">
    <table class="table table-bordered table-hover">
        <tr>
            <th>No</th>
            <th>Full name</th>
            <th>User name</th>
            <th>Passworld</th>
            <th>Email</th>
            <th>Phone number</th>
        </tr>
        <tbody>
            <?php
                require_once("DBConnection.php");
                $query = "select * from student";
                $result = mysqli_query ($connect, $query);
                $data = array ();
                while ($row = mysqli_fetch_array ($result, 1)){
                    $data[] = $row;
            }
                require_once("DBClose.php");
                //hiển thị thông tin ra table
            for ($i = 0; $i < count($data); $i++){
                echo '<tr>
            <td>'.($i + 1).'</td>
            <td>'.$data[$i]['fullname'].'</td>
            <td>'.$data[$i]['username'].'</td>
            <td>'.$data[$i]['password'].'</td>
            <td>'.$data[$i]['email'].'</td>
            <td>'.$data[$i]['phone'].'</td>
        </tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>