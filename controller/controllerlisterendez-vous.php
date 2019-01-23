<?php
require '../modele/modelbdd.php'; //appel des modèles
require '../modele/modelrendez-vous.php';
require '../modele/modelpatient.php';

$RDVObj = new Appointments(); //instancie un nouvel objet
$rdv = $RDVObj->showRDV(); //


?>