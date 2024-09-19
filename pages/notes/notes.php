<?php
require "Validator.php";

$config = require ("config.php");


$db = new DataBase($config['DataBase']);
$curentId = $_SESSION['id'];
$posts = $db->query("select * from post where userId=?", [$curentId])->fetchAll();



$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!Validator::string($_POST['text'], 0, 100) ) {
    $errors["body"] = "the length of the input shoold'n be biger than 100 an smaler than 1" ;
  } else {
    $db = new DataBase($config['DataBase']);
    $db->query('INSERT INTO post(text, userId) VALUES(:text ,:userId)', [
      "text" => $_POST['text'],
      "userId" => $curentId,
    ]);
    $posts = $db->query("select * from post where userId=?", [$curentId])->fetchAll();
    $errors["body"] = "";
    $_POST['text'] = "";
  }
}

// echo"<pre>" ;
// var_dump($_POST) ;
// echo "</pre>" ;

require ("viewPages/notes.view.php");

