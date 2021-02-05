<?php
require("header.php");
session_start();
Session_Status(0);
/*
Connecting to the Database. If any connectivity error , end the proceeding reporting Not Connected Error.
*/
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
/*
Selecting a  Database. If any connectivity error  ,end the proceeding reporting Not Connected Error.
*/
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
?>
<html>
<head><title>New User Registration Form</title>
<link rel="stylesheet"  type="text/css" href="Temp/style.css">
</head>
<body  >
<?php
if(session_is_registered("Error"))
{
 print("<h3>".$_SESSION["Error"]."</h3>");
 session_unregister("Error");
}
?>
<div align="center"><h1><b><u>New User Registration Form</u></b><h1></div>
<br><br><br><div align="center">
<table bgcolor="Indigo" text="white">
<form action="Verify.php" method="POST">
<tr><td><b>Enter User Name</b></td>
<td><input type="text" name="Name" maxlength=50 size=20></td></tr>
<tr><td><b>Enter User ID</b></td>
<td><input type="text" name="ID" maxlength=25 size=20></td></tr>
<tr><td><b>Enter Password</b></td>
<td><input type="password" name="PassWord" maxlength=25 size=20></td></tr>
<tr><td><b>Confirm Password</b></td>
<td><input type="password" name="Cnfm_PassWord" maxlength=25 size=20></td></tr>
<tr><td><b>Choose City of preference</b></td>
<td><select name="City_Code">
<?php
/*
Each  Type of User  can have a default Language and Location as his Preference.
*/
$result=mysql_query($City_query);
while($row=(mysql_fetch_array($result)))
{
 print("<option value=\"".$row["City_Code"]."\">".$row["City_Name"]."</option>");
}
?>
</select></td></tr>
<tr><td><b>Choose Language of preference</b></td>
<td><select name="Lang_Code">
<?php
$result=mysql_query($Language_query);
while($row=(mysql_fetch_array($result)))
{
 print("<option value=\"".$row["Lang_Code"]."\">".$row["Lang_Name"]."</option>");
}
mysql_close($connection);
session_unset();
session_destroy(); 
?>
</select></td></tr>
<tr><td colspan=5 bgcolor="mistyrose" text="maroon">
<center ><input type="submit" value="Submit Information"></center ></td></tr>
</form><tr><td colspan=5 bgcolor="mistyrose" text="maroon">
<center><a href="Sign_In.php"><button type="button">User Sign In Form</button></a></center></td></tr>
</table></div>
</body>
</html>
