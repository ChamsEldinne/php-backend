<?php

// var_dump($_GET) ;
// echo "<pre>";
// var_dump($_SERVER["REQUEST_METHOD"]);
// echo "</pre>";

$config = [];
$config = require ("config.php");
$db = new DataBase($config['DataBase']);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $id = $_GET['postId'];
    $posts = $db->query('select * from post where postId=?', [$id])->fetchALL();
    echo $id;
    $db->query('DELETE FROM post WHERE postId =:postId ', ["postId" => $id]);
    header("location:/mywork/index.php/notes");
} else {
    $id = $_GET['postId'];
    $posts = $db->query('select * from post where postId=?', [$id])->fetchALL();
}



require ("viewPages/note.view.php");
