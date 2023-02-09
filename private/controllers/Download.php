<?php

class Download extends Controller{
	
	function __construct(){
        if(!Auth::loggedIn()){
          $this->redirect('signup');
        }
    }

    function index($file){
        
          $project = new Project();

          $downloadFile = "uploads/".$file;

          $project->downloadFile($downloadFile);
    }
}

?>