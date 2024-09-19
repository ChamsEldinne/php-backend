<?php
require ("Validator.php");
require ("RegisterValidatore.php");
require ("LoginAndOut.php");

$errors = [];
$valid = true;

$loginOrRegister = "Register";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $val = new RegisterValidatore();
   $valid = $val->validate($_POST['email'], $_POST['password']) && !$val->exist1($_POST['email'], $_POST['password']);

   $errors = $val->getErrors();
   if ($valid) {
      $config = require ("config.php");
      $db = new DataBase($config['DataBase']);
      $db->query('insert into  user(password,userEmail) values(:password,:userEmail)', ["password" => password_hash($password, PASSWORD_BCRYPT), "userEmail" => $email]);
      LoginAndOut::login($_POST['email'], $_POST['password']);
   }
}
require ("viewPages/register.view.php");



