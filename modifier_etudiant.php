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
    <title>Formulaire de modification étudiant</title>
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
  <form method ="post" action = "traitement_modifier_etudiant.php?id=<?php echo $etudiant->getNumEtu() ?>">
      
      <label>Numéro de carte étudiante : </label>
      <input type = "text" name ="num_etu" maxlength="5" minlength="5" pattern="\d*" value = "<?php echo $etudiant->getNumEtu()?>" required/>
      <p/>
            
      <label>Nom : </label>
      <input type = "text" name ="nom"  pattern = "^[a-zA-Z]+$" value = "<?php echo $etudiant->getNom()?>" required/>
      <p/>
      
      <label>Prénom : </label>
      <input type = "text" name ="prenom" pattern = "^[a-zA-Z]+$" value = "<?php echo $etudiant->getPrenom()?>" required/>
      <p/>
      
      <label>Admission : </label>
      <select name ="admission">
              
                <?php if ($etudiant->getAdmission() == "BR"){?><option value="BR" selected = "selected"><?php }else{ ?><option value="BR"><?php } ?>Branche (BR)</option>
                <?php if ($etudiant->getAdmission() == "TC"){?><option value="TC" selected = "selected"><?php }else{ ?><option value="TC"><?php } ?>Tronc Commun (TC)</option>
      </select>
      <p/>
      
      <label>Filière actuelle</label>
      <select name ="filiere">
                <?php if ($etudiant->getFiliere() == "?"){?><option value="?" selected = "selected"><?php }else{ ?><option value="?"><?php } ?>TCBR</option>
                <?php if ($etudiant->getFiliere() == "MPL"){?><option value="MPL" selected = "selected"><?php }else{ ?><option value="MPL"><?php } ?>MPL</option>
                <?php if ($etudiant->getFiliere() == "MSI"){?><option value="MSI" selected = "selected"><?php }else{ ?><option value="MSI"><?php } ?>MSI</option>
                <?php if ($etudiant->getFiliere() == "MRI"){?><option value="MRI" selected = "selected"><?php }else{ ?><option value="MRI"><?php } ?>MRI</option>
                <?php if ($etudiant->getFiliere() == "LIB"){?><option value="LIB" selected = "selected"><?php }else{ ?><option value="LIB"><?php } ?>LIB</option>
                
      </select>
      <p/>

      
      
      <input type="submit" value ="Modifier"/>    
      
  </form>
<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>	
</body>
</html>