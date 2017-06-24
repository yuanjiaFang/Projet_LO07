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
?>

<html>
<head>
    <title>Cursus</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>
<body>
   <header>
       <?php
       get_header("cursus");
       ?>
</header>

<!--==============================content================================-->
   <div class="content">
       <?php
//Récupération du numéro étudiant avec la méthode GET
$num_etu = $_GET['id'];

//Instance d'un manager élément de formation
$managerElementFormation = new ElementFormationManager($mysqli);
//Instance d'un manager étudiant
$managerEtudiant = new EtudiantsManager($mysqli);
//Récupération de l'étudiant
$etudiant = $managerEtudiant->getEtu($num_etu);

$contenu = "ID;".$etudiant->getNumEtu().";;;;;;;;\r";
$contenu .= "NO;".$etudiant->getNom().";;;;;;;;\r";
$contenu .= "PR;".$etudiant->getPrenom().";;;;;;;;\r";
$contenu .= "AD;".$etudiant->getAdmission().";;;;;;;;\r";
$contenu .= "FI;".$etudiant->getFiliere().";;;;;;;;\r";

$contenu .= "==;s_seq;s_label;sigle;categorie;affectation;utt;profil;credit;resultat\r";


$liste_element_formation = $mysqli->query("SELECT * FROM element_formation ef, cursus c WHERE ef.num_element = c.element_formation AND c.num_etudiant =".$etudiant->getNumEtu()." ORDER BY sem_seq");

while ($donnees=mysqli_fetch_array($liste_element_formation)){
    $contenu .= "EL;".$donnees['sem_seq'].";".$donnees['sem_label'].";".$donnees['sigle'].";".$donnees['categorie'].";".$donnees['affectation'].";".$donnees['utt'].";".$donnees['profil'].";".$donnees['credit'].";".$donnees['resultat']."\r";
}

$contenu .= "END;;;;;;;;;\r";

if (file_exists($etudiant->getNom()."_".$etudiant->getPrenom().".csv")) {
    echo "Vous avez déjà exporté cet étudiant";
}else {

// Open the text file
    $f = fopen($etudiant->getNom() . "_" . $etudiant->getPrenom() . ".csv", "x");

// Write text
    fwrite($f, $contenu);

// Close the text file
    fclose($f);

    echo "Création du fichier CSV avec succès";
}
?>
   <br>
       <br>
   <button type ='button'><a href = cursus.php>Retour au cursus</a></button>



</div>
<!--==============================footer=================================-->
  <?php
       getFooter();
  ?>
</body>
</html>