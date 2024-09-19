<?php
class DataBase
{
  public $pdo;
  public $statment ;
  public function __construct($config)
  {
    $dsn = "mysql:" . http_build_query($config, "", ";");
    $this->pdo = new PDO($dsn, "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
  }
  public function query($q, $params)
  {
    $this->statment = $this->pdo->prepare($q);
    $this->statment->execute($params);
    return $this->statment;
  }
  public function fetchAll(){
    return $this->statment->fetchALL() ;
  }
  public function fetch(){
    return $this->statment->fetch() ;
  }
}
