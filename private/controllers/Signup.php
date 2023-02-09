<?php

class Signup extends Controller{

    function __construct(){
      if(Auth::loggedIn()){
        $this->redirect('home');
      }
    }

    function index(){

        $errors = [];

        if(count($_POST)>0){

            $user = new User();
            $verify = new Verify();
            
            if($user->validate($_POST)){

              $emailOtp = rand(111111,999999);
              $emailId = $_POST['email']; 
              $firstname = $_POST['firstname']; 
              $_POST['date'] = date("y-m-d H:i:s");

              $message = "<b>Hello sir/madam </b><br/><br/>";
              $message .= "Welcome to The Web <br/><br/>";
              $message .= "Your One Time Password (OTP) : <br/>";
              $message .= "<h1><b>". $emailOtp ."</b></h1><br/>";
              $message .= "Your OTP will expire in 5 min";

              $subject = "Email Varification OTP";
              $recipient = $emailId;

              $sendmail = send_mail($recipient, $subject, $message);

              if($sendmail){

                $user->insert($_POST);
                $_SESSION['EMAIL'] = $emailId;
                $_SESSION['OTP'] = $emailOtp;
  
                $_VAR['email'] = $emailId;
                $_VAR['otp'] = $emailOtp;
                $_VAR['expired'] = (time() + (60 * 1));
                $verify->insert($_VAR);
                $_SESSION['OTPSEND'] = "OTP has been send check your email";
                $this->redirect('verify_email');
              }else{
                $errors['send_email_error'] = "Something wrong. Try again!";
              }
            }else{
               $errors = $user->errors;
            }
          }

      $this->view('signup',['errors'=>$errors]);
    }
}

?>