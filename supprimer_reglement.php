<?php

include_once("connexion/fonction_connexion.php");
$num_reglement = $_GET["id"];

//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}


//Selection des éléments de règle en rapport avec le règlement
$selectElement = $mysqli->query('SELECT * FROM description_reglement WHERE reglement = '.$num_reglement);
while ($donnees=mysqli_fetch_array($selectElement)){

    $elementASupprime[] = $donnees['element_regle'];
    echo $donnees['element_regle'];
}



//Suppression des description reglement
$mysqli->query('DELETE FROM description_element WHERE reglement = '.$num_reglement);
//Suppression des éléments de reglement
foreach($elementASupprime as $suppression){
    $mysqli->query('DELETE FROM element_regle WHERE num_element = '.$suppression);
}
//Suppression du règlement
$mysqli->query('DELETE FROM reglement WHERE num_reglement = '.$num_reglement);


if($mysqli->affected_rows > 0){
    $message = urlencode("Suppression du règlement avec succès.");
    header("Location:reglements.php?message_suppr=".$message);
    die;
}
