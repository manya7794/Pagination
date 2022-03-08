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
            //Boucle de sélection des éléments
        foreach($elements as $element){
            ?>
            <tr>
                <!--Affichage de l'élément dans une ligne du tableau-->
                <td><?= $element ?></td>
            </tr>
        <?php
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