<?php
include_once('config.php');

if(isset($_POST['email'])){
  $email = mysql_escape_string($_POST['email']);
  $name = mysql_escape_string($_POST['name']);
  $password = mysql_escape_string($_POST['password']);

  $user = new User();
  if(strlen($name) > 1 && strlen($email) > 1 && strlen($password) > 1){
    //Checking if $name, $email, $password are not empty

    $register = $user->user_register($name, $email, $password);

    if($register == false){
      header('location:index.php?err=2');
      //index.php?err=2 ---- email already registered
    }else{
      header('location:index.php?err=3');
      //index.php?err=3 ---- registeration success
    }
  }else{

  }
}
?>
