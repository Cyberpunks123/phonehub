<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "phonehubdbbckupp";

$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

if(!$conn){
    die("Connection Failed" . mysql_connect_error());
}