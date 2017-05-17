<?php





function getFormElementFormation($id_etu, $supp = false){

    $tabYesNo = ["Y" => "Oui", "N" => "Non"];
    $tabCategorie = ["CS" => "CS", "TM" => "TM", "EC" => "EC", "HT" => "HT", "ME" => "ME", "ST" => "ST", "SE" => "SE", "HP" => "HP", "NPML" => "NPML" ];
    $tabAffectation = ["TC" => "TC", "TCBR" => "TCBR", "FCBR" => "FCBR"];
    $tabResultat = ["A" => "A", "B" => "B", "C" => "C", "D" => "D", "E" => "E", "F" => "F", "ABS" => "ABS", "RES" => "RES", "ADM" => "ADM"];
    echo "<div class = 'element_formation'>";
    getInputText("semSeq", "Numéro de semestre à l'UTT ", "semSeq[]");
    getInputText("semLabel", "Label du semestre ", "semLabel[]");
    getInputText("sigle", "Sigle de l'élément de formation ", "sigle[]");
    getSelect($tabCategorie, "categorie[]", "Catégorie ");
    getSelect($tabAffectation, "affectation[]", "Affectation ");
    getSelect($tabYesNo, "utt[]", "Suivi à l'UTT ");
    getInputText("credit", "Crédits obtenus ", "credit[]");
    getSelect($tabResultat, "resultat[]", "Résultat ");

    echo "<br>";
    if($supp) {
        echo "<a href='#' class='remove_field'>Supprimer</a>";
    }
    echo "</div>";

}