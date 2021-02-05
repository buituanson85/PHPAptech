<?php
require("header.php");
session_start();
Session_Status(1);
require("Flush.php");
if(!$_POST["Target"])
{
 session_unregister("ID");
 session_unregister("Login_Type");
 $Message=$Logged_Out;
 session_register("Message");
 $url="Location: Sign_In.php?".session_name()."=".strip_tags(session_id());
 header($url);
}
elseif($_POST["Oprtn"]==2)
//If Administrator wants to Change Password, then redirect him to the relevant page.
{$url="Location: Preferences.php?".session_name()."=".strip_tags(session_id());}
elseif(!$_POST["Oprtn"] && $_POST["Type"]!=5)
//Add Anything  except for Halls
{$Target="Add.php";}
elseif((!$_POST["Oprtn"] || ($_POST["Oprtn"]) && $_POST["Type"]==3))
//If a City has to be added or Removed
{$Target="City.php";}
elseif($_POST["Type"]!=5 && $_POST["Type"]!=6)
//Remove anything except for Halls and Movie
{$Target="Remove.php";}
elseif($_POST["Type"]==5)
//To remove a Hall
{$Target="Location.php";}
else
//Remove a category
{$Target="Category.php";}
?>
<html>
<head>
<meta http-equiv=\"refresh\" content=30>
<title>Administrator Function Form.</title>
</head>
<body bgcolor="Darkblue" text="Lightpink">
<br><br>
<?php
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
if(session_is_registered("Error"))
{
 print("<h3>".$_SESSION["Error"]."</h3>");
 session_unregister("Error");
}
if(session_is_registered("Message"))
{
 print("<h3>".$_SESSION["Message"]."</h3>");
 session_unregister("Message");
}
?>
<div align="center">
<table bgcolor="Darkred" border=2 cellpadding=3 cellspacing=3 bordercolordark="firebrick" bordercolorlight="lavender">
<?php
print("<form action=\"".$Target."\" method=\"POST\">");
if(!$_POST["Oprtn"])
{
 print("<tr><td>Enter the City to be added :</td> ");
 print("<td><input type=\"text\" name=\"Temp\" size=25 maxlength=20");
 if($_POST["Type"]!=1)
 {print(" disabled ");}
 print("></td></tr>");
 print("<tr><td>Enter the Language to be added : </td>");
 print("<td><input type=\"text\" name=\"Temp\" size=25 maxlength=20");
 if($_POST["Type"]!=2)
 {print(" disabled");}
 print("></td></tr>");
 print("<tr><td>Choose the City the new Location belongs to : </td>");
 print("<td><select name=\"City_Code\"");
 if($_POST["Type"]!=3)
 {print(" disabled");}
 print(">");
 $result=mysql_query($City_query);
 while($row=(mysql_fetch_array($result)))
 {print("<option value=\"".$row["City_Code"]."\">".$row["City_Name"]."</option>");}
 print("</select></td></tr>");
 print("<tr><td>Enter the Location to be added :</td> ");
 print("<td><input type=\"text\" name=\"Temp\" size=25 maxlength=20");
 if($_POST["Type"]!=3)
 {print(" disabled");}
 print("></td></tr>");
 print("<tr><td>Enter the Category to be added :</td> ");
 print("<td><input type=\"text\" name=\"Temp\" size=25 maxlength=20");
 if($_POST["Type"]!=4)
 {print(" disabled");}
 print("></td>");
 print("<td><input type=\"hidden\" name=\"Oprtn\" value=1 " );
 if($_POST["Type"]!=5)
 {print(" disabled");}
 print("></td></tr>");
 print("<tr><td>Choose the City the new Hall belongs to : </td>");
 print("<td><select name=\"City_Code\"");
 if($_POST["Type"]!=5)
 {print(" disabled");}
 print(">");
 $result=mysql_query($City_query);
 while($row=(mysql_fetch_array($result))) 
 {print("<option value=\"".$row["City_Code"]."\">".$row["City_Name"]."</option>");}
 print("</select></td></tr>");
 print("<tr><td>Enter the Hall to be added : </td>");
 print("<td><input type=\"text\" name=\"Temp\" size=50 maxlength=25");
 if($_POST["Type"]!=5)
 {print(" disabled");}
 print("></td></tr>");
 print("<tr><td>Choose the Language of the new Movie :</td> ");
 print("<td><select name=\"Lang_Code\"");
 if($_POST["Type"]!=6)
 {print(" disabled");}
 print(">");
 $result=mysql_query($Language_query);
 while($row=(mysql_fetch_array($result)))
 {print("<option value=\"".$row["Lang_Code"]."\">".$row["Lang_Name"]."</option>");}
 print("</select></td></tr>");
 print("<tr><td>Choose the Category of the new Movie :</td> ");
 print("<td><select name=\"Ctry_Code\"");
 if($_POST["Type"]!=6)
 {print(" disabled");}
 print(">");
 $result=mysql_query($Category_query);
 while($row=(mysql_fetch_array($result)))
 {print("<option value=\"".$row["Ctry_Code"]."\">".$row["Ctry_Name"]."</option>");}
 print("</select></td></tr>");
 print("<tr><td>Enter the Movie to be added : </td>");
 print("<td><input type=\"text\" name=\"Temp\" size=50 maxlength=25");
 if($_POST["Type"]!=6)
 {print(" disabled");}
 print("></td></tr>");
 print("<tr><td>Enter the Movie's Duration :</td> ");
 print("<td><select name=\"Time\"");
 if($_POST["Type"]!=6)
 {print(" disabled");}
 print(">");
 for($i=(1.5*3600);$i<(4*3600);$i+=600)
 {
  $Time=gmstrftime("%H:%M",$i);
  print("<option value=\"".$Time.":00\">".$Time."</option>");
 }
 print("</select></td></tr>");
 if($DoW>=5)
 /* If Day of the week is Friday or Saturday*/
 {$DoM+=(7-($DoW-5));}
 else//if($DoW<=2)
 {$DoM+=(5-$DoW);}// to release a movie on friday , if it has been added before frday.
 /*
 else
 {$DoM+=(5-$DoW)+7;}
 */
 $TS=mktime(0,0,0,strftime("%m"),$DoM);
 $Date=date("Y-m-d",$TS);
 print("<tr><td><input type=\"hidden\" name=\"Date\" value=\"".$Date."\"");
 if($_POST["Type"]!=6)
 {print(" disabled");}
 print("></td></tr>");
}
else
{
 /* Operation Choosen is Removal */
 print("<tr><td>Choose the City to be removed :</td>");
 print("<td><select name=\"City_Code\"");
 if($_POST["Type"]!=1)
 {print(" disabled");}
 print(">");
 $result=mysql_query($City_query);
 while($row=(mysql_fetch_array($result)))
 {print("<option value=\"".$row["City_Code"]."\">".$row["City_Name"]."</option>");}
 print("</select></td></tr>");
 print("<tr><td>Choose the Language to be removed :</td>");
 print("<td><select name=\"Lang_Code\"");
 if($_POST["Type"]!=2)
 {print(" disabled");}
 print(">");
 $result=mysql_query($Language_query);
 while($row=(mysql_fetch_array($result)))
 {print("<option value=\"".$row["Lang_Code"]."\">".$row["Lang_Name"]."</option>");}
 print("</select></td>");
 print("<td><input type=\"hidden\" name=\"Oprtn\" value=2");
 if($_POST["Type"]!=3)
 {print(" disabled");}
 print("></td></tr>");
 print("<tr><td>Choose the City from which a Location has to be removed :</td>");
 print("<td><select name=\"City_Code\"");
 if($_POST["Type"]!=3)
 {print(" disabled");}
 print(">");
 $result=mysql_query($City_query);
 while($row=(mysql_fetch_array($result)))
 {print("<option value=\"".$row["City_Code"]."\">".$row["City_Name"]."</option>");}
 print("</select></td></tr>");
 print("<tr><td>Choose the Category to be removed :</td>");
 print("<td><select name=\"Ctry_Code\"");
 if($_POST["Type"]!=4)
 {print(" disabled");}
 print(">");
 $result=mysql_query($Category_query);
 while($row=(mysql_fetch_array($result)))
 {print("<option value=\"".$row["Ctry_Code"]."\">".$row["Ctry_Name"]."</option>");}
 print("</select></td>");
 print("<td><input type=\"hidden\" name=\"Oprtn\" value=1");
 if($_POST["Type"]!=5)
 {print(" disabled");}
 print("></td></tr>");
 print("<tr><td>Choose the City from which a Hall has to be removed :</td>");
 print("<td><select name=\"City_Code\"");
 if($_POST["Type"]!=5)
 {print(" disabled");}
 print(">");
 $result=mysql_query($City_query);
 while($row=(mysql_fetch_array($result)))
 {print("<option value=\"".$row["City_Code"]."\">".$row["City_Name"]."</option>");}
 print("</select></td>");
 print("<td><input type=\"hidden\" name=\"Oprtn\" value=1");
 if($_POST["Type"]!=6)
 {print(" disabled");}
 print("></td></tr>");
 print("<tr><td>Choose the Language from which a Movie has to be removed :</td>");
 print("<td><select name=\"Lang_Code\"");
 if($_POST["Type"]!=6)
 {print(" disabled");}
 print(">");
 $result=mysql_query($Language_query);
 while($row=(mysql_fetch_array($result)))
 {print("<option value=\"".$row["Lang_Code"]."\">".$row["Lang_Name"]."</option>");}
 print("</select></td></tr>");
}
print("<tr><td colspan=2><center><button type=\"submit\" name=\"Type\" value=".$_POST["Type"].">");
if(!$_POST["Oprtn"])
{print("Add");}
else
{print("Remove");}
print("</button></center></td></tr></form>");
mysql_close($connection);
?>
</table>
<a href="Adm_Home.php"><button>Administrator Home Page</button></a>
</div>
</body>
</html>
