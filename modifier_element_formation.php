<?php
require 'fonctions_structure_page.php';
include_once("ElementFormationManager.php");
$num_etu = $_GET["numEtu"];
$num_element = $_GET["id"];

//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();


//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$managerElementFormation = new ElementFormationManager($mysqli);
$elementFormation = $managerElementFormation->getElementFormation($num_element);

?>


<html>
<head>
    <title>Formulaire de modification éléments de formation</title>
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
<div class ='content'>
    <form method ="post" action = "traitement_modifier_element.php?id=<?php echo $num_element."&numEtu=".$num_etu; ?>">

        <label>Numéro du semestre : </label>
        <input type = "text" name ="sem_seq" maxlength="1" minlength="1" pattern="\d*" value = "<?php echo $elementFormation->getSem_seq()?>" required/>
        <p/>

        <label>Label du semestre : </label>
        <input type = "text" name ="sem_label" value = "<?php echo $elementFormation->getSem_label()?>" required/>
        <p/>

        <label>Sigle : </label>
        <input type = "text" name ="sigle" value = "<?php echo $elementFormation->getSigle()?>" required/>
        <p/>

        <label>Catégorie : </label>
        <select name ="categorie">

            <?php if ($elementFormation->getCategorie() == "CS"){?><option value="CS" selected = "selected"><?php }else{ ?><option value="CS"><?php } ?>CS</option>
            <?php if ($elementFormation->getCategorie() == "TM"){?><option value="TM" selected = "selected"><?php }else{ ?><option value="TM"><?php } ?>TM</option>
            <?php if ($elementFormation->getCategorie() == "EC"){?><option value="EC" selected = "selected"><?php }else{ ?><option value="EC"><?php } ?>EC</option>
            <?php if ($elementFormation->getCategorie() == "CT"){?><option value="CT" selected = "selected"><?php }else{ ?><option value="CT"><?php } ?>CT</option>
            <?php if ($elementFormation->getCategorie() == "HT"){?><option value="HT" selected = "selected"><?php }else{ ?><option value="HT"><?php } ?>HT</option>
            <?php if ($elementFormation->getCategorie() == "ME"){?><option value="ME" selected = "selected"><?php }else{ ?><option value="ME"><?php } ?>ME</option>
            <?php if ($elementFormation->getCategorie() == "ST"){?><option value="ST" selected = "selected"><?php }else{ ?><option value="ST"><?php } ?>ST</option>
            <?php if ($elementFormation->getCategorie() == "SE"){?><option value="SE" selected = "selected"><?php }else{ ?><option value="SE"><?php } ?>SE</option>
            <?php if ($elementFormation->getCategorie() == "HP"){?><option value="HP" selected = "selected"><?php }else{ ?><option value="HP"><?php } ?>HP</option>
            <?php if ($elementFormation->getCategorie() == "NPML"){?><option value="NPML" selected = "selected"><?php }else{ ?><option value="NPML"><?php } ?>NPML</option>
        </select>
        <p/>

        <label>Affectation : </label>
        <select name ="affectation">

            <?php if ($elementFormation->getAffectation() == "TC"){?><option value="TC" selected = "selected"><?php }else{ ?><option value="TC"><?php } ?>TC</option>
            <?php if ($elementFormation->getAffectation() == "TCBR"){?><option value="TCBR" selected = "selected"><?php }else{ ?><option value="TCBR"><?php } ?>TCBR</option>
            <?php if ($elementFormation->getAffectation() == "FCBR"){?><option value="FCBR" selected = "selected"><?php }else{ ?><option value="FCBR"><?php } ?>FCBR</option>

        </select>
        <p/>

        <label>UTT : </label>
        <select name ="utt">

            <?php if ($elementFormation->getUtt() == "Y"){?><option value="Y" selected = "selected"><?php }else{ ?><option value="Y"><?php } ?>Y</option>
            <?php if ($elementFormation->getUtt() == "N"){?><option value="N" selected = "selected"><?php }else{ ?><option value="N"><?php } ?>N</option>

        </select>
        <p/>

        <label>Profil : </label>
        <select name ="profil">

            <?php if ($elementFormation->getProfil() == "Y"){?><option value="Y" selected = "selected"><?php }else{ ?><option value="Y"><?php } ?>Y</option>
            <?php if ($elementFormation->getProfil() == "N"){?><option value="N" selected = "selected"><?php }else{ ?><option value="N"><?php } ?>N</option>

        </select>
        <p/>

        <label>Crédit : </label>
        <input type = "text" name ="credit" maxlength="2" minlength="1" pattern="\d*" value = "<?php echo $elementFormation->getCredit()?>" required/>
        <p/>

        <label>Résultat : </label>
        <select name ="resultat">

            <?php if ($elementFormation->getResultat() == "A"){?><option value="A" selected = "selected"><?php }else{ ?><option value="A"><?php } ?>A</option>
            <?php if ($elementFormation->getResultat() == "B"){?><option value="B" selected = "selected"><?php }else{ ?><option value="B"><?php } ?>B</option>
            <?php if ($elementFormation->getResultat() == "C"){?><option value="C" selected = "selected"><?php }else{ ?><option value="C"><?php } ?>C</option>
            <?php if ($elementFormation->getResultat() == "D"){?><option value="D" selected = "selected"><?php }else{ ?><option value="D"><?php } ?>D</option>
            <?php if ($elementFormation->getResultat() == "E"){?><option value="E" selected = "selected"><?php }else{ ?><option value="E"><?php } ?>E</option>
            <?php if ($elementFormation->getResultat() == "F"){?><option value="F" selected = "selected"><?php }else{ ?><option value="F"><?php } ?>F</option>
            <?php if ($elementFormation->getResultat() == "EQU"){?><option value="EQU" selected = "selected"><?php }else{ ?><option value="EQU"><?php } ?>EQU</option>
            <?php if ($elementFormation->getResultat() == "ADM"){?><option value="ADM" selected = "selected"><?php }else{ ?><option value="ADM"><?php } ?>ADM</option>
            <?php if ($elementFormation->getResultat() == "RES"){?><option value="RES" selected = "selected"><?php }else{ ?><option value="RES"><?php } ?>RES</option>
            <?php if ($elementFormation->getResultat() == "ABS"){?><option value="ABS" selected = "selected"><?php }else{ ?><option value="ABS"><?php } ?>ABS</option>



        </select>
        <p/>






        <input type="submit" value ="Modifier"/>

    </form>
</div>
<!--==============================footer=================================-->
<?php
getFooter();
?>
</body>
</html>