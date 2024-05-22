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

?>