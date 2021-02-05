<?php
require("header.php");
session_start();
Session_Status(3);
if($Time<"08:00:00" || $Time>"21:00:00")
{
 $url="Location: Tkt_Perform.php";
 header($url);
}
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$query="select * from Hall where Hall_Code=\"".strtoupper($_SESSION["ID"])."\";";
$row=mysql_fetch_array(mysql_query($query));
?>
<html>
<head>
<meta http-equiv="refresh" content=30>
<?php
print("<title>Ticket Booking Counter for ".$row["Hall_Name"].".</title>");
?>
</head>
<body>
<?php
if(session_is_registered("Message"))
{
 print("<h3>".$_SESSION["Message"]."</h3>");
 session_unregister("Message");
}
?>
<h2>Tickets Booked For Today : </h2>
<table border=2>
<?
$query="select * from Ticket where Hall_Code=\"".strtoupper($_SESSION["ID"])."\" and Date=\"".$Today."\" order by Tkt_Code;";
$result=mysql_query($query);
if(mysql_num_rows($result))
{
 print("<tr><th>Ticket Code</th><th>User ID</th><th>Reserve</th></tr>");
 while($row=mysql_fetch_array($result))
 {
  print("<tr><td>".$row["Tkt_Code"]."</td>");
  print("<td>".$row["ID"]."</td>");
  print("<form action=\"Tkt_Perform.php\" method=\"POST\">");
  print("<input type=\"hidden\" name=\"Tkt_Code\" value=\"".$row["Tkt_Code"]."\">");
  print("<td><button type=\"submit\" name=\"Oprtn\" value=1>Reserve</button></td></form></tr>");
 }
}
else
{print("<tr><td><h4>".$No_Entry."</h4></td></tr>");}
mysql_close($connection);
?>
</table>
<form action="Tkt_Perform.php" method="POST">
<br><button type="submit" name="Oprtn" value=0>Log Out</button>
</form>
</body>
</html>
