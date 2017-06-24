<?php
require 'fonctions_structure_page.php';
include_once("fonctions_structure_element_formation.php");
include_once("EtudiantsManager.php");
include_once("ElementFormationManager.php");
include_once("connexion/fonction_connexion.php");
//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();

//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$num_etu = $_GET['id'];
$managerEtudiant = new EtudiantsManager($mysqli);
$managerElementFormation = new ElementFormationManager($mysqli);
$etudiant = $managerEtudiant->getEtu($num_etu);
?>


<html>
<head>
    <title>Cursus</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            var max_fields      = 100; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append("<?php getFormElementFormation(true)?>"); //Ajout de formulaire lors du clique
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>
</head>
<body>
   <header> 
       <?php
       get_header("cursus");
       ?>
    </header>  
  <!--==============================content================================-->
  <div class ='content'>

      <!-- Informations sur l'étudiant -->
      <?php echo $etudiant->getNom()." ".$etudiant->getPrenom()."<br>"; ?>
      <?php echo "Numéro étudiant : ".$etudiant->getNumEtu()."<br>"; ?>
      <?php echo "Admis en ".$etudiant->getAdmission()." et actuellement en filière ".$etudiant->getFiliere()."<br>"; ?>

      <!-- Élément de formation déjà existant -->
        <br>
      <div class = 'element_formation_existant'>
          <?php

          $liste_element_formation = $managerElementFormation->getListElementFormation($etudiant);

          if (count($liste_element_formation) > 0){

              foreach($liste_element_formation as $element_formation){
                  echo $element_formation;
              }


          }else{
              echo "Cet étudiant n'a pas encore affecté des éléments de formation.";
          }?>

      </div>


      <!-- Ajout de élément de formation -->
      <div class = 'element_formation'>
      <form method ='post' action = 'traitement_ajout_element_formation.php?id=<?php echo $num_etu; ?>'>
          <br>
          <?php getFormElementFormation()?>
          <div class="input_fields_wrap">
          </div>
          <img class='add_field_button' src='images/icone_ajouter.png' alt='Ajouter un élément de formation' title='Ajouter un élément de formation' width='30' height='30'>
          <br>
          <input type="submit" value ="Ajouter des cursus"/>
      </form>
      </div>






  </div>


  
      
<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>	
</body>
</html>