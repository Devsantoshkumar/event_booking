<?php


class Dashboard extends Controller{
    
    function __construct(){
        if(Auth::user('rank') != 'admin' || !Auth::loggedIn()){
          $this->redirect('home');
        }
    }

    function index(){
        

        $this->view('dashboard');
    }
}


?>