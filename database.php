<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbNmae = "students-data";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbNmae);
if(!$conn)
{
    die("something went wrong");
}
