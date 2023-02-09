<?php

class Categorys extends Controller{

    function __construct(){
        if(Auth::user('rank') != 'admin' || !Auth::loggedIn()){
          $this->redirect('home');
        }
    }

      function index(){

        $errors = [];

        $category = new Category();
        $rows = $category->findAll();

        $this->view('category',['errors'=>$errors,'rows'=>$rows]);
    }



    function add(){

        $errors = [];

        if(count($_POST)>0){

            $category = new Category();
            
            if($category->validate($_POST)){
                
                $imageAllowed = array("image/jpeg", "image/png", "image/jpg");

                if($category->fileValidate($_FILES['image'],$imageAllowed)){
                       
                    $_POST['image'] =  $category->uploadImage($_FILES['image']);
                    $_POST['created_at'] = date("y-m-d H:i:s");
                    $category->insert($_POST);
                    $this->redirect('categorys');

                }else{
                    $errors = $category->errors;
                }
                
            }else{
                $errors = $category->errors;
            }
        }
        $this->view('category.add',['errors'=>$errors]);
    }


    function edit($id=NULL){

        $errors = [];

        $category = new Category();

        $row = $category->where("categorys_id",$id);
        $prevImg = $row[0]->image;
        
        if(count($_POST)>0)
        {
          if($category->validate($_POST))
          {

            $allowedTypes = array("image/jpeg", "image/png", "image/jpg");

            if($category->updatedFileValidate($_FILES['image'], $allowedTypes)){

                $_POST['image'] = $category->updateImage($_FILES['image'], $prevImg, $id);
                $_POST['created_at'] = date("y-m-d H:i:s");
                $category->update($id,$_POST);
                $this->redirect('categorys');

            }else{
                $errors = $category->errors;
            }
            
          }else{
             $errors = $category->errors;
          }
        }
        $this->view('category.edit',['row'=>$row,'errors'=>$errors]);
    }


    function delete($id=NULL){

        $errors = [];

        $category = new Category();
        $row = $category->where("categorys_id",$id);
        $prevImg = $row[0]->image;

        if($category->deleteImage($prevImg)){

            $category->delete($id);
            $this->redirect('categorys');
            
        }
        

        $data = $category->findAll();

        $this->view('category',['rows'=>$data,'errors'=>$errors]);

    }
}

?>