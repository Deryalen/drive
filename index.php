<?php
session_start();

if (isset($_COOKIE['login']))
{
  $_SESSION['login']=$_COOKIE['login'];
}

if (!isset($_SESSION['login']))
{
header('Location: login.php');
}

require 'show.php';

if (isset($_POST['logout']))
{
  session_unset();
  session_destroy();
  setcookie('login',$user['login'],time() - 86400 , '/');
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">
  <meta http-equiv="Content-Type" Content="text/html; Charset=UTF-8">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/custom-index.css" rel="stylesheet">
  <title>Drive notes</title>
</head>
<body>

  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title note-header" contenteditable="true" id="mheader" onkeyup="IsClear('m');" placeholder="Title">Modal Header</div>
        </div>
        <div class="modal-body">
          <div class="note-text" contenteditable="true" id="mnote" onkeyup="IsClear('m');" placeholder="Text">Some text in the modal.</div>
        </div>
        <div class="modal-footer">
          <form method="POST" action="refreshNote.php" onsubmit="completeFields();">
            <input type="hidden" name="header" id="refreshHeader">
            <input type="hidden" name="note" id="refreshNote">
            <input type="hidden" name="noteId" id="refreshId">
            <button type="submit" class="btn btn-primary btn-sm" id="mbtn"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove"></span> Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar">
    <div class="container-fluid">
      <div class="pull-right"><button class="user-logo" data-toggle="popover" data-content="<p>Signed up as <b><?echo $name ?></b></p><hr><p><?php echo $mail ?></p><hr><p><form method='POST'><button type='submit' name='logout' class='btn btn-success btn-sm btn-block'><span class='glyphicon glyphicon-log-out'></span> Logout</button></form></p>" data-placement="bottom" data-trigger="focus"><?php echo strtoupper($name{0}) ?></button></div>
  	 <a href="index.php" class="navbar-brand"><img src="images\logo.png"></a>
    </div>
  </nav>

  <div class="main">
    <div class="container">
      <form class="new-note" action="createNote.php" method="POST" onsubmit="createNote();">
        <div contenteditable="true" class="note-header" id="cheader" onkeyup="IsClear('c');" placeholder="Your header..."></div>
        <div contenteditable="true" class="note-text" id="cnote" onkeyup="IsClear('c');" placeholder="Your note..."></div>
        <input type="hidden" name="header" id="newHeader">
        <input type="hidden" name="note" id="newNote">
        <button type="submit" class="btn btn-primary btn-sm" id="cbtn" disabled><span class="glyphicon glyphicon-floppy-saved"></span> Create Note</button>
      </form>
    </div>

    <?php echo $main ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(function () {
  $('[data-toggle="popover"]').popover({html:'true'})
})
  </script>

  <script src="js/custom-index.js"></script>
</body>
</html>