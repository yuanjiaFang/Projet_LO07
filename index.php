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
    <?php 
        echo "Hello l'accueil!";
    ?>
<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>	
</body>
</html>