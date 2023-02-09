<?php

class Book_event extends Controller{

    function index($id=NULL){

        $category = new Category();
        $data = $category->findAll();
    
        $event = new Event();
        
        if(!empty($id)){

            $events = $event->where("category",$id);

        }else{

            $events = $event->findAll();

        }

        $this->view('book_event',['rows'=>$data,'events'=>$events]);
    }
}

?>