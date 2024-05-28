<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $stmt = $mysqli->prepare("SELECT id, password FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                
                if (isset($_POST['remember'])) {
                    setcookie('user_id', $user['id'], time() + (30 * 24 * 60 * 60)); // 30 days
                }

                header("Location: index.php");
                die;
            }
        }
    }

    echo "Invalid username or password!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="js/validation.js" defer></script>
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
            <h1>Login Page</h1>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Your username" id="username">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Your password" id="password">
            <label><input type="checkbox" name="remember"> Remember me for 30 days.</label>

            <div class="buttons">
                <button type="submit">Login</button>
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
                if (username === "" && password === "") {
                    alert("Username and Password fields are empty");
                    return false;
                } else {
                    if (username === "") {
                        alert("Username is empty");
                        return false;
                    }
                    if (password === "") {
                        alert("Password field is empty");
                        return false;
                    }
                }
            }
        </script>
    </div>
</body>
</html>
