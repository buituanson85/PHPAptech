<?php
require("header.php");
session_start();
// Check for the status of the Main Adminstrator.
// Session_Status(1);
require("Flush.php");
?>
<html>
<head>
<meta http-equiv="refresh" content=30>
<title>Select your choices.</title>
<link rel="stylesheet" href="Temp/style.css" type="text/css">
</head>
<body>
<?php
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
<br><h1><marquee>STRICTLY ADMINSTRATOR ONLY</marquee></h1><br>

<form action="Adm_Perform.php" method="POST">
<div align="center">
<br><h2><center>Please select what you would like to do :</center></h2><br>

<h3><br><input type="radio" name="Oprtn" value=0 checked>Add
<input type="radio" name="Oprtn" value=1>Remove<br>
<br><input type="radio" name="Oprtn" value=2>Change Password</h3>

<br><h2><center>Select your choice :</center></h2><br>

<h3><br><input type="radio" name="Type" value=1>City
<input type="radio" name="Type" value=2>Language<br>
<br><input type="radio" name="Type" value=3>Location
<input type="radio" name="Type" value=4>Category<br>
<br><td><input type="radio" name="Type" value=5>Hall
<input type="radio" name="Type" value=6 checked>Movie</h3>

<br><br><button type="submit" name="Target" value=1>Continue</button>
<button type="submit" name="Target" value=0>Log Out</button>
</div>
</form>
</body>
</html>
