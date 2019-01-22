<?php

class Patients extends database {//creation class client qui heriteras de la class database cree ds la page modelbdd

    public $id; // attribué des attributs, correspond aux colonne de ma table 
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;

    /**
     * Fonction permettant de rajouter un patient
     * @return Execute Query INSERT INTO
     * 
     */
    public function ajoutPatient() {
        //variable query stocke ma requete pour inserer les donnee de mon formulaire
        $query = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES(:lastname, :firstname, :birthdate, :phone, :mail)'; //:lastname = marqueur nominatif
        $addPatient = $this->database->prepare($query); //connexion database puis prepare la requete
        $addPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $addPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $addPatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $addPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $addPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $addPatient->execute();
    }
    
    /**
     * Fonction permettant d'afficher les patients
     * @return Execute Query SELECT 
     * 
     */
    public function showPatient() {   // correction autre possibilite: SELECT lastName, firstName, birthDate, IF(card = 1, "oui", "non") AS card, cardNumber FROM clients;
        $response = $this->database->query('SELECT `id`,`lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS birthdatefrench, `phone`, `mail` FROM `patients`');
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data; //la fonction retourne data.
    }
    
/**
     * Fonction permettant d'afficher un profil de patient
     * @return Execute Query SELECT 
     * 
     */
    public function profilPatient() {   // correction autre possibilite: SELECT lastName, firstName, birthDate, IF(card = 1, "oui", "non") AS card, cardNumber FROM clients;
        $query = 'SELECT *, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS birthdate FROM `patients` WHERE `id`=:id';
        $afficherProfil = $this->database->prepare($query);
        $afficherProfil->bindValue(':id', $this->id, PDO::PARAM_INT); //recupere l'id
        $afficherProfil->execute();
        $patientprofil = $afficherProfil->fetch(PDO::FETCH_OBJ);
        return $patientprofil;
    }

    /**
     * Fonction permettant d'afficher les patients
     * @return Execute Query UPDATE 
     * 
     */
    public function modifPatient() {
        //variable query stocke ma requete pour inserer les donnee de mon formulaire
        $query = 'UPDATE `patients` SET `lastname`= :lastname, `firstname`=:firstname, `birthdate`= :birthdate, `phone`= :phone, `mail`= :mail WHERE `id`= :id'; //:lastname = marqueur nominatif
        $replacePatient = $this->database->prepare($query); //connexion database puis prepare la requete
        $replacePatient->bindValue(':id', $this->id, PDO::PARAM_INT); //recuperation de l'attribut id
        $replacePatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $replacePatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $replacePatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $replacePatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $replacePatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $replacePatient->execute();
    }

}
