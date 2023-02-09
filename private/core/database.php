<?php

   class Database{

      // function for connecting mysql database
      private function connect()
      {
        $string = DBDRIVER.":host=".DBHOST.";dbname=".DBNAME;
        if(!$conn = new PDO($string,DBUSER,DBPASSWORD))
        {
            die("could not connect to database");
        }
        return $conn;
      }


      // function for generate dynamic sql query
      public function query($query, $data=[], $data_type="object")
      {
         
          $con = $this->connect();
          $stm = $con->prepare($query);
          if($stm)
          {
            $check = $stm->execute($data);
            if($check)
            {
               if($data_type == "object")
               {
                  $data = $stm->fetchAll(PDO::FETCH_OBJ);
               }else
               {
                  $data = $stm->fetchAll(PDO::FETCH_ASSOC);
               }

               if(is_array($data) && count($data) > 0)
               {
                  return $data;
               }
            }
          }
          return false;
      }



   }

?>