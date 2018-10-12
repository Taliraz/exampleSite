<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php
        foreach ($tab_v as $v){
            echo '<p> Voiture d\'immatriculation: <a title="Voiture" 
                href="../controller/routeur.php?action=read&immatriculation='
                .$v->getImmatriculation().'">'. $v->getImmatriculation().'</a> 
                <a title="supprimer" 
                href="../controller/routeur.php?action=delete&immatriculation='
                .$v->getImmatriculation().'">supprimer</a> 
                </p>';
            }  

        ?>
        <p>
            <a title="create" href="../controller/routeur.php?action=create"> Ajouter une voiture </a>
        </p>
    </body>
</html>
