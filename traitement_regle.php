<?php

//Ouverture d'une nouvelle connexion à la base de données MySQL.
$mysqli = connexion();

//Message si il y a une erreur de connexion à la base.
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

function getNumReglement($db){
    $q = $db->query("SELECT num_reglement FROM reglement WHERE application = 1");

    if(mysqli_num_rows($q) > 0) {
        $donnees = mysqli_fetch_array($q);
        return $donnees['num_reglement'];
    }else{
        return -1;
    }

}

function affiche_resultat($resultat, $seuil){
    if($resultat >= $seuil){
        echo "<img class='icon' src='images/valider.png' width='10' height='10'>";
    }else{
        echo "<img class='icon' src='images/non_valider.png' width='10' height='10'>";
    }
}

function getListElementRegle($num_reglement,$db){
    $list_Element_Regle = array();
    $resultat = $db->query("select * from description_reglement d, element_regle e where d.reglement ='".$num_reglement."' and d.element_regle = e.num_element order by label_regle");
    while ($donnees = $resultat->fetch_assoc()){
        $list_Element_Regle[] = array('num_element' => $donnees['num_element'], 'label_regle' => $donnees['label_regle'], 'agregat' => $donnees['agregat'], 'cible_agregat' => $donnees['cible_agregat'], 'etape' => $donnees['etape'], 'seuil' => $donnees['seuil']);
    }
    return $list_Element_Regle;
}

//Cacul CS + TM de TCBR
function getCstm_tcbr($listElement){
    $cstm_tcbr = 0;
    foreach($listElement as $elem){
        if (strcmp($elem->getAffectation(),"TCBR") == 0){
            if (strcmp($elem->getCategorie(),"CS") == 0 || (strcmp($elem->getCategorie(),"TM") == 0) ){
                $cstm_tcbr += $elem->getCredit();
            }
        }
    }
    return $cstm_tcbr;
}

//Calcul CS + TM de FCBR
function getCstm_fcbr($listElement) {
    $cstm_fcbr = 0;
    foreach($listElement as $elem) {
        if (strcmp($elem->getAffectation(),"FCBR") == 0){
            if (strcmp($elem->getCategorie(),"CS") == 0|| (strcmp($elem->getCategorie(),"TM") == 0) ){
                $cstm_fcbr += $elem->getCredit();
            }
        }
    }
    return $cstm_fcbr;
}

function getCs_br($listElement) {
    $cs_br = 0;
    foreach($listElement as $elem) {
        if (strcmp($elem->getAffectation(),"BR") == 0 || strcmp($elem->getAffectation(),"TCBR") == 0 || strcmp($elem->getAffectation(),"FCBR") == 0 ){
            if (strcmp($elem->getCategorie(),"CS") == 0){
                $cs_br += $elem->getCredit();
            }
        }
    }
    return $cs_br;
}

function getTm_br($listElement) {
    $tm_br = 0;
    foreach($listElement as $elem) {
        if (strcmp($elem->getAffectation(),"BR") == 0 || strcmp($elem->getAffectation(),"TCBR") == 0 || strcmp($elem->getAffectation(),"FCBR") == 0 ){
            if (strcmp($elem->getCategorie(),"TM") == 0){
                $tm_br += $elem->getCredit();
            }
        }
    }
    return $tm_br;
}

function getSt_tcbr($listElement) {
    $st_tcbr = 0;
    foreach($listElement as $elem) {
        if (strcmp($elem->getAffectation(),"TCBR") == 0){
            if (strcmp($elem->getCategorie(),"ST") == 0){
                $st_tcbr += $elem->getCredit();
            }
        }
    }
    return $st_tcbr;
}

function getSt_fcbr($listElement) {
    $st_fcbr = 0;
    foreach($listElement as $elem) {
        if (strcmp($elem->getAffectation(),"FCBR") == 0){
            if (strcmp($elem->getCategorie(),"ST") == 0){
                $st_fcbr += $elem->getCredit();
            }
        }
    }
    return $st_fcbr;
}

function getEc_br($listElement) {
    $ec_br = 0;
    foreach($listElement as $elem) {
        if (strcmp($elem->getAffectation(),"BR") == 0 || strcmp($elem->getAffectation(),"TCBR") == 0 || strcmp($elem->getAffectation(),"FCBR") == 0 ){
            if (strcmp($elem->getCategorie(),"EC") == 0){
                $ec_br += $elem->getCredit();
            }
        }
    }
    return $ec_br;
}

function getMe_br($listElement) {
    $me_br = 0;
    foreach($listElement as $elem) {
        if (strcmp($elem->getAffectation(),"BR") == 0 || strcmp($elem->getAffectation(),"TCBR") == 0 || strcmp($elem->getAffectation(),"FCBR") == 0 ){
            if (strcmp($elem->getCategorie(),"ME") == 0){
                $me_br += $elem->getCredit();
            }
        }
    }
    return $me_br;
}

function getCt_br($listElement) {
    $ct_br = 0;
    foreach($listElement as $elem) {
        if (strcmp($elem->getAffectation(),"BR") == 0 || strcmp($elem->getAffectation(),"TCBR") == 0 || strcmp($elem->getAffectation(),"FCBR") == 0 ){
            if (strcmp($elem->getCategorie(),"CT") == 0){
                $ct_br += $elem->getCredit();
            }
        }
    }
    return $ct_br;
}

function getMect_br($listElement) {
    $mect_br = 0;
    foreach($listElement as $elem) {
        if (strcmp($elem->getAffectation(),"BR") == 0 || strcmp($elem->getAffectation(),"TCBR") == 0 || strcmp($elem->getAffectation(),"FCBR") == 0 ){
            if (strcmp($elem->getCategorie(),"ME") == 0 || strcmp($elem->getCategorie(),"CT") == 0 ){
                $mect_br += $elem->getCredit();
            }
        }
    }
    return $mect_br;
}

function getCstm_utt($listElement) {
    $cstm_utt = 0;
    foreach($listElement as $elem) {
        if (strcmp($elem->getUtt(),"Y") == 0){
            if (strcmp($elem->getCategorie(),"CS") == 0|| (strcmp($elem->getCategorie(),"TM") == 0) ){
                $cstm_utt += $elem->getCredit();
            }
        }
    }
    return $cstm_utt;
}

function getSe($listElement){
    $se = false;
    foreach ($listElement as $elem) {
        if (strcmp($elem->getCategorie(), "SE") == 0 && strcmp($elem->getResultat(), "ADM") == 0) {
            $se = true;
        }
    }
    return $se;
}

function getNpml($listElement){
    $npml = false;
    foreach ($listElement as $elem) {
        if (strcmp($elem->getCategorie(), "NPML") == 0 && strcmp($elem->getResultat(), "ADM") == 0) {
            $npml = true;
        }
    }
    return $npml;
}

function getAll($listElement){
    $all = 0;
    foreach ($listElement as $item) {
        $all += $item->getCredit();
    }
    return $all;
}

function getCstm_br($listElement) {
    $cstm_br = 0;
    foreach($listElement as $elem) {

            if (strcmp($elem->getCategorie(),"CS") == 0|| (strcmp($elem->getCategorie(),"TM") == 0) ){
                $cstm_br += $elem->getCredit();
            }

    }
    return $cstm_br;
}
?>