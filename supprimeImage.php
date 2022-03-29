<?php

    $id=$_GET['id'];

    // On se connecte à là base de données
    require_once('connexion.php');

    //Define the query
    $sql = "DELETE FROM file WHERE id=".$id." LIMIT 1";

    // On prépare la requête
    $query = $bdd->prepare($sql);


    // On exécute
    $query->execute();

    ?>
    <script type="text/javascript">
        alert("Image supprimée");
        window.location.href = "admin.php";
    </script>  
    <?php
?>