<?php
include_once("connexion/fonction_connexion.php");
include_once("Cetudiant.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EtudiantsManager{
    private $db;
    
    public function __construct($db)
    {
    $this->setDb($db);
    }

  public function addEtu(Etudiant $etu)
  {
    $q = $this->db->prepare('INSERT INTO etudiant(num_carte, nom, prenom, admission, filiere) VALUES(?, ?, ?, ?, ?)');

      $num_carte = $etu->getNumEtu();
      $nom = $etu->getNom();
      $prenom = $etu->getPrenom();
      $admission = $etu->getAdmission();
      $filiere = $etu->getFiliere();


    $q->bind_param('dssss', $num_carte, $nom, $prenom, $admission, $filiere);
    

    $q->execute();
    
    if($this->db->affected_rows > 0){
        echo $etu."a bien été ajouté avec succès";
    }else{
        echo "ERREUR INSERTION ETUDIANT";
    }
     
    
  }
  
  public function existEtu($id){

    $result = $this->db->query('SELECT * FROM etudiant WHERE num_carte = '.$id);
    return (mysqli_num_rows($result) > 0);
    
  }

  public function deleteEtu(Etudiant $etu)
  {
    $this->db->query('DELETE FROM etudiant WHERE num_carte = '.$etu->getNumEtu());
    return ($this->db->affected_rows > 0);
  }

  public function getEtu($id)
  {
    

    $q = $this->db->query('SELECT * FROM etudiant WHERE num_carte = '.$id);
    $donnees = mysqli_fetch_assoc($q);

    return new Etudiant($donnees['num_carte'], $donnees['nom'], $donnees['prenom'], $donnees['admission'], $donnees['filiere']);
  }

  public function getListEtu()
  {
    $liste_etudiants = [];

    $q = $this->db->query('SELECT * FROM etudiant ORDER BY nom');

    while ($donnees = mysqli_fetch_assoc($q))
    {
      $liste_etudiants[] = new Etudiant($donnees['num_carte'], $donnees['nom'], $donnees['prenom'], $donnees['admission'], $donnees['filiere']);
    }

    return $liste_etudiants;

  }

  public function update(Etudiant $etu)
  {
    $q = $this->db->prepare('UPDATE etudiant SET nom = ?, prenom = ?, admission = ?, filiere = ? WHERE num_carte = ?');

      $nom = $etu->getNom();
      $prenom = $etu->getPrenom();
      $admission = $etu->getAdmission();
      $filiere = $etu->getFiliere();
      $num_carte = $etu->getNumEtu();

    $q->bind_param('ssssd', $nom, $prenom, $admission, $filiere, $num_carte);
    
    

    
    $q->execute();
    
    if($this->db->affected_rows > 0){
        echo $etu."a bien été modifié avec succès";
    }else{
        echo "ERREUR MODIFICATION ETUDIANT";
    }
 
  }

  public function setDb(mysqli $db)
  {
    $this->db = $db;
  }
}




