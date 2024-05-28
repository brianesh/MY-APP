<?php
session_start(); 
     
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name =  $_POST['user_name'];
    $password =  $_POST['password'];

    if(!empty($user_name) && !empty($password))
    {

        $query ="insert into users (user_id,surname,other_names,username,password,email,mobile_number) values ($user_id,$surname,$other_names,$username,$password,$email,$mobile_number)";

        mysqli_query($conn, $query);

        header ("location: login.php");
        die;
    }else{
        echo"Please enter some valid information!";
        
    }
}

        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP PAGE</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="/js/validation.js" defer></script>
</head>
<body>
   
    <div class="container2">
    <form action="login.php" onsubmit="return validation()" method="post" name="registerForm"></form>
    <h1>SIGN IN YOUR DETAILS</h1>
    <div>
            <label for="text">SURNAME</label>
            <input type="text" placeholder="your surname">
            <label for="text">OTHER NAMES</label>
            <input type="text" placeholder="Other names">
            <label for="text">USERNAME</label>
            <input type="text" placeholder="your username">
            <label for="text">PASSWORD</label>
            <input type="text" placeholder="your password">
            <label for="email">EMAIL</label>
            <input type="email" placeholder="your email">
            <label for="tel">MOBILE NUMBER</label>
            <input type="tel" placeholder="your mobile number">
            </div>
            <div>
             <p>Choose your security question.</p>
          <select name="question" id="question">
            <option value="question">What is your mother's maiden name?<option>
            <option value="question">What is the name of your first pet?</option>
            <option value="question">What is the name of the town where you were born?</option>
          </select>
          </div>
          <div>
          <label for="answer">SECURITY ANSWER</label>
          <input type="text" id="security_answer" name="security_answer" placeholder="Security answer">
          </div>
        
        <div class="buttons">
            <button>SIGN UP</button>
        </div>
        <div class="links">
            <a href="index.php">Already have an account?</a>
           
        </div>
    </form>
</div>
</body>
</html>