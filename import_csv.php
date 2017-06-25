<?php
include_once("connexion/fonction_connexion.php");
include_once("Cetudiant.php");
include_once("EtudiantsManager.php");
include_once("CelementFormation.php");
include_once("ElementFormationManager.php");


//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$managerEtudiant = new EtudiantsManager($mysqli);
$managerElementFormation = new ElementFormationManager($mysqli);

$filename = $_FILES['csvimport']['name'];

echo $filename;


if(!strlen($filename) > 0){
    header('Location: cursus.php');
    exit();
}

$csv = file_get_contents($filename);
$csv_lines = preg_split('/\\r\\n|\\r|\\n/', $csv);


//Fonctions à utiliser

function informations_etu_clair($string){
    $chaine1 = explode(";", $string);
    $chaine2 = explode(";", $chaine1[1]);

    return $chaine2[0];
}



//Récupération tout d'abord des informations de l'étudiant

$information_etu = [];

foreach($csv_lines as $lignes){
    if(strstr($lignes, ";;;;;;;;") && (!strstr($lignes, "END;;;;;;;;;"))){
        $information_etu[] = $lignes;
    }

}

//Association de chaque informations pour la création d'un objet étudiant


foreach($information_etu as $infos){
    if(strstr($infos, "ID")){
        $id = informations_etu_clair($infos);
    }
    if(strstr($infos, "NO")){
        $nom = informations_etu_clair($infos);
    }
    if(strstr($infos, "PR")){
        $prenom = informations_etu_clair($infos);
    }
    if(strstr($infos, "AD")){
        $admission = informations_etu_clair($infos);
    }
    if(strstr($infos, "FI")){
        $filiere = informations_etu_clair($infos);
    }
}

$etudiant = new Etudiant($id, $nom, $prenom, $admission, $filiere);


if(!($managerEtudiant->existEtu($id))){

    $managerEtudiant->addEtu($etudiant);
}else{
    header('Location: cursus.php');
    exit();
}


//Récupération des éléments de formations

$ligne_element_formations = [];

foreach($csv_lines as $lignes){
    if(strstr($lignes, "EL")){
        $ligne_element_formations[] = $lignes;
    }

}

foreach($ligne_element_formations as $element_formation){
    $donnees_element = explode(";", $element_formation);
    $elementForm = new ElementFormation($donnees_element[1],$donnees_element[2],$donnees_element[3],$donnees_element[4],$donnees_element[5],$donnees_element[6],$donnees_element[7],$donnees_element[8],$donnees_element[9],0);
    $managerElementFormation->addElementFormationEtudiant($elementForm, $etudiant);
}


header('Location: cursus.php');
exit();

