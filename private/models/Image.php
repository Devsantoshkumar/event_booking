<?php

class Image extends Model
{
    protected $allowedColumns = [
        'image',
        'project_id'
    ];


     public function multiFilesValidate($FILE,$extensionsAllowed){

         $this->errors = [];

         if(count($FILE)>0){

            $images = $FILE['image'];

            foreach($images['name'] as $key=>$val){
                $imageName = $images['name'][$key]; 
                $imageError = $images['error'][$key]; 
                $imageSize = $images['size'][$key]; 
                $imageExtension = explode('.',$imageName);
                $imageExtension = strtolower(end($imageExtension));

                if(in_array($imageExtension,$extensionsAllowed) === false){
                    $this->errors['types'] = "extension not allowed, please choose a JPEG or PNG file.";
                }

                if(empty($imageName)){
                    $this->errors['imageName'] = "The images can not be empty.";
                }

                if($imageError !== 0){
                    $this->errors['imageError'] = "An error occurred while uploading the images.";
                }
            }


            if(count($this->errors) == 0){
                return true;
             }
             return false;
         }

     }


}

?>