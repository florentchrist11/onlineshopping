<?php
   /* Justin Bathke */   
class CheckProduct{

private $name ;
private $price;
private $stk;
private $image ;
private $description ;
const LIMIT_NAME = 3 ;
const LIMIT_STK = 1 ;
const LIMIT_PRICE = 1 ;

public function __construct(string $name , ? string $price , ? string $stk , ? string $image,? string $description )
{

    $this->name = $name ;
    $this->price = (int)$price ;
    $this->stk = $stk ;
    $this->image = $image;
    $this->description = $description;
   
}

public function getError():array
{
  $error = [];
  if(strlen( $this->name) < self ::LIMIT_NAME){

    $error['Name'] = "(!)your Product Name muss have at least three characters";
  } 
  if(strlen( $this->stk) < self ::LIMIT_STK){

    $error['Stk'] = "(!)You must have atleast 1 Pice of the Product to sell";
  } 
  if(strlen( $this->price) < self ::LIMIT_PRICE){

    $error['Stk'] = "(!)You must take atleast 1 $ to sell your Product";
  } 

return $error ;


}


public function is_Valider():bool
 {

    
    return empty($this->getError());

 }

}







?>