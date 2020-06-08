<?php 

class CheckProduct{

private $name ;
private $price;
private $stk;
private $image ;
private $description ;
const LIMIT_NAME = 3 ;

public function __construct(string $username , ? string $price , ? string $qty , ? string $Idescription )
{

    $this->name = $username ;
    $this->price = (int)$price ;
    $this->stk = $qty ;
    $this->description = $Idescription;
   
}

public function getError():array
{
  $error = []; 
  if( $this->stk <= 0 ){

    $error['qty'] = "(!)You must have atleast 1 Pice of the Product to sell";
  } 
  if($this->price <= 0 ){

    $error['price'] = "(!)You must take atleast 1 $ to sell your Product";
  }

return $error ;


}


public function is_Valider():bool
 {

    
    return empty($this->getError());

 }

}

?>
