 <?php    require('elements/header.php')                        ?>
  
 
         <h1>Login</h1>


  <form class="form-horizontal" action="">
        <div class="form-group">
             <label class="control-label col-sm-2" for="email">Email:</label>
                   <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                               </div>
                                     </div>
                                          <div class="form-group">
                                           <label class="control-label col-sm-2" for="pwd">Password:</label>
                                          <div class="col-sm-10">
                                      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                                  </div>
                                </div>
                         <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
         </div>
        </div>
     </form>












  <form action="">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
<?php    require('elements/footer.php')        ?>


      

 </form>