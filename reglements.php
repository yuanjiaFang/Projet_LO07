<?php
require 'fonctions_structure_page.php';
?>


<html>
<head>
    <title>Règlements</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>
<body>
   <header> 
       <?php
       get_header("reglements");
       ?>
    </header>  
  <!--==============================content================================-->
    <?php 
        echo "Hello les règlements!";
    ?>
<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>
</body>
</html>