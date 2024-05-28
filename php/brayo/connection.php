<?php
$host = 'localhost';
$db = 'application';
$user = 'root';
$password = 'password';

$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
