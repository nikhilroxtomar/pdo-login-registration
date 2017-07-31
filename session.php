<?php
@session_start();
$session_id = $_SESSION['uid'];
include_once('config.php');
$user = new User();
if(empty($session_id)){
  header('location:index.php');
}
?>
