
<?php

class Appointments extends database {//creation class client qui heriteras de la class database cree ds la page modelbdd

    public $id; // attribué des attributs, correspond aux colonne de ma table 
    public $dateHour;
    public $idPatients;

    /**
     * Fonction permettant de rajouter un RDV
     * @return Execute Query INSERT INTO
     * 
     */
    public function ajoutRDV() {
        //variable query stocke ma requete pour inserer les donnee de mon formulaire
        $query = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES(:dateHour, :idPatients)'; //:lastname = marqueur nominatif
        $addRDV = $this->database->prepare($query); //connexion database puis prepare la requete
        $addRDV->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $addRDV->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $addRDV->execute();
    }

    /**
     * Fonction permettant d'afficher les RDV
     * @return Execute Query SELECT 
     * 
     */
    public function showRDV() {
        $response = $this->database->query('SELECT '
                . 'appointments.id, '
                . 'DATE_FORMAT(dateHour, \'%d/%m/%Y\') AS date, ' //j'indique comment je veux qu'il affiche la date en m'affichant le dateHour
                . 'DATE_FORMAT(dateHour, \'%H:%i\') AS time, ' //j'indique comment je veux qu'il affiche l'heure
                . 'lastname, '
                . 'firstname, '
                . 'phone, '
                . 'mail, '
                . 'DATE_FORMAT(birthdate, \'%d/%m/%Y\') AS birthdatefrench '
                . 'FROM `appointments` '
                . 'INNER JOIN `patients` '
                . 'ON appointments.idPatients = patients.id');
        // . 'ORDER BY dateHour ');
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data; //la fonction retourne data.
    }

    /**
     * Fonction permettant d'afficher les RDV par id de rdv
     * @return Execute Query SELECT 
     * 
     */
    public function RDVbyID() {
        $query = 'SELECT' //dateHour concatene 2 valeurs qui sont la date et l'heure, je les sépare ds la requête de la façon qui suit:
                . ' appointments.id,'
                . ' DATE_FORMAT(dateHour, \'%Y-%m-%d\') AS date,' //renvoie dateHour au format %Y-%m-%d pr la date
                . ' DATE_FORMAT(dateHour, \'%H:%i\') AS time,' //renvoie dateHour au format %H:%i  pr l'heure
                . ' lastname,'
                . ' firstname'
                . ' FROM appointments'
                . ' INNER JOIN `patients`' //jointure 
                . ' ON appointments.idPatients = patients.id'
                . ' WHERE `appointments`.`id`= :idAppointment';
        $afficherRDV = $this->database->prepare($query);
        $afficherRDV->bindValue(':idAppointment', $this->id, PDO::PARAM_INT); //recupere l'id
        $afficherRDV->execute();
        $resultRDV = $afficherRDV->fetch(PDO::FETCH_OBJ);
        return $resultRDV;
    }

    /**
     * Fonction permettant de modifier les RDV
     * @return Execute Query UPDATE 
     * 
     */
    public function modifRDV() {
        //variable query stocke ma requete pour inserer les donnee de mon formulaire
        $query = 'UPDATE `appointments` SET `dateHour`= :dateHour WHERE `id`= :id'; //:dateHour = marqueur nominatif
        $replaceRDV = $this->database->prepare($query); //connexion database puis prepare la requete
        $replaceRDV->bindValue(':id', $this->id, PDO::PARAM_INT); //recuperation de l'attribut idPatient pr operer la modification sur la ligne du patient concerné
        $replaceRDV->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        return $replaceRDV->execute();
    }

    /**
     * Fonction permettant d'afficher les RDV par patient
     * @return Execute Query SELECT 
     * 
     */
    public function ongletRDV() {
        $query = 'SELECT '
        . 'appointments.id, '
        . 'patients.id, '
        . 'DATE_FORMAT(dateHour, \'%d-%m-%Y\') AS date, '
        . 'DATE_FORMAT(dateHour, \'%H:%i\') AS time '
        . 'FROM `appointments` '
        . 'INNER JOIN `patients` '
        . 'ON appointments.idPatients = patients.id '
        . 'WHERE patients.id = :idPatients';
        $RDVsurprofil = $this->database->prepare($query);
        $RDVsurprofil->bindValue(':idPatients', $this->idPatients, PDO::PARAM_STR); //recupere l'id
        $RDVsurprofil->execute();
        $RDVok = $RDVsurprofil->fetchAll(PDO::FETCH_OBJ);
        return $RDVok;
    }
/**
     * Fonction permettant de supprimer un RDV
     * @return Execute Query DELETE 
     * 
     */
    public function supprimerRDV() {
        $query = 'DELETE FROM `appointments` WHERE `id`= :id'; 
        $supprimeokRDV = $this->database->prepare($query); //connexion database puis prepare la requete
        $supprimeokRDV->bindValue(':id', $this->id, PDO::PARAM_INT); //recuperation de l'attribut idPatient pr operer la modification sur la ligne du patient concerné
        return $supprimeokRDV->execute();
    }
    
}
