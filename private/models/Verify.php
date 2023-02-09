<?php

class Verify extends Model
{

      protected $allowedColumns = [
             'otp',
             'expired',
             'email'
      ];


      public function validate($data){

         $this->errors = [];

         if(empty($data['otp'])){
            $this->errors['otp'] = "OTP is required.";
         }

         if(!$this->where('otp',$data['otp'])){
            $this->errors['otpinvalid'] = "Invalid otp";
         }
        
         if(count($this->errors) == 0){
            return true;
         }
         return false;
      }

}


?>