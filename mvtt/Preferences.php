<?php
require("header.php");
session_start();
if(!session_is_registered("ID"))
{
 die($Error_Illegal_Request);
}
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
?>
<html>
<head><title>User Preferences Updation</title>
<link rel="stylesheet"  type="text/css" href="Temp/style.css">
</head>
<body >
<?php
if(session_is_registered("Error"))
{
 /* If any error  is a registered session variable then print the error */
 print("<h3>".$_SESSION["Error"]."</h3>");
 /* Unregister the  error */
 session_unregister("Error");
}
if(session_is_registered("Message"))
{
/* If any message  is a registered session variable then print the error */
 print("<h3>".$_SESSION["Message"]."</h3>");
 /* Unregister the  message */
 session_unregister("Message");
}
?>
<div align="center"><h1><b><u>User Preferences Updation Form</u></b><h1></div>
<br><br><br><div align="center">
<table  bgcolor="Indigo" text="white">
<form action="Verify.php" method="POST">
<tr><td><b>Enter Password</b></td><td>
<?php
print("<input type=\"password\" name=\"PassWord\" maxlength=25 size=20 ");
if($_SESSION["LogIn_Type"]==4 && !$_GET["Chng_pwd"])
{
/* since the same script is rendered to all the users  to change their preference 
        disable changing the password option if Normal user has to change his language or location changes */
 print("disabled ");
 }
print(">");
?>
</td></tr>
<tr><td><b>Confirm Password</b></td><td>
<?php
print("<input type=\"password\" name=\"Cnfm_PassWord\" maxlength=25 size=20 ");
if($_SESSION["LogIn_Type"]==4 && !$_GET["Chng_pwd"])
{print("disabled ");}
print(">");
?>
</td></tr>
<?php
if($_SESSION["LogIn_Type"]==2)
{
/* A hall Administrator can change  his password as well that of the ticket booker for that hall */
 print("<tr><td><b>Change Password for</b></td><tr>");
 print("<tr><td><input type=\"radio\" name=\"Type\" value=0 checked><b>Administrator</b></td>");
 print("<td><input type=\"radio\" name=\"Type\" value=1><b>Ticket Counter</b></td></tr>");
}
elseif($_SESSION["LogIn_Type"]==4)
{
 print("<tr><td><b>Choose Language of preference</b></td>");
 print("<td><select name=\"Lang_Code\">");
 $result=mysql_query($Language_query);
 while($row=(mysql_fetch_array($result)))
 {
  print("<option value=\"".$row["Lang_Code"]."\"");
  if($row["Lang_Code"]==$_SESSION["Lang_Code"])
  {print(" selected");}
  print(">".$row["Lang_Name"]."</option>");
 }
 print("</select></td></tr>");
 print("<tr><td><b>Choose City of preference</b></td>");
 print("<td><select name=\"City_Code\">");
 $result=mysql_query($City_query);
 while($row=(mysql_fetch_array($result)))
 {
  print("<option value=\"".$row["City_Code"]."\"");
  if($row["City_Code"]==$_SESSION["City_Code"])
  {print(" selected");}
  print(">".$row["City_Name"]."</option>");
 }
 print("</select></td></tr>");
}
mysql_close($connection);
?>
<tr><td colspan=5 bgcolor="mistyrose" text="maroon">
<center><button type="submit">Submit Information</button></center ></td></tr>
</form><tr><td colspan=5 bgcolor="mistyrose" text="maroon">
<center><a href="ReDirect.php"><button>Home Page</button></a></center></td></tr>
</table></div>
</body>
</html>
