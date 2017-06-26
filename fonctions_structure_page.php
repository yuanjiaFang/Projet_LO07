<?php
include_once("connexion/fonction_connexion.php");




    function get_header($onglet){
       
       
         echo "<div>";
            echo "<div> ";         	
                echo "<h1><a href='index.php'><img src='images/logo.png' alt='' height='80' width='180'></a></h1>";
                echo "<nav >";
                 echo "<ul class='menu'>";
                        if ($onglet == "accueil"){
                            echo "<li class='current'><a href='index.php'>Accueil</a></li>";
                        }else{
                            echo "<li><a href='index.php'>Accueil</a></li>";
                        }
                        if ($onglet == "etudiants"){
                            echo "<li class='current'><a href='etudiants.php'>Étudiants</a></li>";
                        }else{
                            echo "<li><a href='etudiants.php'>Étudiants</a></li>";
                        }
                        
                        if ($onglet == "cursus"){
                            echo "<li class='current'><a href='cursus.php'>Cursus</a></li>";
                        }else{
                            echo "<li><a href='cursus.php'>Cursus</a></li>";
                        }
                        
                        if ($onglet == "reglements"){
                            echo "<li class='current'><a href='reglements.php'>Règlements</a></li>";
                        }else{
                            echo "<li><a href='reglements.php'>Règlements</a></li>";
                        }
                    echo "</ul>";
                echo "</nav>";
                echo "<div class='clear'></div>";
            echo "</div>";
          echo "</div>";
             
    }
    
    function getFooter(){
            
        echo "<footer>";
            echo "<p>Printemps 2017<br>LO07 | Gestion de cursus ISI</p>";
        echo "</footer>";
        
    }

    function getInputText($nameLabel, $label, $inputName){

        echo "<label name = '$nameLabel'>$label</label>";
        echo "<input autocomplete = 'off' type = 'text' name = '$inputName' required/><br>";
    }

    function getInputTextSigleEF($nameLabel, $label, $inputName){
        //Ouverture d'une nouvelle connexion à la base de données MySQL.
        $mysqli = connexion();
        $requete_sigle = $mysqli->query("SELECT DISTINCT sigle FROM element_formation");

        echo "<label name = '$nameLabel'>$label</label>";
        echo "<input required list = 'liste_sigle' autocomplete = 'off' type = 'text' name = '$inputName' required/><br>";
        echo "<datalist id='liste_sigle'>";
        while ($donnees_liste_sigle=mysqli_fetch_array($requete_sigle)){
        $sigle_suggestion = $donnees_liste_sigle['sigle'];

        echo "<option value='$sigle_suggestion'>$sigle_suggestion</option>";
        }
        echo "</datalist>";

    }

function getInputTextSigleLabel($nameLabel, $label, $inputName){
    //Ouverture d'une nouvelle connexion à la base de données MySQL.
    $mysqli = connexion();
    $requete_label = $mysqli->query("SELECT DISTINCT sem_label FROM element_formation");

    echo "<label name = '$nameLabel'>$label</label>";
    echo "<input required list = 'liste_label' autocomplete = 'off' type = 'text' name = '$inputName' required/><br>";
    echo "<datalist id='liste_label'>";
    while ($donnees_liste_label=mysqli_fetch_array($requete_label)){
        $label_suggestion = $donnees_liste_label['sem_label'];

        echo "<option value='$label_suggestion'>$label_suggestion</option>";
    }
    echo "</datalist>";

}




    function getSelect($tabOptn, $name, $label){
        echo "<label>$label </label>";
        echo "<select name = '$name'>";
        foreach($tabOptn as $value => $option){
            echo "<option value='$value'>$option</option>";
        }
        echo "</select><br>";
    }


    
    
    
    
?>