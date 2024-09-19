<?php

$router->get("/mywork/index.php/home", 'index.php');
$router->get("/mywork/index.php/about", 'about.php');
$router->get("/mywork/index.php/contact", 'contact.php');

//session
$router->get("/mywork/index.php/logout", 'session/logout.php','Auth');
$router->get("/mywork/index.php/login", 'session/login.php',"Guest") ;
$router->get("/mywork/index.php/register", 'session/register.php',"Guest");
$router->post("/mywork/index.php/register", 'session/register.php') ;
$router->post("/mywork/index.php/login", 'session/login.php') ;

//notes
$router->get("/mywork/index.php/notes", 'notes/notes.php','Auth');
$router->get("/mywork/index.php/note", 'notes/note.php');
$router->delelte("/mywork/index.php/note","notes/note.php") ;
$router->put("/mywork/index.php/notes", 'notes/notes.php') ;






