<!DOCTYPE html>
<html>
<head>
<title> PDO - Registration and Login in PHP </title>
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">

<style type="text/css">
body{
  background: #f2f2f2;
}
.main{
  background:none;
  width:800px;
  margin-left: auto;
  margin-right: auto;
  margin-top:30px;
  padding:0px;
}

.login{
background:#fff;
width:350px;
display:inline-block;
box-shadow: 1px 5px 10px #ccc;
padding:10px;
position: absolute;
}

.register{
background:#fff;
width:350px;
display: inline-block;
margin-left:395px;
box-shadow: 1px 5px 10px #ccc;
padding:10px;
}
</style>
</head>

<body>

  <?php
  $err = 0;
  if(isset($_GET['err'])){
    $err = mysql_escape_string($_GET['err']);
  }
  ?>
<h2 align="center"> PDO - Login & Registration </h2>
<div class="main">
<!-- login start -->
<div class="login">
<h3 align="center"> Login </h3>

<h4 align="center" style="color:olive;">
<?php if($err == 1){ echo 'Incorrect Username/Password'; } ?>
</h4>

<form action="login.php" method="post">
<div class="form-group">
  <label for="email"> Email or Username </label>
  <input type="text" class="form-control" id="email" name="email">
</div>

<div class="form-group">
<label for="password"> Password </label>
<input type="password" class="form-control" id="password" name="password">
</div>

<button type="submit" class="btn btn-primary"> Submit </button>
</form>

</div>
<!-- login ends -->

<!-- register starts -->
<div class="register">
<h3 align="center"> Register </h3>
<h4 align="center" style="color:olive;">
<?php if($err == 3){ echo 'Registration Success'; } ?>
</h4>
<form action="register.php" method="post">

<div class="form-group">
<label for="name"> Name </label>
<input type="text" class="form-control" id="name" name="name">
</div>

<div class="form-group">
<label for="email"> Email </label>
<input type="email" class="form-control" id="email" name="email">
<?php
    if($err == 2){
      echo '<span style="color:red"> Email already registered</span>';
    }
?>
</div>

<div class="form-group">
<label for="password"> Password </label>
<input type="password" class="form-control" id="password" name="password">
</div>

<button type="submit" class="btn btn-primary"> Register </button>

</form>
</div>
<!-- register ends -->


</div>

</body>
</html>
