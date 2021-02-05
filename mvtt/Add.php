<?php
require("header.php");
session_start();
Session_Status(1);
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$i=0;
switch($_POST["Type"])
{
 case 1:
 {
  /* City */
  $result=mysql_query($City_query_n);
  while($row=mysql_fetch_array($result))
  {
   $Temp=substr($row["City_Code"],-2,2);
   /* Extracting last three characters of the code */
   settype($Temp,"integer");
   if($Temp>$i) 
   {break;}
   $i++;
  }
  /*  City Code is generated . ith value is the value of the code.*/
  $Temp=Gnrt0s_str($i,2,"C");
  $query="insert into City(City_Code,City_Name) values(\"".$Temp."\",\"".strtoupper($_POST["Temp"])."\");";
  break;
 }
 case 2:
 {
  $result=mysql_query($Language_query_n);
  /* Adding a Language */
  while($row=mysql_fetch_array($result))
  {
   $Temp=substr($row["Lang_Code"],-2,2);
   settype($Temp,"integer");
   if($Temp>$i) 
   {break;}
   $i++;
  }
  $Temp=Gnrt0s_str($i,2,"L");
  $query="insert into Language(Lang_Code,Lang_Name) values(\"".$Temp."\",\"".strtoupper($_POST["Temp"])."\");";
  break;
 }
 case 3:
 {
 /* To add a New  Location */
  $xquery="select * from City where City_Code=\"".$_POST["City_Code"]."\";";
  if(isset($_POST["City_Code"]) && mysql_num_rows(mysql_query($xquery)))
  {
   $query="select * from Location where Lctn_Code like \"".$_POST["City_Code"]."%\" order by Lctn_Code;";
   $result=mysql_query($query);
   while($row=mysql_fetch_array($result)) 
   {
    $Temp=substr($row["Lctn_Code"],-2,2);
    settype($Temp,"integer");
    if($Temp>$i) 
    {break;}
    $i++;
   }
   /*  Generating Location code incorporating the city code along with it.*/
   $Temp=Gnrt0s_str($i,2,$_POST["City_Code"]."L");
   $query="insert into Location(Lctn_Code,Lctn_Name) values(\"".$Temp."\",\"".strtoupper($_POST["Temp"])."\");";
  }
  else
  {
   /* If city code is not passed as a form data or no city to which the location could b added */
   $Message=$Illegal_Actn;
  }
  break;
 }
 case 4:
 {
  /* Adding a new Category */
  $result=mysql_query($Category_query_n);
  while($row=mysql_fetch_array($result))
  {
   $Temp=substr($row["Ctry_Code"],-2,2);
   settype($Temp,"integer"); 
   if($Temp>$i) 
   {break;}
   $i++;
  }
  $Temp=Gnrt0s_str($i,2,"C");
  $query="insert into Category(Ctry_Code,Ctry_Name) values(\"".$Temp."\",\"".strtoupper($_POST["Temp"])."\");";
  break;
 }
 case 5:
 {
 /* Adding a new Hall */
  $xquery="select * from Location where Lctn_Code=\"".$_POST["Lctn_Code"]."\";";
  if(isset($_POST["Lctn_Code"]) && mysql_num_rows(mysql_query($xquery)))
  {
   $query="select * from Hall where Hall_Code like \"".$_POST["Lctn_Code"]."%\" order by Hall_Code;";
   $result=mysql_query($query);
   while($row=mysql_fetch_array($result))
   {
    $Temp=substr($row["Hall_Code"],-2,2);
    settype($Temp,"integer");
    if($Temp>$i) 
    {break;}
    $i++;
   }
   /* Append the Hall code along with the location code */
   $Temp=Gnrt0s_str($i,2,$_POST["Lctn_Code"]."H");
   $query="insert into Hall(Hall_Code,Hall_Name,PassWord,pwd) values(\"".$Temp."\",\"".strtoupper($_POST["Temp"])."\",\"".strtoupper($Temp)."\",\"".strtolower($Temp)."\");";
  }
  else
  {
  /* If Location  code is not passed as a form data or no such  location exist   */
   $Message=$Illegal_Actn;
  }
  break;
 } 
 case 6:
 {
  /* To add a movie  , we need the Category of the movie as well as the Language of the movie .*/
  $xquery="select * from Language where Lang_Code=\"".$_POST["Lang_Code"]."\";";
  $yquery="select * from Category where Ctry_Code=\"".$_POST["Ctry_Code"]."\";";
  $m=mysql_num_rows(mysql_query($xquery));
  $n=mysql_num_rows(mysql_query($yquery));
  if(($m && $n) && (isset($_POST["Lang_Code"]) && isset($_POST["Ctry_Code"])))
  {
   $query="select * from Movie where Movie_Code like \"".$_POST["Lang_Code"].$_POST["Ctry_Code"]."%\" order by Movie_Code;";
   $result=mysql_query($query);
   while($row=mysql_fetch_array($result))
   {
    $Temp=substr($row["Movie_Code"],-2,2);
    settype($Temp,"integer");
    if($Temp>$i) 
    {break;}
    $i++;
   }
   /* Appending the category code and the language code to the movie code */
   $Temp=Gnrt0s_str($i,2,$_POST["Lang_Code"].$_POST["Ctry_Code"]."M");
   $query="insert into Movie(Movie_Code,Movie_Name,Duration,Release_Date) values(\"".$Temp."\",\"".strtoupper($_POST["Temp"])."\",\"".$_POST["Time"]."\",\"".$_POST["Date"]."\");";
  } 
  else
  {
  /* If no such Language or Category exist and if Language or category code values or not sent as a form data */
   $Message=$Illegal_Actn;
  }
  break;
 }
 default:
 {
  $Message=$Illegal_Actn;
  break;
 }
}//  end of switch case.
if(!isset($Message))
{
 if(mysql_query($query))
 {
  $Message="New ".$Row[$_POST["Type"]-1]." ";
  if($_POST["Type"]==5)
  {$Message.=$Temp;}
  $Message.=" successfully added.";
 }
 else
 {$Message="Adding of new ".$Row[$_POST["Type"]-1]." failed. Please Check Values.";}
}
session_register("Message");
header("Location: Adm_Home.php?".session_name()."=".strip_tags(session_id()));
?>
