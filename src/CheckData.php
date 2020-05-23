<?php

/*
@florent fokou 

*/

class CheckData{

private $name ;
private $email;
private $street;
private $postCode ;
private $city ;
private $pasword ;
private $confirmation ;
const LIMIT_NAME = 3 ;
const LIMIT_VILLE = 3 ;
const LIMIT_CITY = 3 ;
const LIMIT_STREET = 3 ;


public function __construct(string $username , string $email , string $street  , string $postCode, string $city ,
 string $password , string $confirmation )
{

    $this->username = $username ;
    $this->email = $email ;
    $this->street = $street;
    $this->postCode = (int)$postCode;
    $this->city = $city ;
    $this->password = $password;
    $this->confirmation = $confirmation ;
    $this->uppercase = preg_match('@[A-Z]@', $password);
    $this->lowercase = preg_match('@[a-z]@', $password);
    $this->number  = preg_match('@[0-9]@', $password);
   
}

public function getError():array
{
  $error = [];
  if(strlen( $this->username) < self ::LIMIT_NAME){

    $error['username'] = "(!)your name muss have at least three characters";
  } 
  if(!$this->uppercase || !$this->lowercase || !$this->number || strlen($this->password) < 8 ){

 $error['password'] = "(!)contains at least one letter one number and more than 8 Character " ; 
} 
  if(   ! (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $this->email)))
{
$error['email'] = "(!)E-Mail invalid" ;
 }
 if( $this->password !=  $this->confirmation || isset($error['password']) ){
$error['confirmation'] = "(!) you password muss be equal and valid";
}
 if(  $this->postCode <= 0){
 
$error['postCode'] = "(!)Your Postcode must be the number" ;

 }
 if( strlen($this->city) < self::LIMIT_CITY || !isset($this->city)){
    $error['city'] = "(!) you must have the valid city" ;
}

if(empty($this->street)|| strlen($this->street) < self::LIMIT_STREET ){
  $error['street'] = "(!) you must have the valid street" ;
}

return $error ;


}


public function is_Valider():bool
 {

    
    return empty($this->getError());

 }

}







?>