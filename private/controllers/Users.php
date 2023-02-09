<?php

class Users extends Controller{

    function __construct(){
        if(Auth::user('rank') != 'admin' || !Auth::loggedIn()){
          $this->redirect('home');
        }
    }

    function index(){

        $errors = [];
        
        $user = new User();

        $data = $user->findAll();
        $this->view('users',['rows'=>$data,'errors'=>$errors]);
    }


    function add(){

        $errors = [];

        if(count($_POST)>0){

            $user = new User();

            if($user->validate($_POST)){

                $allowedTypes = array("image/jpeg", "image/png", "image/gif");

                if($user->fileValidate($_FILES['image'],$allowedTypes)){

                      $_POST['image'] = $user->uploadImage($_FILES['image']);
                      $_POST['date'] = date("y-m-d H:i:s");
                      $user->insert($_POST);
                      $this->redirect('users');

                }else{
                    $errors = $user->errors;
                }
            }else{
                $errors = $user->errors;
            }
        }
        $this->view('users.add',['errors'=>$errors]);
    }



    function edit($id=NULL){

        $errors = [];

        $user = new User();

        $row = $user->where("users_id",$id);
        $prevImg = $row[0]->image;
        
        if(count($_POST)>0)
        {
          if($user->validate($_POST))
          {
            $allowedTypes = array("image/jpeg", "image/png", "image/gif");

            if($user->updatedFileValidate($_FILES['image'], $allowedTypes)){
                $_POST['image'] = $user->updateImage($_FILES['image'], $prevImg, $id);
                $_POST['date'] = date("y-m-d H:i:s");
                $user->update($id,$_POST);
                $this->redirect('users');
            }else{
                $errors = $user->errors;
            }
          }else{
             $errors = $user->errors;
          }
        }
        $this->view('users.edit',['row'=>$row,'errors'=>$errors]);
    }



    function delete($id=NULL){

        $user = new User();

        $row = $user->where("users",$id);
        $prevImg = $row[0]->image;

        if($user->deleteImage($prevImg)){

            $user->delete($id);
            $this->redirect('users');
            
        }

        $data = $user->findAll();

        $this->view('users',['rows'=>$data]);
    }
}

?>