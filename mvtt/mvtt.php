<html>
<head><title>MySQL mvtt Schema creation report.</title></head>
<body>
<?php
require("header.php");
$row["Ticket"]="create table Ticket(Tkt_Code varchar(10) primary key,ID varchar(25) not null,Date date not null,Hall_Code varchar(9) not null,Slot_Code varchar(3) not null,Tkt_Sts tinyint not null,foreign key(ID) references Usr(ID),foreign key(Hall_Code,Slot_Code,Date) references Rmndr(Hall_Code,Slot_Code,Date));";
$row["Rmndr"]="create table Rmndr(Hall_Code varchar(9) not null,Slot_Code varchar(3) not null,Date date not null,Rmndr_Sts tinyint not null,primary key(Hall_Code,Slot_Code,Date),foreign key(Hall_Code,Slot_Code) references Slot(Hall_Code,Slot_Code));";
$row["Slot"]="create table Slot(Hall_Code varchar(9) not null,Slot_Code varchar(3) not null,Slot_Date date not null,Slot_Time time not null,Movie_Code varchar(9) not null,primary key(Hall_Code,Slot_Code),foreign key(Hall_Code) references Hall(Hall_Code),foreign key(Movie_Code) references Movie(Movie_Code));";
$row["Test"]="create table Test(Hall_Code varchar(9) not null,Slot_Code varchar(3) not null,Slot_Date date not null,Slot_Time time not null,Movie_Code varchar(9) not null,primary key(Hall_Code,Slot_Code),foreign key(Hall_Code) references Hall(Hall_Code),foreign key(Movie_Code) references Movie(Movie_Code));";
$row["Halls"]="create table Halls(Hall_Code varchar(9) not null,Code varchar(1) not null,Sts_Avlbl tinyint not null,PPS smallint not null,primary key(Hall_Code,Code),foreign key(Hall_Code) references Hall(Hall_Code));";
$row["Hall"]="create table Hall(Hall_Code varchar(9) primary key,Hall_Name varchar(50) not null,PassWord varchar(25) not null,pwd varchar(25) not null);";
$row["Movie"]="create table Movie(Movie_Code varchar(9) primary key,Movie_Name varchar(50) unique not null,Duration time not null,Release_Date date not null);";
$row["Usr"]="create table Usr(ID varchar(25) primary key,Name varchar(50) not null,PassWord varchar(25) not null,City_Code varchar(3),Lang_Code varchar(3),Expenses smallint not null,foreign key(City_Code) references City(City_Code),foreign key(Lang_Code) references Language(Lang_Code));";
$row["Category"]="create table Category(Ctry_Code varchar(3) primary key,Ctry_Name varchar(25) unique not null);";
$row["Location"]="create table Location(Lctn_Code varchar(6) primary key,Lctn_Name varchar(25)not null);";
$row["Language"]="create table Language(Lang_Code varchar(3) primary key,Lang_Name varchar(25) unique not null);";
$row["City"]="create table City(City_Code varchar(3) primary key,City_Name varchar(25) unique not null);";
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$query="create database ".$MySQL_DataBase;
$result=mysql_query($query);
print("<h1>");
if($result)
{print(" Database ".$MySQL_DataBase." created successfully. ");}
else
{print(" Database ".$MySQL_DataBase." creation failed. ");}
print("</h1><br> \n");
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
foreach($row as $key=>$value)
{
 $result=mysql_query($value);
 print("<h3>");
 if($result)
 {print(" Table ".$key." created successfully. ");}
 else
 {print(" Table ".$key." creation failed. ");}
 print("</h3><br> \n");
}
?>
</body>
</html>
