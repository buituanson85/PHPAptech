<?php

$MySQL_Host="localhost";
$MySQL_User="root";
$MySQL_PassWord="nopassword";
//$MySQL_PassWord="mysql";
//$MySQL_DataBase="mvtt";
$MySQL_DataBase="tester";

$Error_MySQL_Server="<h1>Error Connecting to MySQL Server.</h1>";
$Error_MySQL_DataBase="<h1>Error Connecting to MySQL DataBase.</h1>";
$Error_Illegal_Request="<h1>Access Denied.<br>You are not currently logged in.<br>Please Log in and proceed.</h1>";
$Illegal_Actn="Illegal Action requested.";
$No_Entry="No Matching Entries Found for request.";
$Logged_Out="You have successfully logged out.Please return soon.";

$P_Name_Pattern="^([:alnum:])(^[;-'\"()_<>=]{4,})$";
$Name_Pattern="^([:alpha:])([[:alpha:]\. ]{5,})$";
$Hall_Code_Pattern="^(C|c)([:digit:]]{2})(L|l)([:digit:]]{2})(H|h)([:digit:]]{2})$";
$ID_Pattern="^([:alpha:])([[:alnum:]|_]{5,})$";
$PassWord_Pattern="^([:alpha:])([:alnum:]{5,})";

$City_query="select * from City order by City_Name";
$Language_query="select * from Language order by Lang_Name";
$Location_query="select * from Location order by Lctn_Code";
$Category_query="select * from Category order by Ctry_Name";
$City_query_n="select * from City order by City_Code";
$Language_query_n="select * from Language order by Lang_Code";
$Location_query_n="select * from Location order by Lctn_Code";
$Category_query_n="select * from Category order by Ctry_Code";
$Row=array("City","Language","Location","Category","Hall","Movie");

$Today=date("Y-m-d");
$Time=strftime("%H:%M").":00";
//DoW-> Day of the Week
settype($DoW=strftime("%w"),"integer");
//DoM-> Day of the Month
settype($DoM=strftime("%d"),"integer");

function Gnrt0s_str($number,$max_digits,$prefix="",$increment=0)
{
 for($increment?$t=++$number:$t=$number,$t?$i=0:$i=1;$t;$t=(($t-$t%10)/10),$i++);
 if($i>$max_digits)
 {
  return $increment?--$number:$number;
 }
 else
 {
  for($i=$max_digits-$i;$i;$i--,$prefix.="0");
  return $prefix.$number;
 }
}

function Session_Status($Status)
{
 $result=session_is_registered("ID");
 if($result && $Status!=$_SESSION["LogIn_Type"])
 {
  $Message=$Illegal_Actn;
  session_register("Message");
  $url="Location: ReDirect.php?".session_name()."=".strip_tags(session_id());
 }
 elseif($Status && !$result)
 {
  $Message=$Error_Illegal_Request;
  session_register("Message");
  $url="Location: Sign_In.php?".session_name()."=".strip_tags(session_id());
 }
 if(isset($url))
 {header($url);}
}

/*
function Session_Status($Status)
{
 $result=session_is_registered("LogIn_Type");
 if($result && $Status!=$_SESSION["LogIn_Type"])
 {
  $Message=$Illegal_Actn;
  session_register("Message");
  $url="Location: ReDirect.php?".session_name()."=".strip_tags(session_id());
 }
 elseif($Status && !$result)
 {
  $Message=$Error_Illegal_Request;
  session_register("Message");
  $url="Location: Sign_In.php?".session_name()."=".strip_tags(session_id());
 }
 if(isset($url))
 {header($url);}
 else
 {return TRUE;}
}
*/
?>
