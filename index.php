<?php
session_start() ;

require ("DataBase.php");


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


require ("Router2.php");
$router = new Router2();
require "router.php" ;

// echo("<pre>") ;
// var_dump($router) ;
// echo("</pre>") ;



$router->route($uri, $method);












