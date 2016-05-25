<?php
session_start();
	if ($_POST['password']==$_POST['rpassword'] && strlen($_POST['password'])>=6)
    {
        $mongo = new MongoClient();
        $notekeeper = $mongo->drive;
        $profiles = $notekeeper->profiles;
        $user = $profiles->findOne(array('login' => $_POST['login']));
        if ($user==null)
        {
          $user = array('name' => $_POST['name'], 'login' => $_POST['login'], 'password' => md5($_POST['password']), 'email' => $_POST['email']);
          $profiles->insert($user);
          $collection = $notekeeper->createCollection($user['login']);
          header('Location: login.php');
        }
        else
        {
          //setcookie('msg','Login already taken',0, '/');
          $_SESSION['msg']='';
          header('Location: register.php');
        }
        $mongo->close();
        unset($mongo);
    }
    else
    {
        //setcookie('msg','too short password or passwords do not match',0, '/');
        $_SESSION['msg']='Too short password / passwords do not match';
        header('Location: register.php');
    }
?>