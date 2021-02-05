<?php
/*
 This script is used by the Sign_In.php Script
*/
require("header.php");
$ID=$_POST["ID"];
$PassWord=$_POST["PassWord"];
//session_name($ID);
session_start();
Session_Status(0);
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
/* The ID and Password are set as a global  variable to register as a session variable.*/
if(empty($ID) || empty($PassWord))
{
/* If any of the ID or Password field is left empty and not filled by the User then set error flag.*/
$Error=1;
}
else
{
 /*  When the fields are filled , verify their geniuinity. */
 $query="select * from Usr where ID=\"".strtolower($ID)."\";";
 /*  Query 2 is run only if the User who has logged in is Hall Administrator or a Ticket booker. */
 $query2="select * from Hall where Hall_Code=\"".$ID."\";";
 $result=mysql_query($query);
 $result2=mysql_query($query2);
 if(mysql_num_rows($result))
 {
  $row=mysql_fetch_array($result);
  if($PassWord!=$row["PassWord"])
  {
  /*  Setting Error if the user is not an authenticated one.  */
  $Error=1;
  } 
  else
  {
   $Error=0;
   if($row["ID"]=="administrator")
   {
   /*   Registered User is the Main System Administrator   */   
   $LogIn_Type=1;
   }
   else
   {
   /*    Registered User is the Normal User who can book the tickets.   */      
   $LogIn_Type=4;
   }   
  } 
 }
 elseif(mysql_num_rows($result2))
 {
 /* If the User Id and Password does not match the noraml user
  then to authenticate the Hall Administrator and the Ticket Booker run Query2*/ 
  $row=mysql_fetch_array($result2);
  $Error=0;
  if($PassWord==$row["PassWord"])
  {
   /*    Registered User is the  Hall Administrator. His  Password  is the Hall Code Initially.
              He can  change his Preference after Logging into the system             . */    
       $LogIn_Type=2;
  }
  elseif($PassWord==$row["pwd"])
  {
  /*    Registered User is the Ticket Booker.His  Password  is also  the Hall Code Initially.
          He can  also  change his Preference after Logging into the system           
  */
  $LogIn_Type=3;
  }
  else
  {
   /*  Not a valid Hall  Administrator  or Ticket Booker . Set Error Flag. */       
  $Error=1;
  } 
 }
 else
 {
 /*  None of the   Registered User . Set Error Flag. */       
 $Error=1;
 }  
}
mysql_close($connection);
session_start();
if($Error)
{
 $Message="Sign In Failed.";
 session_register("Message");
 $url="Location: Sign_In.php?".session_name()."=".strip_tags(session_id());
}
else
{
 session_register("ID");
 session_register("LogIn_Type");
 if($LogIn_Type==4)
 {
  $City_Code=$row["City_Code"];
  $Lang_Code=$row["Lang_Code"];
  /* Registering the preference of the Normal user i,e his Language and Location as sessions variable.*/
  session_register("City_Code");
  session_register("Lang_Code");
 }
 $url="Location: ReDirect.php?".session_name()."=".strip_tags(session_id());
}   
header($url);
?>
