<?php
require("header.php");
session_start();
Session_status(1);
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$Before=" Each of them must be removed before performing requested operation.";
switch($_POST["Type"])
{
 case 1:
 {
  /* Wants to remove a City which is possible only if there is no locations in that City.*/
  if(isset($_POST["City_Code"]))
  {
   $City_Code=$_POST["City_Code"];
   $query="select * from City where City_Code=\"".$City_Code."\";";
   $row=mysql_fetch_array(mysql_query($query));
   $City_Name=$row["City_Name"];
   $query="select * from Location where Lctn_Code like \"".$City_Code."%\";";
   if($n=mysql_num_rows(mysql_query($query)))
   {$Message=$City_Name." holds ".$n." Locations currently.".$Before;}
   else
   {$query="delete from City where City_Code=\"".$City_Code."\";";}
  }
  else
  {$Message=$Illegal_Actn;}
  break;
 }
 case 2:
 {
  /* Wants to remove a  Language which is possible only if there is no movie released  in that particular Language..*/
  if(isset($_POST["Lang_Code"]))  
  {
   $Lang_Code=$_POST["Lang_Code"];
   $query="select * from Language where Lang_Code=\"".$Lang_Code."\";";
   $row=mysql_fetch_array(mysql_query($query));
   $Lang_Name=$row["Lang_Name"];
   $query="select * from Movie where Movie_Code like \"".$Lang_Code."%\";";
   if($n=mysql_num_rows(mysql_query($query)))
   {$Message=$n." ".$Lang_Name." Movies currently inserted.".$Before;}
   else
   {$query="delete from Language where Lang_Code=\"".$Lang_Code."\";";}
  }
  else
  {$Message=$Illegal_Actn;}
  break;
 }
 case 3:
 {
 /* To remove a Location . It is possible  only if no halls are currently present in that Location.*/
  if(isset($_POST["Lctn_Code"]))
  {
   $Lctn_Code=$_POST["Lctn_Code"];
   $query="select * from Location where Lctn_Code=\"".$Lctn_Code."\";";
   $row=mysql_fetch_array(mysql_query($query));
   $Lctn_Name=$row["Lctn_Name"];
   $query="select * from Hall where Hall_Code like \"".$Lctn_Code."%\";";
   if($n=mysql_num_rows(mysql_query($query)))
   {$Message=$Lctn_Name." holds ".$n." Halls currently.".$Before;}
   else
   {$query="delete from Location where Lctn_Code=\"".$Lctn_Code."\";";}
  }
  else
  {$Message=$Illegal_Actn;}
  break;
 }
 case 4:
 {
 /* To remove a Category . If no movie belongs to that category then that category can be removed.*/
  if(isset($_POST["Ctry_Code"]))
  {
   $Ctry_Code=$_POST["Ctry_Code"];
   $query="select * from where Ctry_Code=\"".$Ctry_Code."\";";
   $row=mysql_fetch_array(mysql_query($query));
   $Ctry_Name=$row["Ctry_Name"];
   $query="select * from Movie where Movie_Code like \"%".$Ctry_Code."%\";";
   if($n=mysql_num_rows(mysql_query($query)))
   {$Message=$n." ".$Ctry_Name." Movies currently inserted.".$Before;}
   else
   {$query="delete from Category where Ctry_Code=\"".$Ctry_Code."\";";}
  }
  else
  {$Message=$Illegal_Actn;}
  break;
 }
 case 5:
 {
 /* To remove a hall. A hall can hold as muchas 10 halls under it. If none of the Halls are
          under it only hten this Hall can be removed. */
  if(isset($_POST["Hall_Code"]))
  {
   $Hall_Code=$_POST["Hall_Code"];
   $query="select * from Hall where Hall_Code=\"".$Hall_Code."\";";
   $row=mysql_fetch_array(mysql_query($query));
   $Hall_Name=$row["Hall_Name"];
   $query="select * from Halls where Hall_Code=\"".$Hall_Code."\";";
   if($n=mysql_num_rows(mysql_query($query)))
   {$Message=$Hall_Name." holds ".$n." Halls currently.".$Before;}
   else
   {$query="delete from Hall where Hall_Code=\"".$Hall_Code."\";";}
  }
  else
  {$Message=$Illegal_Actn;}
  break;
 }
 case 6:
 {
 /* To Remove  a movie . If no Particular slot is playing that movie then only can the movie be removed .*/
  if(isset($_POST["Movie_Code"]))
  {
   $Movie_Code=$_POST["Movie_Code"];
   $query="select * from Movie where Movie_Code=\"".$Movie_Code."\";";
   $row=mysql_fetch_array(mysql_query($query));
   $Movie_Name=$row["Movie_Name"];
   $query="select * from Slot where Movie_Code=\"".$Movie_Code."\";";
   if($n=mysql_num_rows(mysql_query($query)))
   {$Message=$n." slots currently playing ".$Movie_Name.".".$Before;}
   else
   {$query="delete from Movie where Movie_Code=\"".$Movie_Code."\";";}
  }
  else
  {$Message=$Illegal_Actn;}
  break;
 }
 default:
 {
  $Message=$Illegal_Actn;
  break;
 }
}
if(!isset($Message))
{
 if(mysql_query($query))
 {$Message=$Row[$_POST["Type"]-1]." successfully removed.";}
 else
 {$Message="Removal of ".$Row[$_POST["Type"]-1]." failed. Please Check.";}
}
session_register("Message");
header("Location: Adm_Home.php?".session_name()."=".strip_tags(session_id()));
?>
