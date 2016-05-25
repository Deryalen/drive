<?php
$name = $_SESSION['name'];
$mongo = new MongoClient();
$user = $_SESSION['login'];
$mail = $mongo->drive->profiles->findOne(array('login' => $_SESSION['login']));
$mail = $mail['email'];
$notes = $mongo->drive->$user;
$cursor = $notes->find();
$num = 0;
$main = '<div class="raw">';
foreach ($cursor as $doc => $value) {
  $header = $value['header'];
  $note = $value['note'];
  $id = $value['_id'];
  $class="";
  if ($note == "") $class="only-header";
  if ($header == "") $class="only-note";
    $main = $main.'<form class="col-xs-12 col-sm-6 col-md-4 col-lg-3" action="deleteNote.php" method="POST">
        <div class="old-note '.$class.'">
        <div class="note-block">
          <h1 id="h'.$num.'">'.$header.'</h1>
          <p id="n'.$num.'">'.$note.'</p>
          </div>
          <div class="btn-raw">
          <input type="hidden" value="'.$id.'" name="noteId" id="id'.$num.'">
          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" onclick="EditNote('.$num.')"><span class="glyphicon glyphicon-edit"></span> Edit note</button>
          <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete Note</button>
          </div>
        </div>
      </form>';
  $num=$num+1;
}
$main = $main.'</div>';
?>