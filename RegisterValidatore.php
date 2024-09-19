<?php


class RegisterValidatore
{
    private $errors = [];


    public function validate($email, $password)
    {
        $valid = true;
        if (!Validator::email($email)) {
            $this->errors['email'] = 'provide valid adrees email';
            $valid = false;
        }
        if (!Validator::string($password, 3, 100)) {
            $this->errors['password'] = 'provide valid password';
            $valid = false;
        }
        return $valid;
    }

    public function exist1($email, $password)
    {
        $config = [];
        $config = require ("config.php");
        $db = new DataBase($config['DataBase']);
        $db->query('select * from user where userEmail=:useremail', ["useremail" => $email]);
        $p = $db->fetch();

        if (!empty($p)) {
            $this->errors['email'] = "email alredy exist !";
            return true;
        }


        $db->query('select * from user where password=:password', ["password" => password_hash($password, PASSWORD_BCRYPT)]);
        $p = $db->fetch();
        if (!empty($p)) {
            $this->errors['password'] = "password alredy exist !";
            return true;
        }
        return false;
    }
    public function exist2($email, $password)
    {
        $config = [];
        $config = require ("config.php");
        $db = new DataBase($config['DataBase']);
        $db->query('select * from user where userEmail=:useremail', ["useremail" => $email]);
        $p = $db->fetch();

        if (!empty($p) && password_verify($p["password"], PASSWORD_BCRYPT) == $password) {
            return true;
        }
        return false;
    }



    public function getErrors()
    {
        return $this->errors;
    }
}