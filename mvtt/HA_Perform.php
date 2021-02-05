<?php
require("header.php");
session_start();
Session_Status(2);
if(!$_POST["Oprtn"])
{
 session_unregister("ID");
 session_unregister("Login_Type");
 $Message=$Logged_Out;
 session_register("Message");
 $url="Location: Sign_In.php?".session_name()."=".strip_tags(session_id());
}
else
{
 switch($_POST["Choice"])
 {
  case 0:
  {
   $url="Location: Halls.php?K=1&".session_name()."=".strip_tags(session_id());
   break;
  }
  case 1:
  {
   $url="Location: Halls.php?".session_name()."=".strip_tags(session_id());
   break;
  }
  case 2:
  {
   $url="Location: Preferences.php?".session_name()."=".strip_tags(session_id());
   break;
  }
  default:
  {
   $url="Location: ReDirect.php?".session_name()."=".strip_tags(session_id());
   break;
  }
 }
}
header($url);
?>
