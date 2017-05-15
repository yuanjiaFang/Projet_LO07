<?php
require 'fonctions_structure_page.php';
include_once("EtudiantsManager.php");
$num_etu = $_GET["id"];

//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$managerEtudiant = new EtudiantsManager($mysqli);
$etudiant = $managerEtudiant->getEtu($num_etu);

?>


<html>
<head>
    <title>Modification d'un étudiant</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>
<body>
   <header> 
       <?php
       get_header("etudiants");
       ?>
    </header>  
  <!--==============================content================================-->
  <?php
    $new_etudiant = new Etudiant($_POST["num_etu"], $_POST["nom"], $_POST["prenom"], $_POST["admission"], $_POST["filiere"]);
    $managerEtudiant->update($new_etudiant);
  ?>
<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>	
</body>
</html>