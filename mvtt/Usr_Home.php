<?php
require("header.php");
session_start();
Session_Status(4);
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
?>
<html>
<head>
<?php
print("<title>Home Page for ".$_SESSION["ID"].".</title>")
?>
<link rel="stylesheet"  type="text/css" href="Temp/style.css">
</head>
<body >
<?php
if(session_is_registered("Message"))
{
 print("<h3>".$_SESSION["Message"]."</h3>");
 session_unregister("Message");
}
?>
<form action="Usr_Perform.php" method="POST">
<div align="center"><h1><b><u>User Proceed On Form</u></b></h1>
</div><br><br><br><div align="center">
<table bgcolor="Indigo" text="White">
<td><input type="radio" name="Choice" value=1><b>Choose By Category</b></td>
<td><select name="Lang_Code">
<?
$result=mysql_query($Language_query);
while($row=(mysql_fetch_array($result)))
{
 print("<option value=\"".$row["Lang_Code"]."\"");
 if($row["Lang_Code"]==$_SESSION["Lang_Code"])
 {print(" selected");}
 print(">".$row["Lang_Name"]."</option>");
}
?> 
</select></td></tr>
<td><input type="radio" name="Choice" value=2><b>Choose By Location</b></td>
<td><select name="City_Code">
<?
$result=mysql_query($City_query);
while($row=(mysql_fetch_array($result)))
{
 print("<option value=\"".$row["City_Code"]."\"");
 if($row["City_Code"]==$_SESSION["City_Code"])
 {print(" selected");}
 print(">".$row["City_Name"]."</option>");
}
mysql_close($connection);
?> 
</select></td></tr>
<tr><td><input type="radio" name="Choice" value=3><b>Update Tickets</b></td></tr>
<tr><td><input type="radio" name="Choice" value=4 checked><b>Change Preferences</b></td>
<td><input type="checkbox" name="Chng_pwd" value=1><b>Change Password</td></b></tr>
<tr><td colspan=5 bgcolor="mistyrose" text="maroon">
<center><button type="submit" name="Oprtn" value=1>Submit Information</button></center></td></tr>
<tr><td colspan=5 bgcolor="mistyrose" text="maroon">
<center><button type="submit" name="Oprtn" value=0>Log Out</button></center ></td></tr>
</table></div>
</form></body>
</html>
