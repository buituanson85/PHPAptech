<?php

    $con = mysqli_connect("localhost:3306","root","","banhangdienmay");

    // Check connection
    if (mysqli_connect_errno()) { //khi kết nỗi lỗi
        echo "Failed to connect to MySQL: " . mysqli_connect_errno() -> connect_error;
    }

    mysqli_set_charset ($con, "utf8"); //sét font
?>
