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
    if (mysqli_num_rows($liste_etudiant) > 0){
    ?>
   <table border="1" cellspacing ="2" cellpadding="5">

       <thead>
       <tr>
           <th>Étudiants</th>
           <th>Modification du cursus</th>
           <th>Affichage du cursus</th>
       </tr>
       </thead>

       <tbody>
    <?php
        while ($donnees=mysqli_fetch_array($liste_etudiant))
        {
    ?>

            <tr>
                <td align="center"><?php echo $donnees['nom']." ".$donnees['prenom'];?></td>
                <td align="center"><a href="modifier_cursus.php?id=<?php echo $donnees['num_carte'];?>"> <img class='icon' src='images/icone_cree.png' alt='Modifier un cursus' title='Modifier un cursus' width='30' height='30'></a></td>
                <td align="center"><a href="afficher_etudiant.php?id=<?php echo $donnees['num_carte']; ?>"> <img class='icon' src='images/icone_liste.png' alt='Afficher un cursus' title='Afficher un cursus' width='30' height='30'></a></td>
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