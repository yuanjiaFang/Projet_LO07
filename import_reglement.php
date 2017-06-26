<?php
require 'fonctions_structure_page.php';
include_once("connexion/fonction_connexion.php");
//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$filename = $_FILES['importreglement']['name'];

//Redirection si l'utilisateur n'a pas fourni de fichier
if(!strlen($filename) > 0){
    header('Location: reglements.php');
    exit();
}



function existReglement($db, $filename){
    $liste_reglement = $db->query("SELECT nom_reglement FROM reglement");

    while($donnees = mysqli_fetch_array($liste_reglement)){
        if(strcmp($filename, $donnees['nom_reglement']) == 0){
            return true;
        }
    }

    return false;
}




if(existReglement($mysqli,$filename)){
    $message = urlencode("Le règlement existe déjà, échec de l'import.");
    header("Location:reglements.php?message=".$message);
    die;
}else{

    $q = $mysqli->prepare('INSERT INTO reglement(nom_reglement) VALUES(?)');

    $nom_reglement = $filename;


    $q->bind_param('s', $nom_reglement);


    $q->execute();

    $id_reglement = $mysqli->insert_id;

    if($mysqli->affected_rows > 0){

        echo $nom_reglement."a bien été ajouté avec succès";
    }else{
        echo "ERREUR INSERTION REGLEMENT";
    }



    $csv = file_get_contents($filename);
    $csv_lines = preg_split('/\\r\\n|\\r|\\n/', $csv);


    foreach($csv_lines as $ligne_regle){
        if(!strstr($ligne_regle, "LABEL")){

            $attribut = explode(";", $ligne_regle);

            echo count($attribut);

            $q = $mysqli->prepare('INSERT INTO element_regle(label_regle, agregat, cible_agregat, etape, seuil) VALUES(?, ?, ?, ?, ?)');

            if(count($attribut) == 5) {
                $label_regle = $attribut[0];
                $agregat = $attribut[1];
                $cible_agregat = $attribut[2];
                $etape = $attribut[3];
                $seuil = $attribut[4];
            }else{
                $label_regle = $attribut[0];
                $agregat = $attribut[1];
                $cible_agregat = "";
                $etape = $attribut[2];
                $seuil = $attribut[3];

            }


            $q->bind_param('sssss', $label_regle, $agregat, $cible_agregat, $etape, $seuil);


            $q->execute();

            $id_regle = $mysqli->insert_id;

            if($mysqli->affected_rows > 0){
                echo $ligne_regle." a bien été ajouté avec succès";
            }else{
                echo "ERREUR INSERTION REGLE";
            }

            //Creation ensuite du lien du reglement et de la nouvelle règle

            $q = $mysqli->prepare('INSERT INTO description_reglement(reglement, element_regle) VALUES(?, ?)');

            $q->bind_param('dd', $id_reglement, $id_regle);


            $q->execute();

            if($mysqli->affected_rows > 0){
                echo "La lien entre le règlement et la règle a bien été ajouté avec succès";
            }else{
                echo "ERREUR INSERTION LIEN REGLEMENT REGLE";
            }



        }
    }

    $message = urlencode("Import du règlement ".$filename." avec succès.");
    header("Location:reglements.php?message=".$message);
    die;


}