<?php 
 class Validator{

    public static function string($s ,$min=0 ,$max=100){
        $s=trim($s) ;
        if(strlen($s)<=$min || strlen($s)>=$max ){
            return false ;
        }
        return true ;
    }
    public static function email($value){
        return filter_var($value,FILTER_VALIDATE_EMAIL) ;
    }
 }