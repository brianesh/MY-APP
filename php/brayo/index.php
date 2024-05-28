<?php

session_start();

include("connection.php");
include("functions.php");

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="/js/validation.js" defer></script>
</head>
<body>
    <div class="container1">
        <form action="connection.php" onsubmit="return validation()" method="post" name="loginForm">
            <h1>LOGIN PAGE</h1>
            <label for="username">USERNAME</label>
            <input type="text" name="username" placeholder="your USERNAME" id="username">
            <label for="password">PASSWORD</label>
            <input type="password" name="password" placeholder="your password" id="password">
            <label><input type="checkbox" name="remember"> Remember me for 30 days.</label>

            <div class="buttons">
                <button type="submit">LOGIN</button>
            </div>
            <div class="links">
                <a href="register.php">Don't have an account?</a>
                <a href="forgot.php">Forgot password?</a>
            </div>
        </form>
        <script>
            function validation() {
                var username = document.forms["loginForm"]["username"].value;
                var password = document.forms["loginForm"]["password"].value;
                if (username == "" && password == "") {
                    alert("User Name and Password fields are empty");
                    return false;
                } else {
                    if (username == "") {
                        alert("User Name is empty");
                        return false;
                    }
                    if (password == "") {
                        alert("Password field is empty");
                        return false;
                    }
                }
            }
        </script>
    </div>
</body>
</html>
