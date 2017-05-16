<?php
require 'fonctions_structure_page.php';
include_once("EtudiantsManager.php");
include_once("connexion/fonction_connexion.php");
//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();

//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$num_etu = $_GET['id'];
$managerEtudiant = new EtudiantsManager($mysqli);
$etudiant = $managerEtudiant->getEtu($num_etu);
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
  <div class ='content'>
      <?php echo $etudiant->getNom()." ".$etudiant->getPrenom()."<br>"; ?>
      <?php echo "Numéro étudiant : ".$etudiant->getNumEtu()."<br>"; ?>
      <?php echo "Admis en ".$etudiant->getAdmission()." et actuellement en filière ".$etudiant->getFiliere()."<br>"; ?>

  </div>
  
      
<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>	
</body>
</html>