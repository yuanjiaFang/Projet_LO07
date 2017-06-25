<?php

include_once("ElementFormationManager.php");
$num_element = $_GET["id"];
$num_etu = $_GET["numEtu"];

//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}


$managerElement = new ElementFormationManager($mysqli);
if($managerElement->deleteElementFormation($num_element)){
    header('Location: modifier_cursus.php?id='.$num_etu);
}else{
    echo "ERREUR DANS LA SUPPRESSION DE L'ETUDIANT";
}



