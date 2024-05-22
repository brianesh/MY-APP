<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $securityQuestion = $_POST["security_question"];
    $securityAnswer = $_POST["security_answer"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    
    if ($newPassword !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "database_name";

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