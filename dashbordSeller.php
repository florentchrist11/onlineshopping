
<?php   require('elements/header.php')          ?>

        <div class="rand"> 
           <div class="navbar">
           <a class="glyphicon glyphicon-user"  href="Profil.php"> Profil</a> 
           <a class="fa fa-bell" style="font-size:24px"> Delete </a>
           <a class="fa fa-gift" style="font-size:24px"> Update</a>
        </div>
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-plus"></i> Add New Product</strong>
            </div>
            <div class="card-body">
                <form action="add.php" method="post">
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="price" class="col-form-label">Preis</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="qty" class="col-form-label">Stückzahl</label>
                            <input type="number" class="form-control" name="qty" id="qty" placeholder="stückzahl" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image" class="col-form-label">Image</label>
                            <input type="text" class="form-control" name="image" id="image" placeholder="Image URL">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="image" class="col-form-label">discription</label>
                        <textarea name="description" id="" rows="5" class="form-control" placeholder="beschreibung"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Hinzufügen</button>
                </form>
            </div>
        </div>




        




<?php   require('elements/footer.php')   ?>



















