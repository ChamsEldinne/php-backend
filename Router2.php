<?php

// use Middelware\Auth;
// use Middelware\Guest;
// use Middelware\Map;
require ("Middelware/Auth.php") ;
require ("Middelware/Guest.php") ;
require ("Middelware/Map.php") ;


// use Middelware ;
class Router2
{

    public $routes = [];


    public function add($uri, $controller, $method, $middelware)
    {
        return [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
            "middelware" => $middelware,
        ];
    }
    public function get($uri, $controller, $middelware = null)
    {
        return $this->routes[] = $this->add($uri, $controller, "GET", $middelware);
    }
    public function post($uri, $controller, $middelware = null)
    {

        return $this->routes[] = $this->add($uri, $controller, "POST", $middelware);
    }
    public function put($uri, $controller, $middelware = null)
    {
        return $this->routes[] = $this->add($uri, $controller, "PUT", $middelware);
    }
    public function patch($uri, $controller, $middelware = null)
    {
        return $this->routes[] = $this->add($uri, $controller, "PATCH", $middelware);
    }
    public function delelte($uri, $controller, $middelware = null)
    {
        return $this->routes[] = $this->add($uri, $controller, "DELETE", $middelware);
    }


    public function route($uri, $method)
    {
        $x = false;


        foreach ($this->routes as $routs) {
            if (isset($routs["uri"]) && isset($routs["method"]) && $routs["uri"] == $uri && $routs['method'] == strtoupper($method)) {
             
             if($routs['middelware']!=null){
                $cla=Map::map[$routs['middelware']] ;
                (new $cla)->handel() ;
             }
                // if ($routs['middelware'] == 'Guest') {
                //     (new Middelware\Guest)->handel();
                // }
                // if ($routs['middelware'] == 'Auth') {
                //     (new Middelware\Auth)->handel();
                // }

                require ("pages/" . $routs['controller']);
                $x = !$x;
            }

        }
        if (!$x)
            require ("pages/notFound.php");
    }
}