<?php
include_once('../controller/controllerRendez-vous.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/style.css">
        <title>modif-RDV</title>
    </head>
    <body>
        <div>
            <button id="retour" onclick="(window.location = '../index.php')">page d'acceuil</button> 
            <button id="retour" onclick="(window.location = '../view/liste-patient.php')">liste patient</button>
            <button id="retour" onclick="(window.location = '../view/listerendez-vous.php')">liste RDV</button>
        </div>
        <h1 id="title">Modification RDV</h1>

        <div class="container-fluid profilForm">

            
                <h1><?= $rdvParPatient->lastname ?>  <?= $rdvParPatient->firstname ?></h1>
                <p>Rendez-vous : <?= $rdvParPatient->id ?></p>

                <form method="POST" action="">
                    <p><label for="date">Date de RDV:</label>
                        <input type="date" name="date" value="<?= isset($_POST['date']) ? $_POST['date'] : $rdvParPatient->date ?>" />
                        <span class="error"><?= isset($errorsArray['date']) ? $errorsArray['date'] : ''; ?></span></p>

                    <p><label for="time">Heure de RDV:</label>
                        <input type="time" name="time" value="<?= isset($_POST['time']) ? $_POST['time'] : $rdvParPatient->time ?>"/>
                        <span class="error"><?= isset($errorsArray['time']) ? $errorsArray['time'] : ''; ?></span></p>

                    <input id="button" type="submit" class="modif" name="modif" value="modifier" />
                </form>
           
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    </body>
</html>
