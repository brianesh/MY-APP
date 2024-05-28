<?php
$dbhost ="localhost";
$dbuser = "root";
$dbpass = "password";
$dbname = "application";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if($conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname));
{
    die("failed to connect!");
}
