<?php

include_once("EtudiantsManager.php");
$num_etu = $_GET["id"];

//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$managerEtudiant = new EtudiantsManager($mysqli);
$etudiant = $managerEtudiant->getEtu($num_etu);
if($managerEtudiant->deleteEtu($etudiant)){
    header('Location: etudiants.php');
}else{
    echo "ERREUR DANS LA SUPPRESSION DE L'ETUDIANT";
}



