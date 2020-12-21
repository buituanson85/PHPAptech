<?php
require_once ('dbhelp.php');
    if (isset($_POST['id'])){
        $id = $_POST['id'];

        $sql = 'delete from student where id = '.$id;
        execute ($sql);
        echo 'xoá sinh viên thành công';
    }