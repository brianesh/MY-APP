<?php
class User {
  public $id;
  public $username;
  public $email;
  public $password;
  function __construct($id, $username, $email, $password) {
    $this->id = $id;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
  }

  function __destruct() {
  }
  function login($username, $password) {
    if ($username === $this->username && $password === $this->password) {
      return true; 
    } else {
      return false;
    }
  }

  function register($username, $email, $password) {
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
    return true; 
  }

  function forgot_password($securityQuestion, $securityAnswer, $newPassword, $confirmPassword) {
}

  function validate() {
  }

  function update($username, $email, $password) {
  }

  function delete() {
  }
}

function check_login($mysqli) {
  if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
      $stmt = $mysqli->prepare("SELECT * FROM user WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows == 1) {
          return $result->fetch_assoc();
      }
      return null;
  }
  
  header("location: login.php");
  die;
}