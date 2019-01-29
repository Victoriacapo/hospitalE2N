<?php

require '../modele/modelbdd.php'; //appel des modèles
require '../modele/modelpatient.php';
require '../modele/modelrendez-vous.php';

$patientObj = new Patients(); //instancie un nouvel objet
$RDVObj = new Appointments(); //instancie un nouvel objet

$rdvParPatient = $RDVObj->RDVbyID(); //affiche les RDV lié au patient sélectionné.
////partie pour afficher les RDV, et supprimer le patient.
//permet a la récupération de l'id d'appliquer la requête
if (isset($_GET['id'])) { //va chercher l'id  avec un $_GET, du patient recupéré dans la vue à côté du bouton supprimerPatient.
    $patientObj->id = $_GET['id']; //indique que mn objet correspond a l'id qui seras récupérer dans la vue.
    $patientObj->idPatients = $_GET['id']; //indique l'idPatient est égal à l'id recupéré
    $rdvsurprofil = $RDVObj->ongletRDV(); //correspond a la requête présente dans le modelrendez-vous, pour m'afficher le RDV, sous chaque profil
    $supprimeokPatient = $patientObj->supprimerPatient(); //applique ma function qui contient ma requête dans mon modelPatient
}


//partie pour barre de recherche

$errorsArray = []; // on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$regexName = '/^[a-zA-ZÄ-ÿ-]+$/';
if (isset($_POST['Ok'])) {
    if (isset($_POST['search'])) { // recherche donnée input 
        $search = htmlspecialchars($_POST['search']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
        // on test si c'est vide
        if (empty($search)) {
            $errorsArray['search'] = 'la recherche ne peut aboutir';
        }
    }
}


if (isset($_POST['Ok']) && (count($errorsArray) == 0)) {
    $patientObj->search = $_POST['search'];
    $show = $patientObj->searchPatient();
} else {
    $show = $patientObj->showPatient(); //affiche la liste des patients.
}


$messagesParPage=4; //Nous allons afficher 5 messages par page.

$total = $patientObj->pagination();
//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$messagesParPage);
var_dump($nombreDePages);

?>