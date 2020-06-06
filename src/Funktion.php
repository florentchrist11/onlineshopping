<?php  

/* Florent Fokou   */
function  str_random($length){

$template = "09673421835ehjhsghsjfsfvvymJLAJDKDBNYXGY";
// Multiply by 60 and shuffle

   return substr( str_shuffle(str_repeat($template , $length)),0,$length);




}










?>