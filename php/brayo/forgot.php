<?php

include("connection.php");
include("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $securityQuestion = $_POST["security_question"];
    $securityAnswer = $_POST["security_answer"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    
    if ($newPassword !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "application";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE security_question = '$securityQuestion' AND security_answer = '$securityAnswer'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateSql = "UPDATE users SET password = '$hashedPassword' WHERE security_question = '$securityQuestion' AND security_answer = '$securityAnswer'";
            if ($conn->query($updateSql) === TRUE) {
                $success = "Password reset successfully.";
            } else {
                $error = "Error updating password: " . $conn->error;
            }
        } else {
            $error = "Invalid security question or answer.";
        }

        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESET PASSWORD</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="/js/validation.js" defer></script>
</head>
<body>
    <div class="container3">
    <form action="connection.php" method="post" >
        
        <h1>RESET PASSWORD</h1>
         <div>
            <label for="question">WHAT WAS YOUR SECURITY QUESTION?</label>
            <select>
            <option value="question">What is your mother's maiden name?</option>
            <option value="question">What is the name of your first pet?</option>
            <option value="question">What is the name of the town where you were born?</option>
          </select>
          </div>

          <label for="answer">SECURITY ANSWER</label>
          <input type="text"  placeholder="Security answer">
          <label for="text">PASSWORD</label>
          <input type="text" placeholder="your password">
            <label for="text">CONFIRM PASSWORD</label>
            <input type="text" placeholder="confirm password">

      
        <div class="buttons">
            <button>RESET PASSWORD</button>
        </div>
        <div class="links">
            <a href="index.php">LOGIN</a>
        </div>
    </form>
</div>
</body>
</html>