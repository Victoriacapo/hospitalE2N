<?php

class Patients extends database {//creation class client qui heriteras de la class database cree ds la page modelbdd

    public $id; // attribué des attributs, correspond aux colonne de ma table 
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;
    public $search;
    
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
     * Fonction permettant d'afficher tous les patients
     * @return Execute Query SELECT 
     * 
     */
    public function showPatient() {   // correction autre possibilite: SELECT lastName, firstName, birthDate, IF(card = 1, "oui", "non") AS card, cardNumber FROM clients;
        $response = $this->database->query('SELECT `id`,`lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS birthdate, `phone`, `mail` FROM `patients`');
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data; //la fonction retourne data.
    }

    /**
     * Fonction permettant d'afficher un profil de patient
     * @return Execute Query SELECT 
     * 
     */
    public function profilPatient() {   // correction autre possibilite: SELECT lastName, firstName, birthDate, IF(card = 1, "oui", "non") AS card, cardNumber FROM clients;
        $query = 'SELECT * FROM `patients` WHERE `id`=:id';
        $afficherProfil = $this->database->prepare($query);
        $afficherProfil->bindValue(':id', $this->id, PDO::PARAM_INT); //recupere l'id
        $afficherProfil->execute();
        $patientprofil = $afficherProfil->fetch(PDO::FETCH_OBJ);
        return $patientprofil;
    }

    /**
     * Fonction permettant de recupérer les modifications des patients
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

    /**
     * Fonction permettant de supprimer un patient
     * @return Execute Query DELETE 
     * 
     */
    public function supprimerPatient() {
        $query = 'DELETE FROM `patients` WHERE `id`= :id';
        $supprimeokPatient = $this->database->prepare($query); //connexion database puis prepare la requete
        $supprimeokPatient->bindValue(':id', $this->id, PDO::PARAM_INT); //recuperation de l'attribut idPatient pr operer la modification sur la ligne du patient concerné
        return $supprimeokPatient->execute();
    }
    /**
     * Fonction permettant d'afficher un resultat pr la recherche de l'utilisateur
     * @return Execute Query SELECT 
     * 
     */
    public function searchPatient() {
        $query = 'SELECT * FROM patients WHERE lastname LIKE :search OR firstname LIKE :search ORDER BY lastname';
        $searchResult = $this->database->prepare($query);
        $searchResult->bindValue(':search', '%' . $this->search . '%', PDO::PARAM_STR); //lie la valeur de l'input search, on enleve le % de devant, si on veut que la recherche commence absolument par la lettre tapé, entourer par ls %, la recherche seras +vaste, selectionneras tout les mots contenant la lettre/ syllabe tapé.
        $searchResult->execute();
        $unResult = $searchResult->fetchAll(PDO::FETCH_OBJ);
        return $unResult;
    }
    /**
     * Fonction permettant de réaliser ma pagination
     * @return Execute Query 
     * 
     */
    public function pagination() {
        $query = 'SELECT * FROM patients '; //Nous récupérons le contenu de la requête dans $retour_total
        $retour_total = $this->database->prepare($query);
        $retour_total->execute();
        $retour_total->fetchAll();
        return $retour_total->rowCount();//rowCount() permet de me retourner le total en INT et non en STRING, le INT est nécessaire pr les opération à effectuer par la suite.
    }

    /*     * pour récupérer les messages de la page actuelle et organisé les données par page.
     * @return Execute Query 
     * 
     */
    public function patientbyPage($premiereEntree, $patientsParPage) {
        $query = 'SELECT * FROM patients ORDER BY lastname LIMIT ' . $premiereEntree . ',' . $patientsParPage . '';
        $retour_page = $this->database->prepare($query);
        $retour_page->execute();
        $pagePatient = $retour_page->fetchAll(PDO::FETCH_OBJ);
        return $pagePatient;
    }

}
