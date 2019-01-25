<?php

require '../modele/modelbdd.php'; //appel des modèles
require '../modele/modelrendez-vous.php';
require '../modele/modelpatient.php';

$RDVObj = new Appointments(); //instancie un nouvel objet
$updateOK = false;


if (isset($_GET['id'])) { //recupere l'id, verifie si présent ds la base de donnée, et effectue la requête
    $RDVObj->id = $_GET['id'];
    $idUpdate = $_GET['id'];
    $rdvParPatient = $RDVObj->RDVbyID(); //
    if ($rdvParPatient === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}

//on effectue toutes les verifications sur le formulaire
$errorsArray = []; // on déclare un tableau errorsArray qui contiendra les messages d'erreurs
// on met en place les regex
$regexDate = '/^[0-9]{8}+$/';
$regexTime = '/(([0-1]){1,}([0-9]{1,})|(2[0-3]))(:)([0-5]{1}[0-9]{1})/'; //regex pr l'heure



if (isset($_POST['date'])) { // recherche donnée input 
    $date = htmlspecialchars($_POST['date']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
   
    // on test si c'est vide
    if (empty($date)) {
        $errorsArray['date'] = 'Veuillez saisir une date pour continuer';
    }
}

if (isset($_POST['time'])) { // recherche donnée input 
    $time = htmlspecialchars($_POST['time']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexTime, $time)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['time'] = 'Veuillez inscrire une heure conforme.';
    }
    // on test si c'est vide
    if (empty($time)) {
        $errorsArray['time'] = 'Veuillez saisir une heure pour continuer';
    }
}

if (isset($_POST['modif']) && (count($errorsArray) == 0)) {
    $time = date('H:i:s', strtotime($time));
    $RDVObj->dateHour = $date . ' ' . $time;
    $RDVObj->id = $idUpdate;
    $RDVObj->modifRDV();// execute ma requete presente dans mon modelpatient
    $updateOK = true;
}
?>