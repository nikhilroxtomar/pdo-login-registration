<?php
@session_start();
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'tut');
define("BASE_URL", "http://localhost/tut/pdo-login-registration/");

class User{

  function get_db(){
    try{
      $db = new PDO( 'mysql:host=' . HOST  . '; dbname=' . DBNAME, USERNAME, PASSWORD );
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $db;
    }catch(PDOExecption $e){
      echo 'Connection Failed: ' . $e->getMessage();
    }
  }

  function user_login($email, $password){
    try{
      $db = $this->get_db();
      $encrypt_password = hash('sha256', $password);
      $query = $db->prepare("SELECT uid FROM users WHERE email=:email AND password=:encrypt_password");
      $query->bindParam("email", $email, PDO::PARAM_STR);
      $query->bindParam("encrypt_password", $encrypt_password, PDO::PARAM_STR);
      $query->execute();
      $row_count = $query->rowCount();
      $data = $query->fetch(PDO::FETCH_OBJ);
      $db = null;
      if($row_count <= 0){
        return false;
      }else{
        $_SESSION['uid'] = $data->uid;
        return true;
      }
    }catch(PDOExecption $e){
      echo "Error: " . $e->getMessage();
    }
  }

  function user_register($name, $email, $password){
    try{
      $db = $this->get_db();
      $query=$db->prepare("SELECT uid FROM users WHERE email=:email");
      $query->bindParam("email", $email, PDO::PARAM_STR);
      $query->execute();
      $row_count = $query->rowCount();

      if(row_count < 1){
        //Email Not found in the Database
        //Insert Regsistration data
        $query=$db->prepare("INSERT INTO users(name, email, password) VALUES(:name, :email, :password)");
        $query->bindparam("name", $name, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $encrypt_password = hash('sha256', $password);
        $query->bindParam("password", $encrypt_password, PDO::PARAM_STR);
        $query->execute();
        $db = null;
        return true;
      }else{
        return false; //Email found in the database
      }
    }catch(PDOExecption $e){
      echo "Error: " . $e->getMessage();
    }
  }

  function get_name($uid){
    //Get the username from the userid of a user.
    $db=$this->get_db();
    try{
      $query=$db->prepare("SELECT name FROM users WHERE uid=:uid");
      $query->bindParam("uid", $uid);
      $query->execute();
      $data=$query->fetch();
      $db=null;
      return $data['name'];
    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }
  }

}

?>
