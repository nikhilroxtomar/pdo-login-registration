<?php
include_once('session.php');
$name = $user->get_name($session_id);
?>
<!DOCTYPE html>
<html>
<head>
  <title> Home </title>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
  <style type="text/css">

  </style>
</head>

<body>
  <br/><br/><br/>
  <h1 align="center"> Welcome to Homepage </h1>
  <br/>
  <h2 align="center"> <?php echo $name ?> </h2>
  <br/>
  <h3 align="center"><a href="logout.php"> Logout </a></h3>
</body>
</html>
