<?php

require '../modele/modelbdd.php'; //appel des modèles
require '../modele/modelrendez-vous.php';
require '../modele/modelpatient.php';


$patientObj = new Patients(); //instancie un nouvel objet
$show = $patientObj->showPatient(); //
$RDVObj = new Appointments(); //instancie un nouvel objet

$showForm = true;

//on effectue toutes les verifications sur le formulaire

$errorsArray = []; // on déclare un tableau errorsArray qui contiendra les messages d'erreurs
// on met en place les regex
$regexName = '/^[a-zA-ZÄ-ÿ-]+$/';
//$regexDate = '/^[0-9]{8}+$/';
//$regexHour = '/(([0-1]){1,}([0-9]{1,})|(2[0-3]))(:)([0-5]{1}[0-9]{1})/';//regex pr l'heure

if (isset($_POST['sendButton'])) {

    if (isset($_POST['idPatients'])) { // recherche donnée input pseudo
        $idPatients = htmlspecialchars($_POST['idPatients']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
        // on test si regex n'est pas bonne
        // on test si c'est vide
        if (empty($idPatients)) {
            $errorsArray['idPatients'] = 'Veuillez choisir un patient pour continuer';
        }
    }
    if (isset($_POST['date'])) { // recherche donnée input pseudo
        $date = htmlspecialchars($_POST['date']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
        // on test si regex n'est pas bonne
        // on test si c'est vide
        if (empty($date)) {
            $errorsArray['date'] = 'Veuillez saisir une date pour continuer';
        }
    }
    if (isset($_POST['Hour'])) {
        $Hour = htmlspecialchars($_POST['Hour']);
        // on test si regex n'est pas bonne
        if (empty($Hour)) {
            $errorsArray['Hour'] = 'Veuillez saisir l\'heure de RDV pour continuer';
        }
    }
}
//Fin verification formulaire

if (isset($_POST['sendButton']) && (count($errorsArray) == 0)) {
    $Hour = date('H:i:s', strtotime($Hour));//je met en place la mise en forme de mon heure
    $RDVObj->dateHour = $date . ' ' . $Hour; // j'hydrate mon attribut dateHour avec mes variables $date concaténé avec $Hour. (on peut aussi juste attribuer une valeur)
    $RDVObj->idPatients = $_POST['idPatients']; 
    $newRDV = $RDVObj ->ajoutRDV();
    
    $showForm = false; // ma variable return false donc cache mon formulaire remplie.
    
}
?>