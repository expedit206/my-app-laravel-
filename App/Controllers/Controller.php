<?php
namespace App\Controllers;

abstract class Controller{


    protected $db;

    public function __construct( $db){
      if(session_status()===PHP_SESSION_NONE){
        session_start();
      }
      $this ->db = $db;
   }  

   protected function view(string $path, array $params =null)
    {
      ob_start();

      $path =str_replace('.',DIRECTORY_SEPARATOR, $path);

      require VIEWS . $path . '.php'; 
      $content = ob_get_clean();
      require VIEWS . 'layout.php';

    }

    protected function getDB(){
     return $this ->db;

    }

    protected function isAdmin()
    {

      if(isset($_SESSION['auth']) && $_SESSION['auth']===1){
        return true;
      }else{
        return header('location: /my-app/login');
      }
    }
}