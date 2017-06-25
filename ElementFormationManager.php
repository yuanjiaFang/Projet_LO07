<?php
include_once("connexion/fonction_connexion.php");
include_once("CelementFormation.php");

/**
 * Created by PhpStorm.
 * User: David
 * Date: 17/05/2017
 * Time: 10:35
 */
class ElementFormationManager
{

    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(mysqli $db)
    {
        $this->db = $db;
    }


    public function addElementFormationEtudiant(ElementFormation $e, Etudiant $etu)
    {
        $num_etu = $etu->getNumEtu();
        $q = $this->db->prepare('INSERT INTO element_formation(sem_seq, sem_label, sigle, categorie, affectation, utt, profil, credit, resultat) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');

        $sem_seq = $e->getSem_seq();
        $sem_label = $e->getSem_label();
        $sigle = $e->getSigle();
        $categorie = $e->getCategorie();
        $affectation = $e->getAffectation();
        $utt = $e->getUtt();
        $profil = $e->getProfil();
        $credit = $e->getCredit();
        $resultat = $e->getResultat();

        $q->bind_param('dssssssss', $sem_seq, $sem_label, $sigle, $categorie, $affectation, $utt, $profil, $credit, $resultat);



        $q->execute();

        $id_element_formation = $this->db->insert_id;

        if($this->db->affected_rows > 0){
            echo $e."a bien été ajouté avec succès";
            $q2 = $this->db->prepare('INSERT INTO cursus(element_formation, num_etudiant) VALUES(?, ?)');
            $q2->bind_param('dd', $id_element_formation, $num_etu);
            $q2->execute();

            if($this->db->affected_rows > 0){
                echo "SUCCESS";
            }else{
                echo "ERREUR INSERTION LIEN ETUDIANT ET ELEMENT FORMATION";
            }


        }else{
            echo "ERREUR INSERTION ETUDIANT";
        }
    }


    public function deleteElementFormation($id_element)
    {
        $this->db->query('DELETE FROM cursus WHERE element_formation = '.$id_element);
        $this->db->query('DELETE FROM element_formation WHERE num_element = '.$id_element);
        return ($this->db->affected_rows > 0);
    }

    public function getElementFormation($id_element){
        $q = $this->db->query('SELECT * FROM element_formation e WHERE e.num_element = '.$id_element);
        $donnees = mysqli_fetch_assoc($q);
        
        return new ElementFormation($donnees['sem_seq'], $donnees['sem_label'], $donnees['sigle'], $donnees['categorie'], $donnees['affectation'], $donnees['utt'], $donnees['profil'], $donnees['credit'], $donnees['resultat'], $donnees['num_element']);

    }


    public function getListElementFormation(Etudiant $etu)
    {
        $liste_element_formation = [];

        $num_etu = $etu->getNumEtu();
        $q = $this->db->query('SELECT * FROM element_formation e, cursus c WHERE e.num_element = c.element_formation AND c.num_etudiant = '.$num_etu.' ORDER BY e.sem_seq, e.categorie');

        while ($donnees = mysqli_fetch_assoc($q))
        {
            $liste_element_formation[] = new ElementFormation($donnees['sem_seq'], $donnees['sem_label'], $donnees['sigle'], $donnees['categorie'], $donnees['affectation'], $donnees['utt'], $donnees['profil'], $donnees['credit'], $donnees['resultat'], $donnees['num_element']);
        }

        return $liste_element_formation;

    }

    public function addAllElementFormationEtudiant($tabElementFormation, Etudiant $e){
        $num_etu = $e->getNumEtu();
        foreach($tabElementFormation as $index => $elementFormation){
            $elementFormationObject = new ElementFormation($elementFormation[0], $elementFormation[1], $elementFormation[2], $elementFormation[3], $elementFormation[4], $elementFormation[5], $elementFormation[8], $elementFormation[6], $elementFormation[7], 0);
            $this->addElementFormationEtudiant($elementFormationObject, $e);
        }

        header('Location: modifier_cursus.php?id='.$num_etu);

    }

    public function getListElementFormationBySemester($liste_element_formation){

        $liste = [];

        foreach($liste_element_formation as $element_formation){
                $label_semestre = $element_formation->getSem_label();
                $liste[$label_semestre][] = $element_formation;
        }

        return $liste;

    }

    public function update(ElementFormation $e)
    {
        $q = $this->db->prepare('UPDATE element_formation SET sem_seq = ?, sem_label = ?, sigle = ?, categorie = ?, affectation = ?, utt = ?, profil = ?, credit = ?, resultat = ? WHERE num_element = ?');

        $sem_seq = $e->getSem_seq();
        $sem_label = $e->getSem_label();
        $sigle = $e->getSigle();
        $categorie = $e->getCategorie();
        $affectation = $e->getAffectation();
        $utt = $e->getUtt();
        $profil = $e->getProfil();
        $credit = $e->getCredit();
        $resultat = $e->getResultat();
        $num_element = $e->getIdElement();


        $q->bind_param('sssssssdsd', $sem_seq, $sem_label, $sigle, $categorie, $affectation, $utt, $profil, $credit, $resultat, $num_element);




        $q->execute();

        if($this->db->affected_rows > 0){
            echo $e."a bien été modifié avec succès";
        }else{
            echo "ERREUR MODIFICATION ELEMENT DE FORMATION";
        }

    }












}