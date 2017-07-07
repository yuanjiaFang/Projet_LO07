<?php
require 'fonctions_structure_page.php';
include_once('ElementFormationManager.php');
include_once("connexion/fonction_connexion.php");
include_once("EtudiantsManager.php");
include_once ("traitement_regle.php");
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

    if(getNumReglement($mysqli) > 0) {
        $list_element_regle = getListElementRegle(getNumReglement($mysqli), $mysqli);
    }


    echo "<ul>";
    foreach($liste_element_formation_by_semester as $labelSemestre => $elementFormations){


        echo "<li class=\"list-group-item active\">".$labelSemestre;
        echo "<ul>";


        foreach ($elementFormations as $elementFormation){

                echo "<li>" . $elementFormation->getSigle() . " " . $elementFormation->getResultat() . " " . $elementFormation->getCredit() . " " . $elementFormation->getCategorie() . "</li>";

        }
        echo "</ul>";
        echo "</li>";


    }
    if(getNumReglement($mysqli) > 0) {
        echo "<li> Total";

        echo "<ul>";


        foreach ($list_element_regle as $elem) {



            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'CS+TM' && $elem['etape'] == 'TCBR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getCstm_tcbr($liste_element_formation) . "/" . $elem['seuil']. " ";
                affiche_resultat(getCstm_tcbr($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }
            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'CS+TM' && $elem['etape'] == 'FCBR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getCstm_fcbr($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getCstm_fcbr($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }
            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'CS' && $elem['etape'] == 'BR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getCs_br($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getCs_br($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }
            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'TM' && $elem['etape'] == 'BR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getTm_br($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getTm_br($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }
            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'CS+TM' && $elem['etape'] == 'BR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getCstm_br($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getCstm_br($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }

            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'ST' && $elem['etape'] == 'TCBR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getSt_tcbr($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getSt_tcbr($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }
            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'ST' && $elem['etape'] == 'FCBR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getSt_fcbr($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getSt_fcbr($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }
            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'EC' && $elem['etape'] == 'BR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getEc_br($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getEc_br($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }
            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'ME' && $elem['etape'] == 'BR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getMe_br($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getMe_br($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }
            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'CT' && $elem['etape'] == 'BR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getCt_br($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getCt_br($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }
            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'ME+CT' && $elem['etape'] == 'BR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getMect_br($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getMect_br($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }
            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == 'UTT(CS+TM)' && $elem['etape'] == 'BR') {
                echo "<li>" . $elem['etape'] . ": " . $elem['cible_agregat'] . " --- " . getCstm_utt($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getCstm_utt($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }
            if ($elem['agregat'] == 'EXIST' && $elem['cible_agregat'] == 'SE') {
                echo "<li> Semestre à l'étranger --- ";
                if (getSe($liste_element_formation)) {
                    echo "<img class='icon' src='images/valider.png' width='10' height='10'>";
                } else {
                    echo "<img class='icon' src='images/non_valider.png' width='10' height='10'>";
                };
            }
            if ($elem['agregat'] == 'EXIST' && $elem['cible_agregat'] == 'NPML') {
                echo "<li> NPML --- ";
                if (getNpml($liste_element_formation)) {
                    echo "<img class='icon' src='images/valider.png' width='10' height='10'>";
                } else {
                    echo "<img class='icon' src='images/non_valider.png' width='10' height='10'>";
                };
                echo "</li>";
            }
            if ($elem['agregat'] == 'SUM' && $elem['cible_agregat'] == '' && $elem['etape'] == 'ALL') {
                echo "<li> All --- " . getAll($liste_element_formation) . "/" . $elem['seuil'] . " ";
                affiche_resultat(getAll($liste_element_formation), $elem['seuil']);
                echo "</li>";
            }


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
