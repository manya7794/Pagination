<?php
try{
    //Initialisation de la base de données (adresse, utilisateur, mot de passe)
    $bdd=new PDO("mysql:host;host=localhost;dbname=", "root", "");
    //Permet l'affichage des échanges avec la base de données avec les caractères UTF-8
    $bdd->exec("SET NAMES 'UTF-8'");
} catch(PDOException $e) {
    //Cas où la connexion à la base de données ne fonctionne pas
    echo "Erreur : ". $e->getMessage();
    die();
}
?>