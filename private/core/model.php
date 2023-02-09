<?php

class Model extends Database
{

    // get database table name
    function __construct(){
        if(!property_exists($this,'table')){
            $this->table = strtolower(get_class($this))."s";
        }
    }

    
    // fetch record on the basis of any condition
    public function where($column,$value){
        $column = addslashes($column);
        $query = "SELECT * FROM $this->table WHERE $column = :value";
        return $this->query($query,['value'=>$value]);
    }


    // fetch first record of the table
    public function first(){
        $query = "SELECT * FROM $this->table";
        $data = $this->query($query);
        if(is_array($data)){
           $data = $data[0];
        }
        return $data;
    }
    

    // Insert record into database
    public function insert($data){

        // remove unwanted columns
        if(property_exists($this,'allowedColumns'))
        {
            foreach($data as $key => $column)
            {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }


        // run function before insert
        if(property_exists($this, 'beforeInsert'))
        {
            foreach($this->beforeInsert as $func)
            {
                    $data = $this->$func($data);
            }
        }


       $keys= array_keys($data);
       $column = implode(',',$keys);
       $value = implode(',:',$keys);
       $query = "INSERT INTO $this->table ($column) VALUES(:$value)";
       return $this->query($query,$data);
    }


    // fetch all record of the table
    public function findAll($order = "asc"){
        $query = "SELECT * FROM $this->table ORDER BY ". $this->table . "_id" .  " $order";
        $data = $this->query($query);
        return $data;
    }


    // update record in the table
    public function update($id,$data){
        $str = "";
        foreach($data as $key => $value){
        $str .= $key."=:".$key.",";
        }

        $str = trim($str,",");
        $data['id'] = $id;
        $query = "UPDATE $this->table SET $str WHERE ". $this->table . "_id" .  " =:id";
        return $this->query($query, $data);
    }


    // delete record from the table
    public function delete($id){
        $data['id'] = $id;
        $query = "DELETE FROM $this->table WHERE ". $this->table . "_id" .  " = :id";
        return $this->query($query,$data);
    }



    // upload image into directory
    public function uploadImage($FILE){
        if(count($FILE)>0){
            $imageName = $FILE["name"];
            $imageTemp = $FILE["tmp_name"];

            $folder = "uploads/";
            if(!file_exists($folder)){
                mkdir($folder,0777,true);
            }

            $newImageName = uniqid("", true) . "." . pathinfo($imageName, PATHINFO_EXTENSION);
        if(move_uploaded_file($imageTemp,$folder.$newImageName)){ 
            return $newImageName; 
        } 
       } 
    }



    // update image in the directory and delete previous image
    public function updateImage($FILE,$PREV_FILE,$id){

        $imageName = $FILE["name"];
        $imageTemp = $FILE["tmp_name"];

        if(!empty($imageName)){

            $folder = "uploads/";
            if(!file_exists($folder))
            {
              mkdir($folder,0777,true);
            }

            if(file_exists($folder.$PREV_FILE)){
              unlink($folder.$PREV_FILE);
            }

            $newImageName = uniqid("", true) . "." . pathinfo($imageName, PATHINFO_EXTENSION);
            if(move_uploaded_file($imageTemp,$folder.$newImageName)){
                  return $newImageName;
            }

        }else{
            return $PREV_FILE;
        }
    }



    // delete image from the directory
    public function deleteImage($PREV_FILE){

        $folder = "uploads/";
        
        if(file_exists($folder.$PREV_FILE)){
            unlink($folder.$PREV_FILE);
            return true;
        }
    }



    // upload multiple files into database and directory also
    public function uploadMultipleFiles($FILE,$id){

        if(count($FILE)>0){

           $images = $FILE['image'];

           foreach($images['name'] as $key=>$val){
                $imageName = $images['name'][$key]; 
                $imageTemp = $images['tmp_name'][$key]; 

                $_POST['project_id'] = $id;

                $folder = "uploads/images/";
                if(!file_exists($folder)){
                    mkdir($folder,0777,true);
                }

                $_POST['image'] = uniqid("", true) . "." . pathinfo($imageName, PATHINFO_EXTENSION);
                $newImageName = $_POST['image'];
                
                if(move_uploaded_file($imageTemp,$folder.$newImageName)){
                    $this->insert($_POST);
                }
           }

        }   
    }


    // download file function
    public function downloadFile($file){

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
    }




}

?>