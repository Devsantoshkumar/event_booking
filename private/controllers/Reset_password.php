<?php

class Reset_password extends Controller{

    function __construct(){
        if(Auth::loggedIn()){
          $this->redirect('home');
        }
    }


    function index(){

        $errors = [];

        if(count($_POST)>0){
            if(!empty($_POST['email'])){
  
              $token = token(60);
              $emailId = $_POST['email'];
              $_POST['token'] = $token;
              $message = 'Your password reset link <br/><br/> <a href="'. ROOT .'/create_password'.'/'.$token.'">"'.$token.'"</a>';
              $subject = "Reset Password";
              $recipient = $emailId;
      
              $user = new User();
      
              if($row = $user->where('email_varified',$emailId)){
                 $row = $row[0];
                 $id = $row->id;
                 $sendmail = send_mail($recipient, $subject, $message);
                 if($sendmail){
                     $user->update($id,$_POST);
                     $_SESSION['OTPSEND'] = "Email has been sent";
                     $this->redirect("reset_password");
                 }
              }else{
                 $errors['noemail'] = "Email is not registered";
              }
            }else{
                $errors['email'] = "Email is required";
            }
          }
        
        $this->view('reset_password',['errors'=>$errors]);
    }
}

?>