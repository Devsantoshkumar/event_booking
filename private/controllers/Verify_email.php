<?php

class Verify_email extends Controller{

    function __construct(){
        if(!isset($_SESSION['EMAIL']) || Auth::loggedIn()){
           $this->redirect('home');
        }
    }

    function index(){

        $errors = [];

        if(count($_POST)>0){
                
            $verify = new Verify();
            $user = new User();

            if($verify->validate($_POST)){

                $email = $_SESSION['EMAIL'];
                $otp = $_SESSION['OTP'];
                $time = time();

                $data = $verify->where('otp',$otp);

                if($data[0]->expired > $time){
                    $email = $data[0]->email;
                    $user->query("update users set email_varified = email where email = '$email'");
                    $this->redirect('login');
                }else{
                    $errors['expires'] = "OTP is expired";
                }
            }else{
                $errors = $verify->errors;
            }
        }
        
        $this->view('verify_email',['errors'=>$errors]);
    }


    function otpsend(){
        $errors = array();

        $_VAR['email'] = $_SESSION['EMAIL'];
        $_VAR['otp'] = rand(111111,999999);
        $_VAR['expired'] = (time() + (60 * 1));

        $message = "<b>Hello sir/madam </b><br/><br/>";
        $message .= "Welcome to The Web <br/><br/>";
        $message .= "Your One Time Password (OTP) : <br/>";
        $message .= "<h1><b>". $_VAR['otp'] ."</b></h1><br/>";
        $message .= "Your OTP will expire in 5 min";

        $subject = "Email Varification OTP";
        $recipient = $_VAR['email'];
        $sendmail = send_mail($recipient, $subject, $message);

        if($sendmail){

            $verify = new Verify();

            $data = $verify->where('email',$_VAR['email']);
            $id = $data[0]->id;
            $verify->update($id,$_VAR);
            $_SESSION['OTP'] = $_VAR['otp'];
            $_SESSION['OTPSEND'] = "OTP has been send again";
            $this->redirect('verify_email');
        }else{
            $errors['send_email_error'] = "Something wrong. Try again!";
        }

        $this->view('verify_email',['errors'=>$errors]);

      }
}

?>