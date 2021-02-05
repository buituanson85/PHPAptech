<?php
require("header.php");
session_start();
//Initially there is no Type of User account. So set the Status of the session to 0.
Session_Status(0);
?>
<html>
<head><title>User Login Page</title>
<link rel="stylesheet"  type="text/css" href="Temp/style.css">
</head>
<body >
<?php
if(session_is_registered("Message"))
{
 print("<h3>".$_SESSION["Message"]."</h3>");
 session_unregister("Message");
}
session_unset();
session_destroy(); 
?>
<div align="center"><h1><b><u>User Login Form</u></b></h1>
</div><br><br><br><div align="center">
<table bgcolor="Indigo" text="white">
<form action="LogIn.php" method="POST">
<tr><td><b>Enter User ID</b></td>
<td><input type="text" name="ID" maxlength=25 size=20></td></tr>
<tr><td><b>Enter Password</b></td>
<td><input type="password" name="PassWord" maxlength=25 size=20></td></tr>
<tr></tr>
<tr><td colspan=5 bgcolor="crimson" text="maroon">
<center><button type="submit">Submit Information</button></center ></td></tr>
</form><tr></tr><tr><td colspan=5 bgcolor="crimson" text="maroon">
<center><a href="Sign_Up.php"><button type="button">New User Registration</button></a></center></td></tr>
</table></div>
</body>
</html>
