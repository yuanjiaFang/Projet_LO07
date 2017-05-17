<?php
include_once("EtudiantsManager.php");
include_once("ElementFormationManager.php");
$num_etu = $_GET["id"];

//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$managerEtudiant = new EtudiantsManager($mysqli);
$managerElementFormation = new ElementFormationManager($mysqli);
$etudiant = $managerEtudiant->getEtu($num_etu);

$filiere_etu = $etudiant->getFiliere();

//Test si un élément de formation correspond au profil
function correspondProfil($affectation, $filiereEtu){
    /*switch($affectation){
        case"TC":
            return false;
            break;
        case"TCBR":
            break;
        case"FCBR":
            break;

    }*/
}

//Récupération du nombre d'élément de formation
$nb_element = count($_POST["semSeq"]);

$tabElementFormation = [];
$elementFormation = [];

//Récupération des informations par élément de formation
for($i = 0 ; $i < $nb_element ; $i++) {
    foreach ($_POST as $attributs => $tab) {

        //echo $attributs." : ".$tab[$i] . "<br>";
        $elementFormation[] = $tab[$i];

    }
    //PAR DEFAUT ON MET QUE LE PROFIL CORRESPOND, A REVOIR
    $elementFormation[] = "Y";

    $tabElementFormation[$i] = $elementFormation;
    //On revide le tableau pour l'élément suivant
    $elementFormation = [];
    var_dump($tabElementFormation);
    echo "<br>";
}


//Ajout des éléments de formation à l'étudiant en lui donnant la liste des éléments de formation
$managerElementFormation->addAllElementFormationEtudiant($tabElementFormation, $etudiant);

echo $num_etu;