<?php

require '../modele/modelbdd.php'; //appel des modèles
require '../modele/modelrendez-vous.php';
require '../modele/modelpatient.php';

$RDVObj = new Appointments(); //instancie un nouvel objet
$RDVObj->idPatients = $_GET['id'];
$rdvParPatient = $RDVObj->RDVbyID();


//on effectue toutes les verifications sur le formulaire
$errorsArray = []; // on déclare un tableau errorsArray qui contiendra les messages d'erreurs
// on met en place les regex
$regexDate = '/^[a-zA-ZÄ-ÿ-]+$/';
$regexTime = '/^[a-z0-9.-]+@[a-z0-9.-]+.[a-z]{2,6}$/';



if (isset($_POST['date'])) { // recherche donnée input 
    $profilObj->date = htmlspecialchars($_POST['date']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $profilObj->date)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['date'] = 'Veuillez inscrire une date conforme.';
    }
    // on test si c'est vide
    if (empty($profilObj->date)) {
        $errorsArray['date'] = 'Veuillez saisir une date pour continuer';
    }
}

if (isset($_POST['firstname'])) { // recherche donnée input 
    $profilObj->firstname = htmlspecialchars($_POST['firstname']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $profilObj->firstname)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['firstname'] = 'Veuillez inscrire un prénom conforme. ex:John';
    }
    // on test si c'est vide
    if (empty($profilObj->lastname)) {
        $errorsArray['lastname'] = 'Veuillez saisir un nom pour continuer';
    }
}
?>