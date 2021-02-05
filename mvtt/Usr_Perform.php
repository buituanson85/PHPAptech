<?php
require("header.php");
session_start();
Session_Status(4);
if(!$_POST["Oprtn"])
{
 session_unregister("ID");
 session_unregister("Login_Type");
 session_unregister("City_Code");
 session_unregister("Lang_Code");
 $Message=$Logged_Out;
 session_register("Message");
 $url="Location: Sign_In.php?".session_name()."=".strip_tags(session_id());
}
else
{
 switch($_POST["Choice"])
 {
  case 1:
  {
   $url="Location: Category.php?K=1&Lang_Code=".$_POST["Lang_Code"]."&".session_name()."=".strip_tags(session_id());
   break;
  }
  case 2:
  {
   $url="Location: Location.php?K=1&City_Code=".$_POST["City_Code"]."&".session_name()."=".strip_tags(session_id());
   break;
  }
  case 3:
  {
   $url="Location: Change.php?".session_name()."=".strip_tags(session_id());
   break;
  }
  case 4:
  {
   $url="Location: Preferences.php?".session_name()."=".strip_tags(session_id())."&Chng_pwd=".$_POST["Chng_pwd"];
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
