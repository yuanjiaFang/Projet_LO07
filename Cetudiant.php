<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Etudiant{
    
    private $num_etu;
    private $nom;
    private $prenom;
    private $admission;
    private $filiere;
    
    public function __construct($num_etu, $nom, $prenom, $admission, $filiere) {
        $this->setNumEtu($num_etu);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAdmission($admission);
        $this->setFiliere($filiere);
    }
    
    public function getNumEtu(){
        return $this->num_etu;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function getPrenom(){
        return $this->prenom;
    }
    
    public function getAdmission(){
        return $this->admission;
    }
    
    public function getFiliere(){
        return $this->filiere;
    }
    
    public function setNumEtu($num_etu){
        $this->num_etu = $num_etu;
    }
    
    public function setNom($nom){
        $this->nom = $nom;
    }
    
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    
    public function setAdmission($admission){
        $this->admission = $admission;
    }
    
    public function setFiliere($filiere){
        $this->filiere = $filiere;
    }
    
    function __toString(){
        return "Étudiant : ($this->num_etu, $this->nom, $this->prenom, $this->admission, $this->filiere)<br>\n";
    }
    
    
    
}

