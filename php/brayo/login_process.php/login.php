<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST["username"];
    $password = $_POST["password"];

   
    $servername = "localhost";
    $db_username = "username";
    $db_password = "password";
    $dbname = "database_name";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            
            header("Location: login_success.php");
            exit();
        } else {
            
            header("Location: login_failed.php");
            exit();
        }
    } else {

        header("Location: login_failed.php");
        exit();
    }
}
$conn->close();
