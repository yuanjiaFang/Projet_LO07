<?php
include_once("connexion/fonction_connexion.php");

$num_reglement = $_GET["id"];

//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

//On met tous à 0
$q = $mysqli->prepare('UPDATE reglement SET application = ?');
$application = 0;
$q->bind_param('d', $application);
$q->execute();

//On met à 1 le règlement qu'on veut appliquer

$q = $mysqli->prepare('UPDATE reglement SET application = ? WHERE num_reglement = ?');
$application = 1;
$q->bind_param('dd', $application, $num_reglement);
$q->execute();

header('Location:reglements.php');
exit();