<?php

class States extends Controller{

    function __construct(){
        if(Auth::user('rank') != 'admin' || !Auth::loggedIn()){
          $this->redirect('home');
        }
    }

      function index(){

        $errors = [];

        $state = new State();
        $rows = $state->findAll();

        $this->view('state',['errors'=>$errors,'rows'=>$rows]);
    }



    function add(){

        $errors = [];

        if(count($_POST)>0){

            $state = new State();

            if($state->validate($_POST)){

                      $_POST['created_at'] = date("y-m-d H:i:s");
                      $state->insert($_POST);
                      $this->redirect('states');

            }else{
                $errors = $state->errors;
            }
        }
        $this->view('state.add',['errors'=>$errors]);
    }


    function edit($id=NULL){

        $errors = [];

        $state = new State();

        $row = $state->where("states_id",$id);
        
        if(count($_POST)>0)
        {
          if($state->validate($_POST))
          {
                $_POST['created_at'] = date("y-m-d H:i:s");
                $state->update($id,$_POST);
                $this->redirect('states');
            
          }else{
             $errors = $state->errors;
          }
        }
        $this->view('state.edit',['row'=>$row,'errors'=>$errors]);
    }


    function delete($id=NULL){

        $errors = [];

        $state = new State();

        $state->delete($id);
        $this->redirect('states');

        $data = $state->findAll();

        $this->view('states',['rows'=>$data,'errors'=>$errors]);

    }
}

?>