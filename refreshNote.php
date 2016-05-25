<?php
	session_start();
	$mongo = new MongoClient();
    $notekeeper = $mongo->drive;
    $notes = $notekeeper->$_SESSION['login'];
    $notes->update(array('_id' => new MongoId($_POST['noteId'])), array('$set' => array('header' => $_POST['header'], 'note' => $_POST['note'])));
    $mongo->close();
	header('Location: index.php');
?>