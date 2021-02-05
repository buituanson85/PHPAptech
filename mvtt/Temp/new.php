<?php
require("header.php");
session_start();
Session_Status(0);
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
?>
<html>
<head><title>
</title></head>
<body>
<?php

mysql_close($connection);
?>
</body>
</html>
