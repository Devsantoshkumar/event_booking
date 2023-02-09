<?php

class Cities extends Controller{

    function __construct(){
        if(Auth::user('rank') != 'admin' || !Auth::loggedIn()){
          $this->redirect('home');
        }
    }

      function index(){

        $errors = [];

        $city = new City();
        $rows = $city->findAll();

        $this->view('city',['errors'=>$errors,'rows'=>$rows]);
    }



    function add(){

        $errors = [];

        if(count($_POST)>0){

            $city = new City();

            if($city->validate($_POST)){

                      $_POST['created_at'] = date("y-m-d H:i:s");
                      $city->insert($_POST);
                      $this->redirect('cities');

            }else{
                $errors = $city->errors;
            }
        }
        $this->view('city.add',['errors'=>$errors]);
    }


    function edit($id=NULL){

        $errors = [];

        $city = new City();

        $row = $city->where("citys_id",$id);
        
        if(count($_POST)>0)
        {
          if($city->validate($_POST))
          {
                $_POST['created_at'] = date("y-m-d H:i:s");
                $city->update($id,$_POST);
                $this->redirect('cities');
            
          }else{
             $errors = $city->errors;
          }
        }
        $this->view('city.edit',['row'=>$row,'errors'=>$errors]);
    }


    function delete($id=NULL){

        $errors = [];

        $city = new City();

        $city->delete($id);
        $this->redirect('cities');

        $data = $city->findAll();

        $this->view('city',['rows'=>$data,'errors'=>$errors]);

    }
}

?>