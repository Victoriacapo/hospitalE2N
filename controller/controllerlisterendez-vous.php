<?php

require '../modele/modelbdd.php'; //appel des modèles
require '../modele/modelrendez-vous.php';
require '../modele/modelpatient.php';

$RDVObj = new Appointments(); //instancie un nouvel objet
$rdv = $RDVObj->showRDV(); //


if (isset($_GET['id'])) {
    echo 'Etes vous sur de vouloir supprimer ce RDV';
    $RDVObj->id = $_GET['id'];
    $enleverRDV = $RDVObj->supprimerRDV();
    
}
?>