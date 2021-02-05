<?php
require("header.php");
session_start();
Session_Status(1);
require("Flush.php");
switch($_POST["Oprtn"])
{
 case 1:
 {
  $Target="Add.php";
  $Temp="Add to Location";
  break;
 }  
 case 2:
 {
  $Target="Remove.php";
  $Temp="Remove";
  break;
 }  
 default:
 {
  $Error_Flag=1;
  break;
 }  
}
if(isset($Error_Flag))
{
 $Error=$Illegal_Actn;
 session_register("Error");
 $url="Location: Adm_Home.php?".session_name()."=".strip_tags(session_id());
 header($url);
}
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$query="select City_Name from City where City_Code=\"".$_POST["City_Code"]."\";";
$row=mysql_fetch_array(mysql_query($query));
$City_Name=$row["City_Name"];
$query="select * from Location where Lctn_Code like \"".$_POST["City_Code"]."%\";";
$result=mysql_query($query);
if(!mysql_num_rows($result))
{
 $Error="No Location present in ".$City_Name.".";
 session_register("Error");
 $url="Location: Adm_Home.php?".session_name()."=".strip_tags(session_id());
 mysql_close($connection);
 header($url);
}
?>
<html>
<head>
<meta http-equiv=\"refresh\" content=30>
<?php
print("<title>Locations present in $City_Name.</title>");
?>
</head>
<body>
<?php 
print("<h1>".$City_Name."</h1>");
print("<table border=2><tr><th><h3>Location Name</h3></th><th><h3>Operation</h3></th></tr>");
while($row=mysql_fetch_array($result))
{
 print("<tr><td>".$row["Lctn_Name"]."</td>");
 print("<form action=\"".$Target."\" method=\"POST\">");
 print("<input type=\"hidden\" name=\"Lctn_Code\" value=\"".$row["Lctn_Code"]."\">");
 if($_POST["Oprtn"]==1)
 {print("<input type=\"hidden\" name=\"Temp\" value=\"".$_POST["Temp"]."\">");}
 print("<td><button type=\"submit\" name=\"Type\" value=".$_POST["Type"].">".$Temp."</button></td>");
 print("</form></tr>");
}
print("</table>");
mysql_close($connection);
?>
<a href="Adm_Home.php"><button>Administrator Home Page.</button></a>
</body>
</html>
