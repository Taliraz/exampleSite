<?php
require_once ('../model/ModelVoiture.php'); // chargement du modèle
class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        require ('../view/voiture/list.php');  //"redirige" vers la vue
    }
    public static function read(){
    	$v=ModelVoiture::getVoitureByImmat($_GET ['immatriculation']);
    	if ($v==false){
    		require ('../view/voiture/error.php');
    	}
    	else{
    		require('../view/voiture/detail.php');
    	}
    	
    }

    public static function create(){
        require('../view/voiture/create.php');
    }

    public static function created(){
    require_once('../model/ModelVoiture.php');
      $ModelVoiture=new ModelVoiture($_POST['marque'],$_POST['couleur'],$_POST['immatriculation']);
      $ModelVoiture->save();
      self::readAll();
    }

    public static function delete(){
        $v=ModelVoiture::getVoitureByImmat($_GET ['immatriculation']);
        $v->delete();
        self::readAll();
    }
}
?>
