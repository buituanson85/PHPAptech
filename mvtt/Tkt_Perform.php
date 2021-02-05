<?php
require("header.php");
session_start();
Session_Status(3);
if(!$_POST["Oprtn"])
{
 session_unregister("ID");
 session_unregister("Login_Type");
 if($Time<"08:00:00" || $Time>"21:00:00")
 {$Message="Your Account has time restrictions which prevent you from logging in before 08:00 and after 21:00.";}
 else
 {$Message=$Logged_Out;}
 session_register("Message");
 $url="Location: Sign_In.php?".session_name()."=".strip_tags(session_id());
}
else
{$url="Location: Reserve.php?&Tkt_Code=".$_POST["Tkt_Code"]."&".session_name()."=".strip_tags(session_id());}
header($url);
?>
