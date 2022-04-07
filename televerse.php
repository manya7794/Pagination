<?php

require './connexion.php';

if(isset($_FILES['file'])){
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    $maxSize = 8*1024*1024;

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){

        $uniqueName = uniqid('', true);
        $file = $tabExtension[0];
        $taille=$size;

        move_uploaded_file($tmpName, './upload/'.$file.'.'.$extension);

        $req = $bdd->prepare('INSERT INTO file (name, taille, chemin, extension) VALUES (?,?, ?, ?)');
        $req->bindParam(1,$file);
        $req->bindParam(2,$taille);
        $path="upload/";
        $req->bindParam(3,$path);
        $req->bindParam(4,$extension);
        $req->execute();
        ?>
        <script type="text/javascript">
            alert("Image enregistrée");
            window.location.href = "index.php";
        </script>  
        <?php
    }
    else{
        ?>
        <script type="text/javascript">
            alert("Une erreur est survenue");
            window.location.href = "index.php";
        </script>  
        <?php
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

    </head>
<body>
    <h2>Ajouter une image</h2>
    <form action="televerse.php" method="POST" enctype="multipart/form-data">
    
        <label for="file">Fichier</label>
        <input type="file" name="file">

        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>