<?php
require 'fonctions_structure_page.php';
include_once("connexion/fonction_connexion.php");
//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$liste_reglement = $mysqli->query("SELECT * FROM reglement");
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
   <div class="content">


    <form method="POST" action="import_reglement.php" enctype="multipart/form-data">
        <label>Importation du règlement avec un fichier CSV : </label>
        <input type="file" name="importreglement">
        <input type="submit" name="envoyer" value="Importer le CSV">
        </form>

       <?php

       if(isset($_GET['message'])){
           echo $_GET['message'];
       }

       echo "<h2>Règlement dans l'application</h2>";

        if(mysqli_num_rows($liste_reglement) > 0){

            echo "<table class = \"table table-striped\" border=\"1\" cellspacing =\"2\" cellpadding=\"5\"> <thead>
                <tr>
                    <th>Nom règlement</th>
                    <th>Application du règlement</th>
                    <th>Suppression</th> 
                </tr>
            </thead>
            <tbody>";

            while($donnees = mysqli_fetch_array($liste_reglement)) {
                echo "<tr>";
                    echo "<td>".$donnees['nom_reglement']."</td>";
                    if($donnees['application']){
                        echo "<td><img class='icon' src='images/activer.png' alt='Règlement actuel' title='Règlement actuel' width='30' height='30'></td>";

                        }else{?>
                        <td><a href="activer_reglement.php?id=<?php echo $donnees['num_reglement'] ?> "onclick="return confirm('Êtes-vous certains de vouloir de activer ce règlement ?');"> <img class='icon' src='images/desactiver.png' alt='Activer un règlement' title='Activer un règlement' width='30' height='30'></a></td>
<?php
                    }
                    ?>

                <td><a href="supprimer_reglement.php?id=<?php echo $donnees['num_reglement'] ?> "onclick="return confirm('Êtes-vous certains de vouloir supprimer ce règlement ?');"> <img class='icon' src='images/icone_croix.png' alt='Supprimer un règlement' title='Supprimer un règlement' width='30' height='30'></a></td>


                <?php
                echo "</tr>";

            }

            echo "
            </tbody>
            </table>";
        }else{
            echo "Il n'y a pas de règlement dans l'application.";
        }

       if(isset($_GET['message_suppr'])){
           echo "<br><br>".$_GET['message_suppr'];
       }


       ?>

   </div>
<!--==============================footer=================================-->
  <?php 
       getFooter();
  ?>
</body>
</html>