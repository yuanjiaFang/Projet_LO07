<?php
include_once("connexion/fonction_connexion.php");
include_once("EtudiantsManager.php");

//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$managerEtudiant = new EtudiantsManager($mysqli);

if(!($managerEtudiant->existEtu($_POST["num_etu"]))){
    
    $new_etudiant = new Etudiant($_POST["num_etu"], $_POST["nom"], $_POST["prenom"], $_POST["admission"], $_POST["filiere"]);
    $managerEtudiant->addEtu($new_etudiant);
}else{
    echo "Le numéro étudiant fourni existe déjà.";
}		 

?>



