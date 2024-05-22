<?php
require_once 'User.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $user = new User(null, null, null, null); 
    if ($user->register($username, $email, $password)) {
        
        echo "Registration successful";
    } else {
        echo "Registration failed";
    }
}
?>
