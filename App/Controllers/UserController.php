<?php 
namespace App\Controllers;
use App\Models\User;
class UserController extends Controller{

public function login()
{
return $this ->view('auth.login');
}

public function loginPost()
{
    $user = (new User($this->getDB()))->getByUsername($_POST['username']);
    var_dump(password_verify('a','a'));

    if(password_verify($_POST['password'], $user -> password)){
      $_SESSION['auth']=(int) $user -> admin;
      return header('location: /my-app/admin/posts?success=true');
    }else{
        return header('location: /my-app/login');
    }
    
}
public function logOut(){
    session_destroy();
    return header('location:/my-app');
}

}
// <!-- >< -->