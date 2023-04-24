<?php
$serverName = "localhost";
$accountName = "root";
$password = "";
$dbName = "sala";

$conn = mysqli_connect($serverName,$accountName,$password,$dbName);

if(!$conn)
{
    die("Couldn't connect to database");
}
?>