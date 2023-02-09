<?php

class Login extends Controller{

    function __construct(){
        if(Auth::loggedIn()){
          $this->redirect('home');
        }
    }

    function index(){
        $errors = [];

        if(count($_POST)>0)
        {
          $user = new User();
          if($row = $user->where('email_varified',$_POST['email']))
          {
            $row = $row[0];
            if(password_verify($_POST['password'], $row->password))
            {
                Auth::authenticate($row);
                $this->redirect('home');
            }else
            {
                $errors['email'] = 'Username or password are incorrect';
            }
          }else
          {
               $errors['email'] = 'Username or password are incorrect';
          }
        } 

        $this->view('login',['errors'=>$errors]);
    }
}

?>