<?php
namespace  Routeur;

class Routeur{
public $url;

public $routes=[];
    public function __construct ($url){
       return $this->url =trim($url, '/'); 
    }

    public function get(string $path, string $action)
{
  echo $path ."<br>";
  echo $action ."<br>";
    $this -> routes['GET']=new Route($path, $action);
}


public function run(){
    // echo $this ->routes[$_SERVER['REQUEST_METHOD']];
    foreach($this ->routes[$_SERVER['REQUEST_METHOD']] as $route){
        if($route ->matches($this->url)){
            $route->execute();
        };  
         
    }
    

    return header('HTTP/1.0 404 not found');
    }
}