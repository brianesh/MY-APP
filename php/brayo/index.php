<?php
session_start();

include("connection.php");
include("functions.php");

$user = check_login($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        container1{
form{
    display: flex;
    flex-direction: column;
  align-items: center;
  border-radius: 100px;
  width: 500px;
  height: 450px;
  background-color: #cddbe2;
  padding: 20px;
  margin-left: 450px;
  
}

input[type=text], input[type=password], input[type=tel],input[type=email]{
    width: 60%;
    padding: 10px;
    margin: 15px;
    display: block;
    border: none;
    background: #b8a3a3;
}
button {
    background-color: #200a53;
    color: white;
    padding: 14px;
    margin: 8px;
    width: 100%;
  }
  links{
    margin-left: 50px;
    padding: 10px;
  }
}
</style>
</head>
<body>
    <div class="container1">
        <?php if ($user): ?>
            <h1>Welcome, <?= htmlspecialchars($user['username']) ?>!</h1>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <h1>Welcome to our website!</h1>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </div>
</body>
</html>
