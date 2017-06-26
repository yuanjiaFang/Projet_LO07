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
    <!-- Bootstrap
    <link href="css/bootstrap.min.css" rel="stylesheet">-->
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
      
      
  
    <table class = "table table-striped" border="1" cellspacing ="2" cellpadding="5">
        
        <thead>
                <tr>
                    <th>Numéro de l'étudiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Admission</th>
                    <th>Filière</th>
                    <th>Modification</th>
                    <th>Suppression</th>
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
                    <td><a href="modifier_etudiant.php?id=<?php echo $donnees['num_carte'] ?>"> <img class='icon' src='images/icone_cree.png' alt='Modifier un étudiant' title='Modifier un étudiant' width='30' height='30'></a></td>
                    <td><a href="supprimer_etudiant.php?id=<?php echo $donnees['num_carte'] ?> "onclick="return confirm('Êtes-vous certains de vouloir supprimer cet étudiant ?');"> <img class='icon' src='images/icone_croix.png' alt='Supprimer un étudiant' title='Supprimer un étudiant' width='30' height='30'></a></td>
                    
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