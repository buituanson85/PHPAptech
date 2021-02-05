<?php
require("header.php");
session_start();
$Oprtn=$_POST["Oprtn"];
$Lang_Code=$_POST["Lang_Code"];
settype($DoW=strftime("%w"),"integer");
switch($Oprtn)
{
 case 1:
 {
 /* Adm_perform */
  $Target="Remove.php";
  Session_Status(1);
  require("Flush.php");
  break;
 }  
 case 2:
 {
 /* Slotter.php*/
  $Target="Slotter.php"; 
  Session_Status(2);
  break;
 }  
 case 3:
 {
  /* Usr_perform.php*/
  $Target="Location.php";
  Session_Status(4);
  break;
 }  
 default:
 {
  if(isset($_GET["K"]))
  {
   Session_Status(4);
   $Lang_Code=$_GET["Lang_Code"];
   $Target="Location.php";
   $Oprtn=3;
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
 $url="Location: ReDirect.php?".session_name()."=".session_id();
 header($url);
}
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$query="select Lang_Name from Language where Lang_Code=\"".$Lang_Code."\";";
$row=mysql_fetch_array(mysql_query($query));
$Lang_Name=$row["Lang_Name"];
$query="select * from Movie where Movie_Code like \"".$Lang_Code."%\"";
$result=mysql_query($query);
if(!mysql_num_rows($result))
{
 $Message="No ".$Lang_Name." Movies present.";
 session_register("Message");
 if($Oprtn==2)
 {$url="Location: Slotter.php?Code=".$_POST["Code"]."&Time=".$_POST["Time"]."&".session_name()."=".strip_tags(session_id());}
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
print("<title>Movies playing by Category in $Lang_Name.</title>");
?>
</head>
<body>
<?php 
if(session_is_registered("Message") && $Oprtn==3)
{
 print("<h3>".$_SESSION["Message"]."</h3>");
 session_unregister("Message");
}
$result=mysql_query($Category_query);
while($row=mysql_fetch_array($result))
{
 print("<h1>".$row["Ctry_Name"]."</h1>");
 print("<table border=2>");
 $query="select * from Movie where Movie_Code like \"".$Lang_Code.$row["Ctry_Code"]."%\";";
 $result2=mysql_query($query);
 if(mysql_num_rows($result2))
 {
  print("<tr><th><h3>Movie Name</h3></th><th><h3>Movie Release Date</h3></th>");
  switch($Oprtn)
  {
   case 1:
   {
    print("<th><h3>Operation</h3></th>");
    break;
   }
   case 2:
   {
    print("<th><h3>Movie Duration</h3></th><th><h3>Next Slot Available</h3></th><th><h3>Select</h3></th>");
    break;
   }
   case 3:
   {
    print("<th><h3>Movie Duration</h3></th><th><h3>Choose City</h3></th><th><h3>View Slots</h3></th>");
    break;
   }
  } 
  print("</tr>");
  while($row2=mysql_fetch_array($result2))
  {
   print("<tr><td><a nohref name=\"".$row2["Movie_Code"]."\">".$row2["Movie_Name"]."</a></td>");
   print("<td>".$row2["Release_Date"]."</td>");
   print("<form action=\"".$Target."\" method=\"POST\">");
   print("<input type=\"hidden\" name=\"Movie_Code\" value=\"".$row2["Movie_Code"]."\">");
   switch($Oprtn)
   {
    case 1:
    {
     $Temp="Remove";
     print("<input type=\"hidden\" name=\"Type\" value=".$_POST["Type"].">");
     break;
    }
    case 2:
    {
     $x=2;
     $Temp="Select";
     print("<input type=\"hidden\" name=\"Code\" value=\"".$_POST["Code"]."\">");
     print("<input type=\"hidden\" name=\"Time\" value=\"".$_POST["Time"]."\">");
     print("<td>".$row2["Duration"]."</td>");
     settype($Minutes=(substr($_POST["Time"],-2,2)+substr($row2["Duration"],-5,2)),"integer");
     settype($Hours=substr($_POST["Time"],0,2)+substr($row2["Duration"],0,2)+$Minutes/60,"integer");
     $Hours=Gnrt0s_str($Hours,2);
     $Minutes=Gnrt0s_str($Minutes%60,2);
     $Time=$Hours.":".$Minutes;
     $query="select * from Test where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$_POST["Code"]."%\";";
     if(strcmp($Time,"21:30")>0 || mysql_num_rows(mysql_query($query))==4)
     {print("<td>Day Over</td>");}
     else
     {print("<td>".$Time."</td>");}
     break;
    }
    case 3:
    {
     $x=3;
     $Temp="View Slots";
     print("<td>".$row2["Duration"]."</td>");
     print("<td><select name=\"City_Code\">");
     $result3=mysql_query($City_query);
     while($row3=mysql_fetch_array($result3))
     {
      print("<option value=\"".$row3["City_Code"]."\"");
      if($row3["City_Code"]==$_SESSION["City_Code"])
      {print(" selected");}
      print(">".$row3["City_Name"]."</option>");
     }
     print("</select></td>");
     break;
    }
   }
   print("<td><button type=\"submit\" name=\"Oprtn\" value=".$x);
   if(($Oprtn!=1 && $row2["Release_Date"]>$Today) && ($DoW!=3 && $DoW!=4))
   {print(" disabled");}
   print(">".$Temp."</button></td></form></tr>");
  }
 }
 else
 {print("<tr><td><h4>".$No_Entry."</h4></td></tr>");}
 print("</table>");
 if($Oprtn==3)
 { 
  print("<table border=2>");
  print("<tr><form action=\"Location.php\" method=\"POST\">");
  print("<td><b>View Location Choices for </b></td>");
  print("<td><select name=\"City_Code\">");
  $result2=mysql_query($City_query);
  while($row2=mysql_fetch_array($result2))
  {
   print("<option value=\"".$row2["City_Code"]."\"");
   if($row2["City_Code"]==$_SESSION["City_Code"])
   {print(" selected");}
   print(">".$row2["City_Name"]."</option>");
  }
  print("</select></td>");
  print("<td><button type=\"submit\" name=\"Oprtn\" value=2>View</button></td>");
  print("</form></tr></table>");
 }
 print("<a href=\"ReDirect.php\"><button>Back to home page.</button></a>");
}
mysql_close($connection);
?>
</body>
</html>
