<?php
include_once('../controller/controllerliste-patient.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/style.css">
        <title>liste/profil-patient</title>
    </head>
    <body>
        <div>
            <button id="retour" onclick="(window.location = '../index.php')">Retour</button> <!--redirection php vers une autre page--> 
           
        </div>
        <h1 id="title">Liste patients</h1>
        <div class="container">
            <div class="row">
                <?php
                foreach ($show as $patient) {
                    ?>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <h1 id="title">Patient: </h1>
                            <div class="card-body">
                                <h4 class="card-title">Nom: <?= $patient->lastname ?></h4>
                                <h4 class="card-title">Prénom: <?= $patient->firstname ?> </h4>
                                <h4 class="card-title">identifiant: <?= $patient->id ?> </h4>
                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample<?= $patient->id ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Profil
                                    </a>
                                    <button class="btn btn-primary" onclick="(window.location = 'profil-patient.php?id=<?= $patient->id; ?>')">Modifier</button>
                                </p>

                                <div class="collapse" id="collapseExample<?= $patient->id ?>">
                                    <div>
                                        <ul>
                                            <li>id: <?= $patient->id ?> </li>
                                            <li>Nom: <?= $patient->lastname ?> </li>
                                            <li>Prénom: <?= $patient->firstname ?> </li>
                                            <li> Date de naissance: <?= $patient->birthdate ?></li>
                                            <li>Téléphone: <?= $patient->phone ?></li>
                                            <li>Mail: <?= $patient->mail ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    </body>
</html>
