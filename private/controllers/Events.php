<?php

class Events extends Controller{

    function __construct(){
        if(Auth::user('rank') != 'admin' || !Auth::loggedIn()){
          $this->redirect('home');
        }
    }

      function index(){

        $errors = [];

        $event = new Event();
        $rows = $event->query("SELECT * FROM events JOIN categorys ON events.category = categorys.categorys_id JOIN states ON events.state = states.states_id JOIN citys ON events.city = citys.citys_id");
        $this->view('event',['errors'=>$errors,'rows'=>$rows]);
    }



    function add(){

        $errors = [];

        if(count($_POST)>0){

            $event = new Event();

            if($event->validate($_POST)){

                $imageAllowed = array("image/jpeg", "image/png", "image/jpg");

                if($event->fileValidate($_FILES['image'],$imageAllowed)){

                    $_POST['image'] =  $event->uploadImage($_FILES['image']);
                    $_POST['created_at'] = date("y-m-d H:i:s");
                    $event->insert($_POST);
                    $this->redirect('events');

                }else{
                    $errors = $event->errors;
                }

            }else{
                $errors = $event->errors;
            }
        }
        $this->view('event.add',['errors'=>$errors]);
    }


    function edit($id=NULL){

        $errors = [];

        $event = new Event();
        $row = $event->where("events_id",$id);
        $prevImg = $row[0]->image;
        
        if(count($_POST)>0)
        {
          if($event->validate($_POST))
          {

            $allowedTypes = array("image/jpeg", "image/png", "image/jpg");

            if($event->fileValidate($_FILES['image'], $allowedTypes)){

                $_POST['image'] = $event->updateImage($_FILES['image'], $prevImg, $id);
                $_POST['created_at'] = date("y-m-d H:i:s");
                $event->update($id,$_POST);
                $this->redirect('events');

            }else{
                $errors = $event->errors;
            }
            
          }else{
             $errors = $event->errors;
          }
        }
        $this->view('event.edit',['row'=>$row,'errors'=>$errors]);
    }


    function delete($id=NULL){

        $errors = [];

        $event = new Event();

        $row = $event->where("events_id",$id);
        $prevImg = $row[0]->image;

        if($event->deleteImage($prevImg)){

            $event->delete($id);
            $this->redirect('events');
            
        }

        $data = $event->findAll();

        $this->view('event',['rows'=>$data,'errors'=>$errors]);

    }
}

?>