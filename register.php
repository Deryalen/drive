<?php
session_start();
if (isset($_SESSION['login']))
{
header('Location: index.php');
}

if (!isset($_SESSION['msg'])) {
  $msg='invisible';
}
else{
  unset($_SESSION['msg']);
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">
  <meta http-equiv="Content-Type" Content="text/html; Charset=UTF-8">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/custom-registration.css" rel="stylesheet">
  <script src="js/custom-register.js"></script>
  <title>Drive notes | Sign Up</title>
</head>
<body>
  <header class="navbar">
  	<a href="index.php" class="navbar-brand"><img src="images\logo.png"></a>
  </header>
  <div class="main">
    <form action="newUser.php" method="POST" class="form-registration form-horizontal">
      <h2 class="form-registration-heading">Please complete all fields</h2>
      <div class="white-box">
        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Name</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required autocomplete="off">
            <span class="help-block text-error invisible">&nbsp</span>
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="login" class="col-sm-4 control-label">Login</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="login" name="login" placeholder="Login" required autocomplete="off" onkeyup="DeleteError()">
            <span class="glyphicon glyphicon-remove form-control-feedback hidden"></span>
            <span class="help-block text-error <?php echo $msg?>" id="logerror">Login already taken</span>
          </div>
        </div>
        <div class="form-group has-feedback" id="pass1block">
          <label for="password" class="col-sm-4 control-label">Password</label>
          <div class="col-sm-7">
            <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="off" id="pass1" onkeyup="ClearPass(); CheckLength()">
            <span class="glyphicon glyphicon-remove form-control-feedback hidden" id="pass1er"></span>
            <span class="glyphicon glyphicon-ok form-control-feedback hidden" id="pass1ok"></span>
            <span class="help-block text-error invisible" id="pass1error">Password is too short</span>
          </div>
        </div>
        <div class="form-group has-feedback" id="pass2block">
          <label for="rpassword" class="col-sm-4 control-label">Repeat password</label>
          <div class="col-sm-7">
            <input type="password" class="form-control" name="rpassword" placeholder="Repeat password" required autocomplete="off" id="pass2" onkeyup="CheckPass()">
            <span class="glyphicon glyphicon-remove form-control-feedback hidden" id="pass2er"></span>
            <span class="glyphicon glyphicon-ok form-control-feedback hidden" id="pass2ok"></span>
            <span class="help-block text-error invisible" id="pass2error">Passwords not match</span>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-4 control-label">E-mail</label>
          <div class="col-sm-7">
            <input type="email" class="form-control" id="email" name="email" placeholder="examle@somemail.com" required autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" id="register" disabled>Register</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>