<?php

require ("Validator.php");
require ("RegisterValidatore.php");
require ("LoginAndOut.php");

$loginOrRegister = "log in";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $val = new RegisterValidatore();
    $valid = $val->validate($_POST['email'], $_POST['password']) && $val->exist2($_POST['email'], $_POST['password']);

    $errors = $val->getErrors();
    ;
    if ($valid) {
        LoginAndOut::login($_POST['email'], $_POST['password']);
    } else {
        $errors['email'] = "incorect email or password";
    }
}
require ("viewPages/login.view.php");

