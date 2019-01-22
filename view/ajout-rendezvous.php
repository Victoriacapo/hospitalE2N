<?php
include_once('../controller/controllerAjoutRendez-vous.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/style.css">
        <title>Ajout-rendezvous</title>
    </head>
    <body>
        <div>
            <button id="retour" onclick="(window.location = '../index.php')">Retour</button>
            <button id="retour" onclick="(window.location = '../view/listerendez-vous.php')">liste RDV</button>
        </div>

        <div class="container-fluid formd">
            <?php if ($showForm) { //applique ma booleenne pr afficher/cacher mon form?>
                <form method="POST" action="">

                    <label> Choisir le patient</label>
                    <select name="idPatients"> <!--Select pour selectionner les patients renvoyés par la base de donnée -->
                        <option value="" disabled></option>
                        <?php
                        foreach ($show as $patient) { //boucle pour afficher les patients de la base de donnée dans la balise option
                            ?>
                            <option value="<?= $patient->id ?>"><?= $patient->lastname ?>-<?= $patient->firstname ?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <p><label for="date">Date de RDV:</label>
                        <input type="date" name="date" id="date" />
                        <span class="error"><?= isset($errorsArray['date']) ? $errorsArray['date'] : ''; ?></span></p>

                    <p><label for="Hour">Heure de RDV:</label>
                        <input type="time" name="Hour" id="Hour" />
                        <span class="error"><?= isset($errorsArray['Hour']) ? $errorsArray['Hour'] : ''; ?></span></p>

                    <input id="button" type="submit" class=sendButton name="sendButton" value="Envoyer" />
                </form>
            <?php } else { ?>
            <div>
            <p>Le RDV a bien été pris en compte</p>
            <p><?='le RDV est pris pr le '.$date. ' et à ' .$Hour ?></p>
            </div>
            <div>
                <div><a href="index.php" class="btn btn-primary">Home</a></div>
                <div><a href="form_patient.php" class="btn btn-primary">Ajouter un nouveau patient</a></div>
                <div><a href="ajout-rendezvous.php" class="btn btn-primary">Prendre un nouveau RDV</a></div>
            </div>
            <?php } ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    </body>
</html>
