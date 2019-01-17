<?php
//appel des modeles
require '../modele/modelbdd.php';
require '../modele/modelpatient.php';

$patientObj = new Patients(); //instancie un nouvel objet
$showForm = true;

//on effectue toutes les verifications sur le formulaire
$errorsArray = [];// on déclare un tableau errorsArray qui contiendra les messages d'erreurs

// on met en place les regex
$regexName = '/^[a-zA-ZÄ-ÿ-]+$/';
$regexEmail = '/^[a-z0-9.-]+@[a-z0-9.-]+.[a-z]{2,6}$/';
$regexPhone = '/^[0-9]{10}+$/';

if (isset($_POST['sendButton'])) {

    if (isset($_POST['lastname'])) { // recherche donnée input 
        $patientObj->lastname = htmlspecialchars($_POST['lastname']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
        // on test si regex n'est pas bonne
        if (!preg_match($regexName, $patientObj->lastname)) {//le preg_match permet de tester la regex sur ma variable 
            $errorsArray['lastname'] = 'Veuillez inscrire un nom conforme';
        }
        // on test si c'est vide
        if (empty($patientObj->lastname)) {
            $errorsArray['lastname'] = 'Veuillez saisir un nom pour continuer';
        }
    }
    if (isset($_POST['firstname'])) { // recherche donnée input 
        $patientObj->firstname = htmlspecialchars($_POST['firstname']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
        // on test si regex n'est pas bonne
        if (!preg_match($regexName, $patientObj->firstname )) {//le preg_match permet de tester la regex sur ma variable 
            $errorsArray['firstname'] = 'Veuillez inscrire un prénom conforme';
        }
        // on test si c'est vide
        if (empty($patientObj->firstname )) {
            $errorsArray['firstname'] = 'Veuillez saisir un prénom pour continuer';
        }
    }
    
    if (isset($_POST['birthdate'])) {
        $patientObj->birthdate = htmlspecialchars($_POST['birthdate']);
        if (empty($patientObj->birthdate)) {
            $errorsArray['birthdate'] = 'Veuillez saisir une date de naissance pour continuer';
        }
    }

    if (isset($_POST['phone'])) { // recherche donnée input pseudo
        $patientObj->phone = htmlspecialchars($_POST['phone']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
        // on test si regex n'est pas bonne
        if (!preg_match($regexPhone, $patientObj->phone)) {//le preg_match permet de tester la regex sur ma variable 
            $errorsArray['phone'] = 'Veuillez inscrire un téléphone conforme';
        }
        // on test si c'est vide
        if (empty($patientObj->phone)) {
            $errorsArray['phone'] = 'Veuillez saisir un téléphone pour continuer';
        }
    }
    if (isset($_POST['mail'])) { // recherche donnée input pseudo
        $patientObj->mail = htmlspecialchars($_POST['mail']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
        // on test si regex n'est pas bonne
        if (!preg_match($regexEmail, $patientObj->mail)) {//le preg_match permet de tester la regex sur ma variable 
            $errorsArray['mail'] = 'Veuillez inscrire un mail conforme';
        }
        // on test si c'est vide
        if (empty($patientObj->mail)) {
            $errorsArray['mail'] = 'Veuillez saisir un mail pour continuer';
        }
    }
}
//Fin verification formulaire


if (isset($_POST['sendButton']) && (count($errorsArray) == 0)) {
$patientObj->ajoutPatient();// execute ma requete presente dans mon modelpatient
$showForm = false; // ma variable return false donc cache mon formulaire remplie.
}

?>