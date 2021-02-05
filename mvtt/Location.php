<?php
require("header.php");
session_start();
$Oprtn=$_POST["Oprtn"];
$City_Code=$_POST["City_Code"];
switch($Oprtn)
{
 case 1:
 {
  $Target="Remove.php";
  Session_Status(1);
  require("Flush.php");
  break;
 }  
 case 2:
 {
  $Target="Slot.php"; 
  Session_Status(4);
  break;
 }  
 case 3:
 {
  $Movie_Code=$_POST["Movie_Code"];
  $Target="Booker.php";
  Session_Status(4);
  break;
 }  
 default:
 {
  if(isset($_GET["K"]))
  {
   Session_Status(4);
   $Oprtn=2;
   $City_Code=$_GET["City_Code"];
   $Target="Slot.php"; 
  }
  else
  {$Error_Flag=1;}
  break;
 }
}
if(isset($Error_Flag))
{ 
 $Message=$Illegal_Actn;
 session_register("Message");
 $url="Location: ReDirect.php?".session_name()."=".strip_tags(session_id());
 header($url);
}
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
if($Oprtn==3)
{
 $query="select * from Movie where Movie_Code=\"".$Movie_Code."\";";
 $row=mysql_fetch_array(mysql_query($query));
 $Movie_Name=$row["Movie_Name"];
}
$query="select City_Name from City where City_Code=\"".$City_Code."\";";
$row=mysql_fetch_array(mysql_query($query));
$City_Name=$row["City_Name"];
if($Oprtn!=3)
{$query="select * from Hall where Hall_Code like \"".$City_Code."%\";";}
else
{$query="select * from Slot where Hall_Code like \"".$City_Code."%\" and Movie_Code=\"".$Movie_Code."\";";}
if(!mysql_num_rows(mysql_query($query)))
{
 if($Oprtn!=3)
 {$Message="No Movie Complexes present in ".$City_Name.".";}
 else
 {$Message=$Movie_Name." does not play at any Movie Complex in ".$City_Name.".";}
 session_register("Message");
 if($Oprtn==3)
 {$url="Location: Category.php?K=1&Lang_Code=".substr($Movie_Code,0,3)."&".session_name()."=".strip_tags(session_id());}
 else
 {$url="Location: ReDirect.php?".session_name()."=".strip_tags(session_id());}
 mysql_close($connection);
 header($url);
}
?> 
<html>
<head>
<?php
/*
if(Session_Status(1))
{print("<meta http-equiv=\"refresh\" content=30>");}
else
{print("<meta http-equiv=\"refresh\" content=180>");}
*/
print("<meta http-equiv=\"refresh\" content=180>");
print("<title>");
if($Oprtn==3)
{print("Halls Playing ".$Movie_Name." by Location in ");}
else
{print("Halls by Location for ");}
print("$City_Name</title>");
?>
</head>
<body>
<?php
if(session_is_registered("Message") && $Oprtn==2)
{
 print("<h3>".$_SESSION["Message"]."</h3>");
 session_unregister("Message");
}
$query="select * from Location where Lctn_Code like \"".$City_Code."%\" order by Lctn_Name;";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
 $Lctn_Code=$row["Lctn_Code"];
 $Lctn_Name=$row["Lctn_Name"];
 print("<h1>".$Lctn_Name."</h1>");
 print("<table border=2>");
 if($Oprtn!=3)
 {$query="select * from Hall where Hall_Code like \"".$Lctn_Code."%\";";}
 else
 {$query="select * from Hall natural join Slot where Movie_Code=\"".$Movie_Code."\" and Hall.Hall_Code like \"".$Lctn_Code."%\" order by Hall_Name,Slot_Date,Slot_Time;";}
 $result2=mysql_query($query);
 if(mysql_num_rows($result2))
 {
  print("<tr><th><h3>Hall Name</h3></th>");
  switch($Oprtn)
  {
   case 1:
   {
    print("<th><h3>Operation</h3></th>");
    break;
   }
   case 2:
   {
    print("<th><h3>Book Current Week</h3></th><th><h3>Book Next Week</h3></th>");
    break;
   }
   case 3:
   {
    print("<th><h3>Slot Week Date</h3></th><th><h3>Slot Time</h3></th><th><h3>Seats Available</h3></th><th><h3>Price Per Seat</h3></th><th><h3>Book Now</h3></th>");
    break;
   }
  } 
  print("</tr>");
  while($row2=mysql_fetch_array($result2))
  {
   print("<tr><td><a nohref name=".$row2["Hall_Code"].">".$row2["Hall_Name"]."</a></td>"); 
   print("<form action=\"".$Target."\" method=\"POST\">");
   print("<input type=\"hidden\" name=\"Hall_Code\" value=\"".$row2["Hall_Code"]."\">");
   switch($Oprtn)
   {
    case 1:
    {
     print("<td><button type=\"submit\" name=\"Type\" value=".$_POST["Type"].">Remove</button></td>");
     break;
    }
    case 2:
    {
     $query="select * from Hall natural join Slot where Hall.Hall_Code=\"".$row2["Hall_Code"]."\" and Slot_Date<=\"".$Today."\";";
     print("<td><button type=\"submit\" name=\"Oprtn\" value=1");
     if(!mysql_num_rows(mysql_query($query)))
     {print(" disabled");}
     print(">Book Now</button></td>");
     $query="select * from Hall natural join Slot where Hall.Hall_Code=\"".$row2["Hall_Code"]."\" and Slot_Date>\"".$Today."\";";
     print("<td><button type=\"submit\" name=\"Oprtn\" value=2");
     if(!mysql_num_rows(mysql_query($query)))
     {print(" disabled");}
     print(">Book Now</button></td>");
     break;
    }
    case 3:
    {
     print("<td>".$row2["Slot_Date"]."</td>");
     print("<td>".$row2["Slot_Time"]."</td>");
     $Sts_Avlbl=0;
     $query="select * from Rmndr where Hall_Code=\"".$row2["Hall_Code"]."\" and Slot_Code=\"".$row2["Slot_Code"]."\" and Date>=\"".$Today."\";";
     $result3=mysql_query($query);
     while($row3=mysql_fetch_array($result3))
     {$Sts_Avlbl+=$row3["Rmndr_Sts"];}
     $query="select * from Halls where Hall_Code=\"".$row2["Hall_Code"]."\" and Code=\"".substr($row2["Slot_Code"],0,1)."\";";
     $row3=mysql_fetch_array(mysql_query($query));
     print("<td>".$Sts_Avlbl."</td>");
     print("<td>".$row3["PPS"]."</td>");
     print("<input type=\"hidden\" name=\"Slot_Code\" value=\"".$row2["Slot_Code"]."\">");
     print("<td><button type=\"submit\" name=\"Oprtn\" value=4");
     if(!$Sts_Avlbl)
     {print(" disabled");}
     print(">Book Now</button></td>");
     break;
    }
   }
   print("</form></tr>");
  }
 }
 else
 {print("<tr><td><h4>".$No_Entry."</h4></td></tr>");}
 print("</table>");
 if($Oprtn==2)
 {
  print("<table border=2>");
  print("<tr><td><h4>View Category Choices for </h4></td>");
  print("<form action=\"Category.php\" method=\"POST\">");
  print("<td><select name=\"Lang_Code\">");
  $result2=mysql_query($Language_query);
  while($row2=mysql_fetch_array($result2))
  {
   print("<option value=\"".$row2["Lang_Code"]."\"");
   if($row2["Lang_Code"]==$_SESSION["Lang_Code"])
   {print(" selected ");}
   print(">".$row2["Lang_Name"]."</option>");
  }
  print("</select></td>");
  print("<td><button type=\"submit\" name=\"Oprtn\" value=3>View Now</button></td>");
  print("</form></tr></table>");
 }
 elseif($Oprtn==3)
 {
  print("<a href=\"Category.php?K=1&Lang_Code=".substr($Movie_Code,0,3)."#".$Movie_Code."\">");
  print("<button>Back to selected Category Choices.</button></a>");
 }
 print("<a href=\"ReDirect.php\"><button>Back to home page.</button></a>");
}
mysql_close($connection);
?>
</body>
</html>
