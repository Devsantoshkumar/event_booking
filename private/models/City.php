<?php

class City extends Model
{
    protected $allowedColumns = [
        'city',
        'created_at',
        'status',
        'state_id'
    ];

    public function validate($data){

        $this->errors = [];

        if(empty($data['city'])){
           $this->errors['city'] = "City is required";
        }

        if(empty($data['status'])){
         $this->errors['status'] = "Status is required";
        }

        if(empty($data['state_id'])){
         $this->errors['state_id'] = "State is required";
        }

        if(count($this->errors) == 0){
           return true;
        }
        return false;
     }


     public function fileValidate($FILE,$allowedTypes){

         $this->errors = [];

         $imageName = $FILE["name"];
         $imageType = $FILE["type"];
         $imageError = $FILE["error"];
         $imageSize = $FILE["size"];

         if($imageSize > 300000){
            $this->errors['imageSize'] = "The image size is too large.";
         }

         if(empty($imageName)){
            $this->errors['imageName'] = "The image can not be empty.";
         }

         if(!in_array($imageType, $allowedTypes)){
            $this->errors['imageType'] = "Invalid image type.";
         }

         if($imageError !== 0){
            $this->errors['imageError'] = "An error occurred while uploading the image.";
         }

         if(count($this->errors) == 0){
            return true;
         }
         return false;
     }


     public function updatedFileValidate($FILE,$allowedTypes){

      $this->errors = [];

      if(!empty($FILE['name'])){

         $imageName = $FILE["name"];
         $imageType = $FILE["type"];
         $imageError = $FILE["error"];
         $imageSize = $FILE["size"];

         if($imageSize > 300000){
            $this->errors['imageSize'] = "The image size is too large.";
         }

         if(!in_array($imageType, $allowedTypes)){
            $this->errors['imageType'] = "Invalid image type.";
         }
   
         if($imageError !== 0){
            $this->errors['imageError'] = "An error occurred while uploading the image.";
         }


         if(count($this->errors) == 0){
            return true;
         }
         return false;

      }else{
         return true;
      }
  }

}

?>