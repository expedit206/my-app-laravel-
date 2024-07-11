<?php
namespace Database;
use PDO;

class DBConnection{


                  private $dbname; 
            private $host; 
            private $username; 
            private $password; 
            private $pdo; 
    public function __construct(string $dbname, string $host, string $username, string $password)
    {
        $this -> dbname = $dbname;
        $this -> host = $host;
        $this -> username = $username;
        $this -> password = $password;
    }
    
    public function getPDO(): PDO
    {
        $this -> dbname ;
        $this -> host ;
        $this -> username ;
        // >< 
   
        return $this -> pdo ??   $this -> pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", "$this->username", "$this->password", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET CHARACTER SET UTF8'
    ]);
     
        
    }
}