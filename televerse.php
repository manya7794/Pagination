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
    $maxSize = 400000;

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){

        $uniqueName = uniqid('', true);
        $file = $name;

        move_uploaded_file($tmpName, './upload/'.$file);

        $req = $bdd->prepare('INSERT INTO file (name) VALUES (?)');
        $req->execute([$file]);

        echo '<script>alert("Image enregistrée")</script>';  
        
    }
    else{
        echo '<script>alert("Une erreur est survenue")</script>'; 
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
    <h2>Mes images</h2>
    <?php 
        $req = $bdd->query('SELECT name FROM file');
        while($data = $req->fetch()){
            echo "<img src='./upload/".$data['name']."' width='300px' ><br>";
        }
    ?>
</body>
</html>