<?php
require 'fonctions_structure_page.php';

include_once("connexion/fonction_connexion.php");
//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$liste_etudiant = $mysqli->query("SELECT * FROM etudiant");
?>


<html>
<head>
    <title>Étudiants</title>
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
  <div class ='content'>
  
      <!-- Ajout d'un nouvel étudiant -->
      
      <button type ='button'><a href = form_creation_etudiant.php>Ajouter un nouvel étudiant</a></button>
      
      
      
      
    <!-- Affichage de la liste des étudiants -->
    <?php 
    if (mysqli_num_rows($liste_etudiant) > 0){
    ?>
      
      
  
    <table border="1" cellspacing ="2" cellpadding="5">
        
        <thead>
                <tr>
                    <th>Numéro de l'étudiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Admission</th>
                    <th>Filière</th>
                </tr>
        </thead>

        <tbody>
        
        <?php
        while ($donnees=mysqli_fetch_array($liste_etudiant))
		 {
        ?>
            <tr>
                    <td><?php echo $donnees['num_carte'];?></td>
                    <td><?php echo $donnees['nom'];?></td>
                    <td><?php echo $donnees['prenom'];?></td>
                    <td><?php echo $donnees['admission'];?></td>
                    <td><?php echo $donnees['filiere'];?></td>
            </tr>
        <?php
                 }
        ?>
        </tbody>
    </table>
  
    <?php
    }else{
        echo "Il n'y a aucun étudiant dans l'application";
    }
        
        
    ?>
   </div>
<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>	
</body>
</html>