<?php
include('config.php');
session_destroy();
$session_id = '';
$_SESSION['uid'] = '';
if(empty($session_id) && empty($_SESSION['uid'])){
  header('location:index.php');
}
?>
