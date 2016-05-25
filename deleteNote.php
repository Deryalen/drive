<?php
	session_start();
	$mongo = new MongoClient();
    $notekeeper = $mongo->drive;
    $notes = $notekeeper->$_SESSION['login'];
    $notes->remove(array('_id' => new MongoId($_POST['noteId'])));
    $mongo->close();
	header('Location: index.php');
?>