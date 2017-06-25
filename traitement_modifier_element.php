<?php
require 'fonctions_structure_page.php';
include_once("ElementFormationManager.php");
$num_element = $_GET["id"];
$num_etu = $_GET["numEtu"];

//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$managerElement = new ElementFormationManager($mysqli);

?>


<html>
<head>
    <title>Modification d'un étudiant</title>
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
<?php
$new_element = new ElementFormation($_POST['sem_seq'], $_POST['sem_label'], $_POST['sigle'], $_POST['categorie'], $_POST['affectation'], $_POST['utt'], $_POST['profil'], $_POST['credit'], $_POST['resultat'], $num_element);
$managerElement->update($new_element);
header('Location: modifier_cursus.php?id='.$num_etu);
exit();
?>
<!--==============================footer=================================-->
<?php
getFooter();
?>
</body>
</html>