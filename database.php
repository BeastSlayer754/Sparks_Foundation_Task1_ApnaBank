<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "apnabank";

$connection =  mysqli_connect($servername,$username,$password,$database);
if(!$connection)
{
	echo("Connection Failed".mysqli_connect_error());
}
else
{
	//echo("Connected Successfully");
}
?>