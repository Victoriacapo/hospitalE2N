<?php
include_once('../controller/controllerRendez-vous.php');
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
        </div>

        <div class="container-fluid formd">
            <form method="POST" action="">
                <p><label for="lastname">Nom:</label>
                    <input type="text" name="lastname" id="lastname" value="<?= isset($_POST['lastname']) ? $patientObj->lastname : ''; ?>" size="30" maxlength="10" /> 
                    <span class="error"><?= isset($errorsArray['lastname']) ? $errorsArray['lastname'] : ''; ?></span></p>

                <p><label for="firstname">Prénom:</label>
                    <input type="text" name="firstname" id="firstname" value="<?= isset($_POST['firstname']) ? $patientObj->firstname : ''; ?>" size="30" maxlength="10" />
                    <span class="error"><?= isset($errorsArray['firstname']) ? $errorsArray['firstname'] : ''; ?></span></p>

                <p><label for="dateHour">Date de RDV:</label>
                    <input type="datetime" name="dateHour" id="dateHour" />
                    <span class="error"><?= isset($errorsArray['dateHour']) ? $errorsArray['dateHour'] : ''; ?></span></p>

                <input id="button" type="submit" class=sendButton name="sendButton" value="Envoyer" />
            </form>
        </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    </body>
</html>
