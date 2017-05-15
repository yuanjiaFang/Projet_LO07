<?php 

    function get_header($onglet){
       
       
         echo "<div>";
            echo "<div> ";         	
                echo "<h1><a href='index.html'><img src='images/logo.png' alt='' height='80' width='180'></a></h1>";
                echo "<nav>";
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
    
    
    
    
?>