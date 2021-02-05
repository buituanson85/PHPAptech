<?php
/*
This script is used by Scripts that has to redirect the Varios categories of users to their 
           relevant process page in sequence when the form data entries are coorect and without error
*/
require("header.php");
session_start();
switch($_SESSION["LogIn_Type"])
{
 case 1:
 {
  /* The Main Administrator is directed to his default page that presents the previledges that he is entitled for. */   
  $url="Location: Adm_Home.php?".session_name()."=".strip_tags(session_id());
  break; 
 }
 case 2:
 {
 /* The Hall Administrator is directed to his default page that presents the previledges that he is entitled for. */   
  $url="Location: HA_Home.php?".session_name()."=".strip_tags(session_id());
  break; 
 }
 case 3:
 {
 /* The Ticket Booker is directed to his default page that presents the previledges that he is entitled for. */   
  $url="Location: Ticketer.php?".session_name()."=".strip_tags(session_id());
  break; 
 }
 case 4:
 {
 /* The Normal User is directed to his default page that presents the previledges that he is entitled for. */   
  $url="Location: Usr_Home.php?".session_name()."=".strip_tags(session_id());
  break; 
 }
 default:
 {
 /* Not a Valid user . Hence direct him to the Sign_In page.*/
  $Message=$Error_Illegal_Request;
  session_register("Message");
  $url="Location: Sign_In.php?".session_name()."=".strip_tags(session_id());
  break; 
 }
}
header($url);
?>
