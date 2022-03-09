<?php

//Connexion à la base de données
require_once("connexion.php");

//Création de la requête
$demande= "SELECT * FROM 'ELEMENTS' ORDER BY 'created_at' DESC;";

//Préparation de la requête
$requete=$bdd->prepare($demande);

//Execution de la requête
$requete->execute();

//Ajout des résultats de la requête dans un tableau
$elements =$requete->fetchAll(PDO::FETCH_ASSOC);

//Deconnexion de la base de données
require_once("deconnexion.php");

//Variable de navigation dans le tableau d'images
$elementActuel=0
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <!--Header du tableau-->
                <th colspan="2">Éléments</th>
            </tr>
        </thead>
        <tbody>
            <!--Affichage des élements-->
            <?php
                //Nombre d'éléments dans le tableau actuel (4 éléments max)
                $item=0;
                //Boucle de sélection des éléments
                for($elementActuel;$elementActuel<count($elements);++$elementActuel){
                    
                    //Création d'une nouvelle ligne dans le tableau
                    if($item==0||$item==2){
                        echo "<tr>";
                    }
            ?>

            <!--Création d'une nouvelle cellule-->
            <td>
                <?php
                //Affichage de l'élément dans une ligne du tableau
                echo "<img src=".$element[$elementActuel]."/>";
                ?>
            </td>

            <?php
                //Fermeture de la ligne du tableau
                if($item==1||$item==3){
                    echo "</tr>";
                }
            ?>

        <?php
        //Fin de la boucle for
        }
        ?>
        </tbody>
    </table>
</body>

<footer>
    <!--Lien vers la page précedente-->
    <a href="./?page=<?$currentPage -1?>" class="lienPages">Précedente</a>
    <!--Lien vers la page suivante-->
    <a href="./?page=<?=$currentPage +1?>" class="lienPages"Suivante></a>
</footer>
</html>