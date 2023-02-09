<?php

  class Auth
  {
      public static function authenticate($row)
      {
          $_SESSION['USER'] = $row;
      }

      public static function logout()
      {
        if(isset($_SESSION['USER']))
        {
            unset($_SESSION['USER']);
            unset($_SESSION['OTPSEND']);
            unset($_SESSION['EMAIL']);
            unset($_SESSION['OTP']);
            unset($_SESSION['UPDATED']);
        }
      }


      public static function loggedIn()
      {
         if(isset($_SESSION['USER'])){
            return true;
         }
         return false;
      }


      public static function user($user){
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->$user;
        }
        return false;
      }

      
  }

?>