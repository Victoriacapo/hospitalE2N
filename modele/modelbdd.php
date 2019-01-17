<?php

class database { //declaration class database

    public $database; //attribut database

    public function __construct() { //methode magique construct permet d'executer ce qu'il y a ds le construct et permet d'executer le destruct a la fin a la fin de l'instantion
        try {
            $this->database = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'victoriac', '1Travail'); //instancie un nouvel objet; permet la connexion a ma base de donnée.
        } catch (Exception $error) {
            die('Erreur : ' . $error->getMessage()); //affiche les msg d'erreur de connexion a la base de donnee
        }
    }

    public function __destruct() {//  completement function qui permet de terminer la requete
        $this->database = NULL;
    }

}

?>
 