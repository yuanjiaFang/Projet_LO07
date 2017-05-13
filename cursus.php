<?php
require 'fonctions_structure_page.php';
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
    <?php 
        echo "Hello les cursus!";
    ?>
<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>	
</body>
</html>