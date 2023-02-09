<?php

class Home extends Controller{

    function index(){

          $category = new Category();

          $data = $category->findAll();

          $this->view('home',['rows'=>$data]);
    }
}

?>