 
 <div class="centerReg">
 
 <form method="post" action="" enctype="multipart/form-data" >
 
    <label for="title" >Titre de votre article : <br /></label>
    <input type="text" id="title" name="title" />
     
    <p></p>
     
    <label for="arcticle" >
    Votre article (vous pouvez y ajouter des elements decoratifs,
    voir les instructions plus bas ) :<br /></label>
    <textarea id="article" name="article" ></textarea>
     
    <p></p>
     
    <label for="photo" >
    Ajoutez une photo (formats supportes : .png, .jpeg, .jpg, .gif
    | taille maximale : 3 Mo) :<br /></label>
    <input type="file"  name="photo" />
     
    <p></p>
     
    <input type="submit" value="poster cet article" />
     
</form>


</div>

<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{   echo"<pre>";
    var_dump($_FILES['photo']);
    echo"</pre>";
    die ;
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['photo']['size'] <= 3145728)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['photo']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['photo']['tmp_name'], 'images_news/' . basename($_FILES['photo']['name']));
                        echo "L'envoi a bien été effectué !";
                }
                else
                {
                    echo 'extention non-autorisee';
                }
        }
        else
        {
            echo 'image trop grosse';
        }
}
elseif (isset($_FILES['photo']) AND $_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE)
{
    echo 'fichier inexistant';
}
elseif (isset($_FILES['photo']) AND $_FILES['photo']['error'] == UPLOAD_ERR_PARTIAL)
{
    echo 'fichier uploadé que partiellement';
}
elseif (isset($_FILES['photo']) AND $_FILES['photo']['error'] == UPLOAD_ERR_INI_SIZE)
{
    echo 'fichier trop gros';
}
elseif (isset($_FILES['photo']) AND $_FILES['photo']['error'] == UPLOAD_ERR_FORM_SIZE)
{
    echo 'fichier trop gros';
}
elseif (!isset($_FILES['photo']))
{
    echo 'pas de variable';
}
else
{
    echo 'probleme a l\'envoi';
}
?>
