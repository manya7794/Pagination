<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<link rel="stylesheet" href="index.css">
<div id="jstree_div">
<?php
    $path= "docs";
    echo "<ul>";
    afficheDir($path);
    function afficheDir($path){
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
                    afficheDir($path);
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
    $(function () { $('#jstree_div').jstree(); });
    $('#jstree_div').on("changed.jstree", function (e, data) {
        console.log(data.selected);
    });
    $('button').on('click', function () {
        $('#jstree').jstree(true).select_node('child_node_1');
        $('#jstree').jstree('select_node', 'child_node_1');
        $.jstree.reference('#jstree').select_node('child_node_1');
    });
</script>