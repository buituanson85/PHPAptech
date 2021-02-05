<?php
/*
This Script  is used by both the preference.php and Sign_Up.php script.
Preference.php Tries to change the password for a Hall Administrator or a Ticket booker.
*/
require("header.php");
session_start();
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$ID=$_POST["ID"];
$Name=$_POST["Name"];
$PassWord=$_POST["PassWord"];
$Cnfm_PassWord=$_POST["Cnfm_PassWord"];
if(isset($_POST["PassWord"]) && ($PassWord!=$Cnfm_PassWord || empty($PassWord)))
{
/* When the Password is empty or Password and confirm password dont match  set error message.*/
 $Error="Password Mismatch or No Password Set.";
}
elseif(session_is_registered("LogIn_Type"))
{
/* When the Login Type is a registered Session variable */
 if($_SESSION["LogIn_Type"]!=2)
 {
 /* Update the Usr table with  user password and ID  */
  $pwd_query="update Usr set PassWord=\"".$PassWord."\" where ID=\"".$_SESSION["ID"]."\";";
  if($_SESSION["LogIn_Type"]==4)
  {
   $City_Code=$_POST["City_Code"];
   $Lang_Code=$_POST["Lang_Code"];
   /* For a Normal  User His Language and Location Preference has to be  registered as a sessions variable */
   $query="update Usr set City_Code=\"".$City_Code."\",Lang_Code=\"".$Lang_Code."\" where ID=\"".$_SESSION["ID"]."\";";
   mysql_query($query);
   $_SESSION["City_Code"]=$_POST["City_Code"];
   $_SESSION["Lang_Code"]=$_POST["Lang_Code"];
  }
 }
 else
 {
  $query="select * from Hall where Hall_Code=\"".$_SESSION["ID"]."\";";
  $row=mysql_fetch_array(mysql_query($query));
  if(!$_POST["Type"])
  {
  /*  Changing the Password for the Hall administrator and test holds the Ticket counter Password.
  Type is a form data sent by the preference.php script.*/
   $test=$row["pwd"];
   $pwd_query="update Hall set PassWord=\"".$PassWord."\" where Hall_Code=\"".$_SESSION["ID"]."\";";
  }
  else
  {
  /*  Changing the Ticket Booker Password and test holds Hall  Administrator Password.*/
   $test=$row["PassWord"];
   $pwd_query="update Hall set pwd=\"".$PassWord."\" where Hall_Code=\"".$_SESSION["ID"]."\";";
  }
  if($test==$PassWord)
  {
  /*  cross checking the Ticket Booker   Password  when changed does not match the Hall Administrator Password*/
   $Error="Cannot set the same passwords for both category of users. Please change the password.";
  }
 }
}
elseif(empty($ID) || empty($Name))
{
 $Error="User Name or User ID not set.";
}
if(!isset($Error))
{
/* When no error message is set */
 if(!session_is_registered("LogIn_Type"))
 {
 /* When Login Type is not a registered session variable  */
  $query="insert into Usr(ID,Name,PassWord,City_Code,Lang_Code) values(\"".strtolower($ID)."\",\"".$Name."\",\"".$PassWord."\",\"".$_POST["City_Code"]."\",\"".$_POST["Lang_Code"]."\");";
  if(!mysql_query($query))
  {
  /* Query Failed as it doesnot satisfy the Not null or uniqueness Constraint */
   $Error="Sorry. Your request could not be completed. Please select a different User ID & Proceed.";
  } 
 }
 elseif(isset($_POST["PassWord"]))
 {
 mysql_query($pwd_query);
 }
}
mysql_close($connection);
session_start();
if(isset($Error))
{
 session_register("Error");
 if(session_is_registered("LogIn_Type"))
 {
     $url="Location: Preferences.php?".session_name()."=".strip_tags(session_id())."&Chng_pwd=1";
 }
 else
 {
    /* Redirect to Change Preference page . Since some error has been reported,
                            the user has to set all the fields appropriately.
      */

  $url="Location: Sign_Up.php?".session_name()."=".strip_tags(session_id());
 }
}
elseif(!session_is_registered("LogIn_Type"))
{
 /* User Has Registered inot the system for the first time */
  $Message="New Account Created. Welcome User. Please proceed with log in."; 
 session_register("Message");
 $url="Location: Sign_In.php?".session_name()."=".strip_tags(session_id());
}
else
{
 /* change of preference has been successful */
 $Message="Updation Complete. Please Verify."; 
 session_register("Message");
 $url="Location: ReDirect.php?".session_name()."=".strip_tags(session_id());
}   
header($url);
?>
