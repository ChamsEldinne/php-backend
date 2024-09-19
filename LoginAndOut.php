<?php 

class LoginAndOut{

    public static function login($email,$password){
        $config = require ("config.php");
        $db = new DataBase($config['DataBase']);
        $db->query("select * from user where userEmail=:email",["email"=>$email]);
        $user=$db->fetch() ;
        $_SESSION['id']=$user['id'] ;
        $_SESSION['email']=$email ;
        $_SESSION['password']=$password ;
        header("location:/mywork/index.php/home") ;
    }
    public static function logout(){
        session_destroy() ;
        $_SESSION=[] ;
        header("location:/mywork/index.php/home") ;
    }
}