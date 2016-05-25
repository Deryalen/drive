<?php
session_start();
$mongo = new MongoClient();
$profiles = $mongo->drive->profiles;
$user = $profiles->findOne(array('login' => $_POST['login']));
if ($user!=null && md5($_POST['password']) == $user['password'])
{
  $_SESSION['name'] = $user['name'];
  $_SESSION['login'] = $user['login'];
  if (isset($_POST['remember']))
  {
    setcookie('name',$user['name'],time() + 86400 , '/');
    setcookie('login',$user['login'],time() + 86400 , '/');
  }
  header('Location: index.php');
}
else
{
  $_SESSION['logMsg']='';
  header('Location: login.php');
}
  $mongo->close();
?>