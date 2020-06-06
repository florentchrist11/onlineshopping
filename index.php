<?php
session_start();

require_once 'elements/header.php';
 


?>


      
         


<div class="center"> 
       <h1>Angebote</h1>
       <form action="" class="mb-4">
       <label for="Search"> Search product  >  </label><br>
       <input type ="text" id ="Search" placeholder="Search..">
       <button type="search" name="sb">Suchen </button>        
 </form>

 <div class="row text-center py-5">
       <div class="col-md-3 col-sm-6 my-3 my-md-0">
            <form action="" method="POST">
                 <div class="card shadow">

                 </div> 
            </form> 
       </div>  
       <div class="col-md-3 col-sm-6 my-3 my-md-0">
       <form action="" method="POST">
                 <div class="card shadow">
                 <div>
                 <img src="Bilder/buc.jpg" alt="image" class="img-fluid card-img-top">      
                 </div> 
                 <div class="card-body">
                  <h5 class="card-title">Product1</h5>
                  <h6>
                  <i class='far fa-star' style='font-size:30px;color:yellow' ></i>
                  <i class='far fa-star' style='font-size:30px;color:yellow'></i>
                  <i class='far fa-star' style='font-size:30px;color:yellow'></i>
                  </h6> 
                  <p class="card-text">
                       Description of Product
                  </p>  
                  <small><S class="text-secondary">$50</S></small> 
                  <strong class="price">$30</strong> 
                  <button type="submit" class="btn btn-warning my-3" name="add"> Add to Card  </button>
                 </div>       
                 </div> 


</div>




