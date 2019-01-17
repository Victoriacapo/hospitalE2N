<?php

class appointments extends database {//creation class client qui heriteras de la class database cree ds la page modelbdd

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
    public function ajoutRDV() {
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

   
}
