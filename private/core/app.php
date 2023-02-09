<?php

class App{
    protected $controller = "home";   // default page as a controller 
    protected $method = "index";      // default method inside the controller
    protected $params = [];           // empty array which has contains url parameters

    function __construct()
    {
        $URL = $this->getURL();
        array_walk($URL, create_function('&$val','$val = trim($val);'));

        /* checking controller which is calling a page if 
           they are exist then create object of the class controller */
        if(file_exists("private/controllers/".$URL[0].".php"))
        {
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        }
        require("private/controllers/".$this->controller.".php");
        $this->controller = new $this->controller();



        /* checking method inside the controller*/
        if(isset($URL[1]))
        {
            if(method_exists($this->controller,$URL[1]))
            {
                $this->method = ucfirst($URL[1]);
                unset($URL[1]);
            }
        }


        // contains all the parameters from the url
        $URL = array_values($URL);
        $this->params = $URL;
        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }


    // function which is getting url
    private function getURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode("/",filter_var(trim($url,"/")),FILTER_SANITIZE_URL);
    }


}


?>