<?php
require '../modele/modelbdd.php'; //appel des modèles
require '../modele/modelpatient.php';
require '../modele/modelrendez-vous.php';

$patientObj = new Patients(); //instancie un nouvel objet
$RDVObj = new Appointments(); //instancie un nouvel objet
$show = $patientObj->showPatient(); //
$rdvParPatient = $RDVObj->RDVbyID();





?>