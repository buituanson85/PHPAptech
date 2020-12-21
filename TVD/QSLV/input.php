<?php
//chèn dữ liệu vào db
require_once ('dbhelp.php');

$fullName = $age = $address = '';
    if (!empty($_POST)){

        if (isset($_POST['fullName'])){
            $fullName = $_POST['fullName'];
        }
        if (isset($_POST['age'])){
            $age = $_POST['age'];
        }
        if (isset($_POST['address'])){
            $address = $_POST['address'];
        }

        //tiếp edit
        if (isset($_POST['id'])){
            $id = $_POST['id'];
        }

        //viết câu truy vấn
        //lưu ý sql sever special characters string tự xoá ký tự đặc biết an toàn về mặt dữ liệu
        $fullName = str_replace ('\'', '\\\'', $fullName);
        $age = str_replace ('\'', '\\\'', $age);
        $address = str_replace ('\'', '\\\'', $address);
        $id = str_replace ('\'', '\\\'', $id);
        if ($id != ''){
            //update
            $sql = "update student set fullName = '$fullName', age = '$age', address = '$address' where id =".$id;
        }else{
            //insert
            $sql = 'insert into student( fullName, age, address) values("'.$fullName.'", "'.$age.'", "'.$address.'")';
        }

    //    var_dump ($sql);
        execute ($sql);
        header ('Location: index.php');
        die();
    }
//Edit
$id = '';
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = 'select * from student where id = '.$id;
    $studentList = executeResult ($sql);
    if ($studentList != null && count($studentList) > 0){
        $std = $studentList[0];
        $fullName = $std['fullName'];
        $age = $std['age'];
        $address = $std['address'];
    }else{
        $id = '';
    }
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
                Input
            </div>
            <div class="panel-body">
                <form method="post" >
                    <div class="form-group">
                        <label>Fullname</label>
                        <input required="true" name="id" value="<?=$id?>" style="display: none">
                        <input required="true" type="text" name="fullName" id="fullName" class="form-control" value="<?=$fullName?>">
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input required="true" type="number" name="age" id="age" class="form-control" value="<?=$age?>">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input required="true" type="text" name="address" id="address" class="form-control" value="<?=$address?>">
                    </div>
                    <button class="btn btn-success">Add Student</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


