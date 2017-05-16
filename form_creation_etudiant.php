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
  <div class ='content'>
  <form method ="post" action = "traitement_creation_etudiant.php">
      
      <label>Numéro de carte étudiante : </label>
      <input type = "text" name ="num_etu" maxlength="5" minlength="5" pattern="\d*" required/>
      <p/>
            
      <label>Nom : </label>
      <input type = "text" name ="nom"  pattern = "^[a-zA-Z]+$" required/>
      <p/>
      
      <label>Prénom : </label>
      <input type = "text" name ="prenom" pattern = "^[a-zA-Z]+$" required/>
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
  </div>
<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>	
</body>
</html>