<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<button onclick="window.location.href='index.php';">Retour à l'index</button>
<div id="jstree_demo_div">
<P>
<B>DEBUTTTTTT DU PROCESSUS :</B>
<BR>
<?php echo " ", date ("h:i:s"); ?>
</P>
<?php
	echo "<ul>";
//Limite de temps pour l'éxécution du processus
set_time_limit (500);
$path= "docs";

//Appel de la fonction
explorerDir($path);

function explorerDir($path)
{
	//Ouverture du dossier spécifié
	$folder = opendir($path);
	//echo "<p>Ouverture du dossier ". $path."</p>";
	$dossier = explode("/", $path);
	echo "<li>".end($dossier)."<ul>";
	//Tant qu'un fichier est détecté 
	while($entree = readdir($folder))
	{		
		//Vérification qu'il ne s'agit pas du dossier parent
		if($entree != "." && $entree != "..")
		{
			//Verification qu'il s'agit d'un dossier
			if(is_dir($path."/".$entree))
			{
				//Mise en mémoire du chemin actuel du dossier
				$sav_path = $path;
				//Ecrase l'ancien chemin du dossier pour celui du dossier en mémoire
				$path .= "/".$entree;
				//Appel de la fonction sur le dossier détecté			
				explorerDir($path);
				//Récupération du chemin mis en mémoire
				$path = $sav_path;
			}
			else
			{
				//Mise en mémoire du chemin du fichier
				$path_source = $path."/".$entree;				
				
				//echo "<p>Analyse du fichier ". $entree."</p>";
				//echo "<li>Test".$entree."</li>";
				echo "<li data-jstree=";
				echo"'{";
				echo '"icon":"file.png"';
				echo "}'";
				echo '"';
				echo">".$entree."</li>";
				
				//Si c'est un .png ou un .jpeg		
				//Alors je ferais quoi ? Devinez !
				//...
				//Récupération des infos du fichier
				$infoFichier=pathinfo($path_source);
				$extension=$infoFichier['extension'];
				$extensions = ['jpg', 'png', 'jpeg', 'gif'];
				
				if(in_array($extension, $extensions)){

					//echo "<p>".$entree." est une image</p>";
					echo "<li data-jstree=";
					echo"'{";
					echo '"icon":"picture.png"';
					echo "}'";
					echo '"';
					echo">".$entree."</li>";

					//Connexion à la BDD
					require './connexion.php';
					
					//Création de la requête
					$req = $bdd->prepare('INSERT INTO file (name, taille, chemin, extension) VALUES (?,?, ?, ?)');
					
					//Nom
					$nomFichier = $infoFichier['filename'];
					$req->bindParam(1,$nomFichier);
					//Taille
					$tailleFichier = filesize($path_source);
					$req->bindParam(2,$tailleFichier);
					//Chemin
					$cheminFichier = $infoFichier['dirname']."/";
					$req->bindParam(3,$cheminFichier);
					//Extension
					$extensionFichier = $infoFichier['extension'];
					$req->bindParam(4,$extensionFichier);
					
					$req->execute();
				}
				
			}
		}
	}
	closedir($folder);
	echo "</ul></li>";
}
echo "</ul>";
?>
</div>
<script>
                $(function () { $('#jstree_demo_div').jstree(); });
                $('#jstree_demo_div').on("changed.jstree", function (e, data) {
                    console.log(data.selected);
                });
                $('button').on('click', function () {
                    $('#jstree').jstree(true).select_node('child_node_1');
                    $('#jstree').jstree('select_node', 'child_node_1');
                    $.jstree.reference('#jstree').select_node('child_node_1');
                });
            </script>
<P>
<B>FINNNNNN DU PROCESSUS :</B>
<BR>
<?php echo " ", date ("h:i:s"); ?>
<button onclick="window.location.href='index.php';">Retour à l'index</button>
</P>
