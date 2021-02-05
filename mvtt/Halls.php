<?php
require("header.php");
session_start();
Session_Status(2);
$Oprtn=$_POST["Oprtn"];
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$Type="Halls";
switch($Oprtn)
{
 case 1:
 {
 /* Hall Addition*/
  $query="select * from Halls where Hall_Code=\"".$_SESSION["ID"]."\" order by Code;";
  $result=mysql_query($query);
  $i=0;
  while($row=mysql_fetch_array($result))
  {
   $Temp=$row["Code"];
   settype($Temp,"integer");
   if($Temp>$i) 
   {break;}
   $i++;
  }
  $Temp=Gnrt0s_str($i,1);
  $query="insert into Halls(Hall_Code,Code,Sts_Avlbl,PPS) values(\"".$_SESSION["ID"]."\",\"".$Temp."\",".$_POST["Sts_Avlbl"].",".$_POST["PPS"].");";
  if(mysql_query($query))
  {$Message="New Hall successfully added to your Complex.";}
  else
  {$Message="Adding of new Hall failed. Please Check Values.";}
  break;
 }
 case 2:
 {
  /* Updating the PPS and Hall seats Availability*/
  $query="update Halls set Sts_Avlbl=".$_POST["Sts_Avlbl"].",PPS=".$_POST["PPS"]." where Hall_Code=\"".$_SESSION["ID"]."\" and Code=\"".$_POST["Code"]."\";";
  if(mysql_query($query))
  {$Message="Hall Updation successfull. Please verify.";}
  else
  {$Message="Updation of Hall failed. Please Check Values.";}
  break;
 }
 case 3:
 {
  $query="delete from Halls where Hall_Code=\"".$_SESSION["ID"]."\" and Code=\"".$_POST["Code"]."\";";
  if(mysql_query($query))
  {$Message="Hall successfully removed from your Complex.";}
  else
  {$Message="Removing of Hall failed. Please Check Values.";}
  break;
 }
 default:
 {
  if($_GET["K"])
  {$Oprtn=1;}// When the hall admin is setting up a hall first k=1
  else
  {
   $Title="Slot Management for ".$Hall_Name.".";
   $Type="Slots";
   $query="select * from Halls where Hall_Code=\"".$_SESSION["ID"]."\";";
   if(!mysql_num_rows(mysql_query($query)))
   {
    mysql_close($connection);
    $Error=$Illegal_Actn;
    session_register("Error");
    $url="Location: HA_Home.php?".session_name()."=".strip_tags(session_id());
    header($url);
   }
  }
  break;
 }
}
if($Oprtn)
{$Target=$_SERVER["PHP_SELF"];}
else
/* setting up slots*/
{$Target="Slotter.php";}
settype($DoW=strftime("%w"),"integer");
if(isset($Message))
{print("<h3>".$Message."</h3>");}
?>
<html>
<head>
<?php
$query="select * from Hall where Hall_Code=\"".$_SESSION["ID"]."\"";
$row=mysql_fetch_array(mysql_query($query));
print("<title>$Type Management for ".$row["Hall_Name"].".</title>");
?>
</head>
<body>
<?php
print("<h2>Existing Halls in Complex : </h2>");
print("<table border=2>");
$query="select * from Halls where Hall_Code=\"".$_SESSION["ID"]."\" order by Code;";
$result=(mysql_query($query));
if(mysql_num_rows($result))
{ 
 print("<tr><th>Hall Number</th><th>Number of Seats Available</th><th>Price Per Seat</th>");
 if($Oprtn)
 {print("<th>Update</th><th>Remove</th></tr>");}
 else
 {print("<th>Set Up Slots</th>");}
 $i=1;
 while($row=mysql_fetch_array($result))
 {
  print("<tr><td>".$i."</td>");
  print("<form action=\"".$Target."\" method=\"POST\">"); 
  print("<input type=\"hidden\" name=\"Code\" value=\"".$row["Code"]."\">");
  if($Oprtn)
  {$query="select * from Slot where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$row["Code"]."%\";";}
  else
  {
   if($DoW!=3 && $DoW!=4)
   {$query="select * from Slot where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$row["Code"]."%\" and Slot_Date<=\"".$Today."\";";}
   else
   {$query="select * from Slot where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$row["Code"]."%\" and Slot_Date>\"".$Today."\";";}
  }
  $result2=mysql_query($query);
  if($Oprtn)
  {
   print("<td><select name=\"Sts_Avlbl\"");
   if(mysql_num_rows($result2))
   {print(" disabled");}
   print(">");
   for($j=40;$j<=100;$j+=5)
   {
    print("<option");
    if($j==$row["Sts_Avlbl"])
    {print(" selected");}
    print(">".$j."</option>");
   }
   print("</select></td>");
   print("<td><select name=\"PPS\"");
   if(mysql_num_rows($result2))
   {print(" disabled");}
   print(">");
   for($j=75;$j<=200;$j+=5)
   {
    print("<option");
    if($j==$row["PPS"])
    {print(" selected");}
    print(">".$j."</option>");
   }
   print("</select></td>");
   print("<td><button type=\"submit\" name=\"Oprtn\" value=2");
   if(mysql_num_rows($result2))
   {print(" disabled");}
   print(">Update</button></td>");
   print("<td><button type=\"submit\" name=\"Oprtn\" value=3");
   if(mysql_num_rows($result2))
   {print(" disabled");}
   print(">Remove</button></td>");
  }
  else
  {
   print("<td>".$row["Sts_Avlbl"]."</td>");
   print("<td>".$row["PPS"]."</td>");
   print("<td><button type=\"submit\" name=\"Oprtn\" value=1");
   if(mysql_num_rows($result2))
   {print(" disabled");}
   print(">Set Up Slots</button></td>");
  }
  print("</form></tr>");
  $i++; 
 }
}
else
{print("<tr><td><h3>".$No_Entry."</h3></td></tr>");}
print("</table>");
if($Oprtn)
{
 $query="select * from Halls where Hall_Code=\"".$_SESSION["ID"]."\";";
 $n=mysql_num_rows(mysql_query($query));
 print("<h2>Add a new Hall to Complex : </h2>");
 print("<table border=2><tr><th>Number of Seats Available</th><th>Price Per Seat</th><th>Add Now</th></tr>");
 print("<tr><form action=\"".$_SERVER["PHP_SELF"]."\" method=\"POST\">");
 print("<td><select name=\"Sts_Avlbl\"");
 if($n>=10)
 {print(" disabled");};
 print(">");
 for($i=40;$i<=100;$i+=5)
 {print("<option>$i</option>");}
 print("</select></td>");
 print("<td><select name=\"PPS\"");
 if($n>=10)
 {print(" disabled");};
 print(">");
 for($i=75;$i<=200;$i+=5)
 {print("<option>$i</option>");}
 print("</select></td>");
 print("<td><button type=\"submit\" name=\"Oprtn\" value=1");
 if($n>=10)
 {print(" disabled");};
 print(">Add to Halls</button></td>");
 print("</form></tr></table>");
}
mysql_close($connection);
print("<a href=\"HA_Home.php\"><button>Finished Setting Up ".$Type.".");
?>
</button></a>
</body>
</html>
