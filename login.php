<?php
session_start();
if (isset($_SESSION['login']))
{
header('Location: index.php');
}
if (!isset($_SESSION['logMsg'])) {
  $logMsg='invisible';
}
else{
  unset($_SESSION['logMsg']);
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">
  <meta http-equiv="Content-Type" Content="text/html; Charset=UTF-8">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/custom-signin.css" rel="stylesheet">
  <title>Drive notes | Login</title>
</head>
<body>
  <header class="navbar">
  	<a href="index.php" class="navbar-brand"><img src="images\logo.png"></a>	
  </header>
  <div class="main">
      <form class="form-signin" action="signUp.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <div class="form-group">
          <div class="input-group top">
            <label for="login" class="sr-only">Login</label>
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" id="login" class="form-control" placeholder="Login" required autofocus name="login" autocomplete="off">
          </div>
          <div class="input-group bottom">
            <label for="password" class="sr-only">Password</label>
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" id="password" class="form-control" placeholder="Password" required name="password" autocomplete="off">
          </div>
            <p class="text-error <?php echo $logMsg ?>">Wrong login or password</p>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me" name="remember"> Remember me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p style="margin-top:30px;">Don't have an account?<a href="register.php" class="pull-right" style="font-weight:bold;">Register now!</a></p>
          </div>
        </div>
      </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>