<?php
require '../modele/modelbdd.php'; //appel des modèles
require '../modele/modelpatient.php';

$profilObj = new Patients(); //instancie un nouvel objet
$ifIdexist = FALSE;
$modificationOK = FALSE;//booleen qui permet l'affichage du message d'erreur
//if (isset($_GET['id'])) {   //permet de recuperer l'id et d'effectuer la requêt,e sans verifier si l'id est présent ds la base de donnée.
//    $profilObj->id = $_GET['id']; //'attribut on donne a l'attribut Id la valeur du GET
//    $profil = $profilObj->profilPatient(); //
//}

if (isset($_GET['id'])) { //recupere l'id, verifie si présent ds la base de donnée, et effectue la requête
    $profilObj->id = $_GET['id'];
    $profil = $profilObj->profilPatient(); //
    if ($profil === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}

//on effectue toutes les verifications sur le formulaire
$errorsArray = []; // on déclare un tableau errorsArray qui contiendra les messages d'erreurs
// on met en place les regex
$regexName = '/^[a-zA-ZÄ-ÿ-]+$/';
$regexEmail = '/^[a-z0-9.-]+@[a-z0-9.-]+.[a-z]{2,6}$/';
$regexPhone = '/^[0-9]{10}+$/';


if (isset($_POST['lastname'])) { // recherche donnée input 
    $profilObj->lastname = htmlspecialchars($_POST['lastname']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $profilObj->lastname)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['lastname'] = 'Veuillez inscrire un nom conforme. ex:Doe';
    }
    // on test si c'est vide
    if (empty($profilObj->lastname)) {
        $errorsArray['lastname'] = 'Veuillez saisir un nom pour continuer';
    }
}

if (isset($_POST['firstname'])) { // recherche donnée input 
    $profilObj->firstname = htmlspecialchars($_POST['firstname']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $profilObj->firstname)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['firstname'] = 'Veuillez inscrire un prénom conforme. ex:John';
    }
}

if (isset($_POST['birthdate'])) {
    $profilObj->birthdate = htmlspecialchars($_POST['birthdate']);
}

if (isset($_POST['phone'])) { // recherche donnée input pseudo
    $profilObj->phone = htmlspecialchars($_POST['phone']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexPhone, $profilObj->phone)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['phone'] = 'Veuillez inscrire un téléphone conforme';
    }
}

if (isset($_POST['mail'])) { // recherche donnée input pseudo
    $profilObj->mail = htmlspecialchars($_POST['mail']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexEmail, $profilObj->mail)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['mail'] = 'Veuillez inscrire un mail conforme';
    }
}
//fin verification formulaire
//a l'appui sur le bouton modif, verifie les erreurs, effectue la requête
if (isset($_POST['modif']) && (count($errorsArray) == 0)) {

    $profilObj->modifPatient(); // execute ma requete presente dans mon modelpatient
    $profil = $profilObj->profilPatient();
    $modificationOK = TRUE;
}
?>