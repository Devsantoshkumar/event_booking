<?php

class Event extends Model
{
    protected $allowedColumns = [
        'title',
        'description',
        'price',
        'status',
        'image',
        'created_at',
        'category',
        'state',
        'city',
        'address',
        'meta_keywords',
        'meta_description'
    ];

    public function validate($data){

        $this->errors = [];

        if(empty($data['title'])){
           $this->errors['title'] = "Title is required";
        }

        if(empty($data['description'])){
            $this->errors['description'] = "Description is required";
        }

        if(empty($data['category'])){
            $this->errors['category'] = "Category is required";
         }

        if(empty($data['state'])){
         $this->errors['state'] = "State is required";
        }

         if(empty($data['city'])){
           $this->errors['city'] = "City is required";
         }


        if(empty($data['price'])){
            $this->errors['price'] = "Price is required";
        }

        if(count($this->errors) == 0){
           return true;
        }
        return false;
     }


     public function fileValidate($FILE, $imageExt=[]){

         $this->errors = [];

         if(!empty($FILE['image']['name'])){
            $imageName = $FILE['image']["name"];
            $imageType = $FILE['image']["type"];
            $imageError = $FILE['image']["error"];
            $imageSize = $FILE['image']["size"];

            if(empty($imageName)){
                $this->errors['imageName'] = "The image can not be empty.";
             }

             if(!in_array($imageType, $imageExt)){
               $this->errors['imageType'] = "Invalid image type.";
            }

             if($imageError !== 0){
                $this->errors['fileError'] = "An error occurred while uploading the image.";
             }

         }


         if(count($this->errors) == 0){
            return true;
         }
         return false;
     }


}

?>