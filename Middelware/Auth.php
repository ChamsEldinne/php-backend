<?php
 namespace Middelware;

class Auth{
    public static function handel(){
        if( !isset($_SESSION['email'])){
            header("location:/mywork/index.php/home") ;
            exit() ;
        }
    }
}