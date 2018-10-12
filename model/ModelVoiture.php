<?php
require_once 'Model.php';
class ModelVoiture {
   
  private $marque;
  private $couleur;
  private $immatriculation;
      
  // un getter      
  public function getMarque() {
       return $this->marque;  
  }
     
  // un setter 
  public function setMarque($marque2) {
       $this->marque = $marque2;
  }

  public function getImmatriculation(){
    return $this->immatriculation;
  }

  public function setImmmatriculation($immatriculation2){
    if(strlen($immatriculation2)>8){
      $this->immatriculation=$immatriculation2;
    }
  }

  public function getCouleur(){
    return $this->couleur;
  }

  public function setCouleur($couleur2){
    $this->couleur=$couleur2;
  }
      
  // un constructeur
  public function __construct($m=NULL, $c=NULL, $i=NULL)  {
    if (!is_null($m) && !is_null($c) && !is_null($i)) {
      $this->marque = $m;
      $this->couleur = $c;
      $this->immatriculation = $i;
    }
  } 
           

  //public function afficher() {
    //echo("Marque:$this->marque \n Couleur:$this->couleur \n Immatriculation:$this->immatriculation");
  //}

  public static function getAllVoitures(){
    $pdo=Model::$pdo;
    $rep=$pdo->query("SELECT * FROM voiture");
    $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
    $tab_voit = $rep->fetchAll();
    return $tab_voit;
  }

  public static function getVoitureByImmat($immat) {
    $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
        "nom_tag" => $immat,
        //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête   
    $req_prep->execute($values);

    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
    $tab_voit = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_voit))
        return false;
    return $tab_voit[0];
}

  public function save(){
    try{
      $req_prep=Model::$pdo->prepare("INSERT INTO voiture(immatriculation,marque,couleur)VALUES(:immatriculation,:marque,:couleur)");

      $values=array(
        "immatriculation" => $this->immatriculation,
        "marque" => $this->marque,
        "couleur" => $this->couleur,
        );
      $req_prep->execute($values);
    }
    catch(PDOException $e){
      if ($e->getCode()==23000){
        echo('<b>ERREUR: La voiture existe déjà</b>');
        return false;
      }
    }

  }

  public function delete(){
    $req_prep=Model::$pdo->prepare("DELETE FROM voiture WHERE voiture.immatriculation=:immatriculation");

    $values=array(
      "immatriculation" => $this->immatriculation,
      );
    $req_prep->execute($values);
  }

}
?>

