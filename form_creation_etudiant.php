<?php
require 'fonctions_structure_page.php';
?>


<html>
<head>
    <title>Formulaire de création étudiant</title>
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
  <form method ="post" action = "traitement_creation_etudiant.php">
      
      <label>Numéro de carte étudiante : </label>
      <input type = "text" name ="num_etu"/>
      <p/>
            
      <label>Nom : </label>
      <input type = "text" name ="nom"/>
      <p/>
      
      <label>Prénom : </label>
      <input type = "text" name ="prenom"/>
      <p/>
      
      <label>Admission : </label>
      <select name ="admission">
                <option value="BR">Branche (BR)</option>
                <option value="TC">Tronc Commun (TC)</option>
      </select>
      <p/>
      
      <label>Filière actuelle</label>
      <select name ="filiere">
                <option value="?">TCBR</option>
                <option value="MPL">MPL</option>
                <option value="MSI">MSI</option>
                <option value="MRI">MRI</option>
                <option value="LIB">LIB</option>
      </select>
      <p/>
      
      
      <input type="submit" value ="Envoyer"/>    
      <input type="reset" value ="Rénitialiser"/>
      
  </form>
<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>	
</body>
</html>