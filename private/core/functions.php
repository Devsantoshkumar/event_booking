<?php

// function for printing array data [temprary]
function show($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}


// getting form input values which is entered by user
function get_val($key, $default="")
{
  if(isset($_POST[$key]))
  {
    return $_POST[$key];
  }
  return $default;
}


// getting selected valud in the select option
function get_select($key,$value)
{ 
   if(isset($_POST[$key]))
   {
     if($_POST[$key] == $value)
     {
        return "selected";
     }
   }
   return "";
}


// function for date formate
function get_date($date)
{
   return date("jS M Y",strtotime($date));
}


// function for making clean url [SEO Prespective]
function slug($text){
    $text = preg_replace('~[^\\pL\d]+~u','-',$text);
    $text = trim($text,'-');
    $text = iconv('utf-8','us-ascii//TRANSLIT',$text);
    $text = strtolower($text);
    $text = preg_replace('~[^-\w]+~','',$text);
    if(empty($text)){
        return 'n-a';
    }else{
        return $text;
    }
}


// generate random and unique token
function token($length)
{
   $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
   $text = "";
   for($x=0; $x <$length; $x++)
   {
    $random = rand(0,61);
    $text .= $array[$random];
   }
   return $text;
}



?>