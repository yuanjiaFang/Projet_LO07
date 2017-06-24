<?php
require 'fonctions_structure_page.php';
include_once('ElementFormationManager.php');
include_once("connexion/fonction_connexion.php");
include_once("EtudiantsManager.php");

//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();

//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

//Récupération du numéro étudiant avec la méthode GET
$num_etu = $_GET['id'];


//Instance d'un manager élément de formation
$managerElementFormation = new ElementFormationManager($mysqli);
//Instance d'un manager étudiant
$managerEtudiant = new EtudiantsManager($mysqli);
//Récupération de l'étudiant
$etudiant = $managerEtudiant->getEtu($num_etu);


?>

<html>
<head>
    <title>Cursus</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style2.css">
</head>
<body>
<header>
    <?php
    get_header("cursus");
    ?>
</header>
<!--==============================content================================-->
<div class ='content'>

    <!-- Informations sur l'étudiant -->
    <?php echo $etudiant->getNom()." ".$etudiant->getPrenom()."<br>"; ?>
    <?php echo "Numéro étudiant : ".$etudiant->getNumEtu()."<br>"; ?>
    <?php echo "Admis en ".$etudiant->getAdmission()." et actuellement en filière ".$etudiant->getFiliere()."<br>"; ?>


    <!-- Affichage du cursus de l'étudiant -->
    <?php
    //Récupération de la liste d'élément de formation
    $liste_element_formation = $managerElementFormation->getListElementFormation($etudiant);

    $liste_element_formation_by_semester = $managerElementFormation->getListElementFormationBySemester($liste_element_formation);


    echo "<ul>";
    foreach($liste_element_formation_by_semester as $labelSemestre => $elementFormations){


        echo "<li>".$labelSemestre;
        echo "<ul>";
       


        foreach ($elementFormations as $elementFormation){

            echo "<li>".$elementFormation->getSigle()." ".$elementFormation->getResultat()." ".$elementFormation->getCredit()."</li>";

        }
        echo "</ul>";
        echo "</li>";

    }
    echo "</ul>";


    ?>

</div>




<!--==============================footer=================================-->
<?php
getFooter();
?>
</body>
</html>
