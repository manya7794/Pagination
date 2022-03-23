<?php
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
// On se connecte à là base de données
require_once('connexion.php');

// On détermine le nombre total d'images
$sql = 'SELECT COUNT(*) AS nb_images FROM `file`;';

// On prépare la requête
$query = $bdd->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'images
$result = $query->fetch();

$nbimages = (int) $result['nb_images'];

// On détermine le nombre d'images par page
$parPage = 4;

// On calcule le nombre de pages total
$pages = ceil($nbimages / $parPage);

// Calcul du 1er image de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT * FROM `file` ORDER BY `id` DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query = $bdd->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$images = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('deconnexion.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <?php include("televerse.php"); ?>
    <title>Téléversement</title>

</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Liste des images</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Image</th>
                    </thead>
                    <tbody>
                        <?php
                        $nb=1;
                        foreach($images as $image){
                        ?>
                                <?php
                                        if(($nb%2)!=0){
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $image['id'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<img src='".$image['chemin']."".$image['name']."' height='300px'  width='300px' ><br>";
                                            echo "</td>";
                                            $nb=$nb+1;
                                        }
                                        else{
                                            echo "<td>";
                                            echo $image['id'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<img src='".$image['chemin']."".$image['name']."' height='300px'  width='300px' ><br>";
                                            echo "</td>";
                                            echo "</tr>";
                                            $nb=$nb+1;
                                        }
                                    ?>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="./index.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="./index.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="./index.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </nav>
            </section>
        </div>
    </main>
</body>
</html>
