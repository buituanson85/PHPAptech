<?php
require("header.php");
session_start();
Session_Status(4);
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$query="select * from Rmndr natural join Ticket where ID=\"".$_SESSION["ID"]."\";";
$result=mysql_query($query);
if(!mysql_num_rows($result))
{
 $Error_Flag=1;
 $Message="You currently do not have any booked tickets.";
 session_register("Message");
 $url="Location: Usr_Home.php?".session_name()."=".strip_tags(session_id());
 mysql_close($connection);
 header($url);
}
?>
<html>
<head>
<?php
print("<title>Tickets for ".$_SESSION["ID"]."</title>");
?>
</head>
<body>
<?php
if(session_is_registered("Message") && !isset($Error_Flag))
{
 print("<h3>".$_SESSION["Message"]."</h3>");
 session_unregister("Message");
}
?>
<h1>Currently Booked Tickets : </h1>
<table border=2>
<tr><th>Ticket Code</th><th>Movie Name</th><th>City Name</th><th>Location Name</th><th>Hall Name</th><th>Ticket Date</th><th>Slot Time</th><th>Seats to be Booked</th><th>Change</th></tr>
<?php
while($row=mysql_fetch_array($result))
{
 print("<tr><td>".$row["Tkt_Code"]."</td>");
 $query="select * from (Ticket natural join Slot) natural join Movie where Tkt_Code=\"".$row["Tkt_Code"]."\";";
 $row2=mysql_fetch_array(mysql_query($query));
 print("<td>".$row2["Movie_Name"]."</td>");
 $query="select * from City where City_Code=\"".substr($row["Hall_Code"],0,3)."\";";
 $row2=mysql_fetch_array(mysql_query($query));
 print("<td>".$row2["City_Name"]."</td>");
 $query="select * from Location where Lctn_Code=\"".substr($row["Hall_Code"],0,6)."\";";
 $row2=mysql_fetch_array(mysql_query($query));
 print("<td>".$row2["Lctn_Name"]."</td>");
 $query="select * from Hall where Hall_Code=\"".$row["Hall_Code"]."\";";
 $row2=mysql_fetch_array(mysql_query($query));
 print("<td>".$row2["Hall_Name"]."</td>");
 print("<td>".$row["Date"]."</td>");
 $query="select * from Slot where Hall_Code=\"".$row["Hall_Code"]."\" and Slot_Code=\"".$row["Slot_Code"]."\";";
 $row2=mysql_fetch_array(mysql_query($query));
 print("<td>".$row2["Slot_Time"]."</td>");
 print("<form action=\"Changed.php\" method=\"POST\">");
 print("<input type=\"hidden\" name=\"Tkt_Code\" value=\"".$row["Tkt_Code"]."\">");
 print("<td><select name=\"Tkt_Sts\">");
 for($i=0;$i<$row["Tkt_Sts"];$i++)
 {print("<option>".$i."</option>");}
 print("</select></td><td><button type=\"submit\">Change</button></td>");
 print("</form></tr>");
}
mysql_close($connection);
?>
</table>
<h4>Tickets can be reserved only upto half an hour before the Slot Time on the day of the show only.</h4>
<br><a href="Usr_Home.php"><button>Home Page</button></a>
</body>
</html>
