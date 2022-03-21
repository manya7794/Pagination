
<P>
<B>DEBUTTTTTT DU PROCESSUS :</B>
<BR>
<?php echo " ", date ("h:i:s"); ?>
</P>
<?php

//Limite de temps pour l'éxécution du processus
set_time_limit (500);
$path= "docs";

//Appel de la fonction
explorerDir($path);

function explorerDir($path)
{
	//Ouverture du dossier spécifié
	$folder = opendir($path);
	
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
				
				//Si c'est un .png ou un .jpeg		
				//Alors je ferais quoi ? Devinez !
				//...
				
			}
		}
	}
	closedir($folder);
}
?>
<P>
<B>FINNNNNN DU PROCESSUS :</B>
<BR>
<?php echo " ", date ("h:i:s"); ?>
</P>
