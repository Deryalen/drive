<?php
	session_start();
	$note = array('header' => $_POST['header'],'note' => $_POST['note']);
	$mongo = new MongoClient();
	$user = $_SESSION['login'];
	$notes = $mongo->drive->$user;
	$notes->insert($note);
	$mongo->close();
	header('Location: index.php');
?>