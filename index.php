<?php
require 'fonctions_structure_page.php';	 
?>



<html>
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>
<body>
   <header> 
       <?php 
       get_header("accueil");
       ?>
    </header>  
  <!--==============================content================================-->

   <div class = "content">
    <p>
        Bonjour, bienvennue sur l'application de gestion de cursus d'un étudiant.
    </p>
       <img class='icon' src='images/home.jpg'  width='500' height='350'>
    </div>

<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>	
</body>
</html>