<?php
    require_once ('dbhelp.php');

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
            Quản lý thông tin sinh viên
            <form method="get">
                <input type="text" name="search" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="tìm kiếm theo tên">
            </form>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ Và Tên</th>
                        <th>Tuổi</th>
                        <th>Địa chỉ</th>
                        <th width="60px"></th>
                        <th width="60px"></th>
                    </tr>
                </thead>
                <tbody>
<?php
//tìm kiếm
    if (isset($_GET['search']) && $_GET['search'] != ''){
        $sql = 'select * from student where fullName like "%'.$_GET['search'].'%"';
    }else{
        $sql = 'select * from student';
    }
//hết tìm kiếm
//    $sql = 'select * from student';
    $studentList = executeResult ($sql);
    $index = 1;
    foreach ($studentList as $std){
        echo '<tr>
                    <td>'.($index++).'</td>
                    <td>'.$std['fullName'].'</td>
                    <td>'.$std['age'].'</td>
                    <td>'.$std['address'].'</td>
                    <td><button class="btn btn-warning" onclick=\'window.open("input.php?id='.$std['id'].'","_self")\'>Edit</button></td>
                    <td><button class="btn btn-danger"onclick="deleteStudent('.$std['id'].')">Delete</button></td>
                </tr>';
    }
?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <button class="btn btn-success" onclick="window.open('input.php', '_self')">Add Student</button>
</div>

<script type="text/javascript">
    function deleteStudent(id) {
        option = confirm('bạn có muốn xoá sinh viên hay không');
        if (!option){
            return;
        }
        $.post('delete_student.php', {
            'id': id
        }, function (data) {
            alert(data);
            location.reload();
        })
    }
</script>
</body>
</html>

