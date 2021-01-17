<?php

//$con = mysqli_connect("localhost:3306","root","","hindi");
//
//// Check connection
//if (mysqli_connect_errno()) { //khi kết nỗi lỗi
//    echo "Failed to connect to MySQL: " . mysqli_connect_errno() -> connect_error;
//}
//
//mysqli_set_charset ($con, "utf8"); //sét font
?>
<?php
    $db_host = "localhost:3306";
    $db_user = "root";
    $db_password = "";
    $db_name = "osms_db";

    $conn = new mysqli( $db_host, $db_user, $db_password, $db_name);

    if ($conn -> connect_error){
        die("Connection failed");
    }
    mysqli_set_charset ($conn, "utf8");
?>