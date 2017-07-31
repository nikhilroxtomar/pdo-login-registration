<?php
  include_once('config.php');

  if(isset($_POST['email'])){
    $email = mysql_escape_string($_POST['email']);
    $password = mysql_escape_string($_POST['password']);

    $user = new User();
    if(strlen($email) > 1 && strlen($password) > 1){
      //Checking if $email and $password are not empty
      
      $login = $user->user_login($email, $password);

      if($login == false){
        header('location:index.php?err=1');
        //Incorrect Email or Password
      }else if($login == true){
        header('location:home.php');
      }
    }else{

    }

  }
?>
