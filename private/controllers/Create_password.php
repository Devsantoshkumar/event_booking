<?php

  class Create_password extends Controller{

      function __construct(){
        if(Auth::loggedIn()){
          $this->redirect('home');
        }
      }

      function index($token){
        $errors = [];

        $user = new User();

        if(count($_POST)>0){
            if(empty($_POST['password']) || empty($_POST['cpassword'])){
                $errors['password'] = "Password is required";
            }else{
                if($_POST['password'] == $_POST['cpassword']){
                    if($row = $user->where('token',$token)){
                        $row =$row[0];
                        $id = $row->users_id;
                        unset($_POST['cpassword']);
                        $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
                        
                        $user->update($id,$_POST);
                        $_SESSION['UPDATED'] = "Password updated successfully";
                        $this->redirect("login");
                    }
                }else{
                    $errors['cpassword'] = "Password not matched";
                }
            }
        }

        $this->view('create_password',['errors'=>$errors]);
      }
  }

?>