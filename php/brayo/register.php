<?php
session_start(); // Start the session for user authentication
     
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
    <div class="container2"><h1>SIGN IN YOUR DETAILS</h1>
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
             <p>Choose your security question.</p>
          <select name="question" id="question">
            <option value="question">What is your mother's maiden name?<option>
            <option value="question">What is the name of your first pet?</option>
            <option value="question">What is the name of the town where you were born?</option>
          </select>
          <label for="answer">SECURITY ANSWER</label>
          <input type="text" id="fname" name="fname" placeholder="Security answer">
        
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