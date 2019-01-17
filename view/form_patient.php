<?php
// appel du controller 
include_once('../controller/controllerform_patient.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/style.css">
        <title>Ajout-patient</title>
    </head>
    <body>
        <div>
            <button id="retour" onclick="(window.location = '../index.php')">Retour</button> <!--redirection php vers une autre page--> 
        </div>
        <div class="container-fluid formd">
            <?php if ($showForm) { //applique ma booleenne pr afficher/cacher mon form?>
                <form method="POST" action="">
                    <p><label for="lastname">Nom:</label>
                        <input type="text" name="lastname" id="lastname" value="<?= isset($_POST['lastname']) ? $patientObj->lastname : ''; ?>" size="30" maxlength="10" /> 
                        <span class="error"><?= isset($errorsArray['lastname']) ? $errorsArray['lastname'] : ''; ?></span></p>

                    <p><label for="firstname">Prénom:</label>
                        <input type="text" name="firstname" id="firstname" value="<?= isset($_POST['firstname']) ? $patientObj->firstname : ''; ?>" size="30" maxlength="10" />
                        <span class="error"><?= isset($errorsArray['firstname']) ? $errorsArray['firstname'] : ''; ?></span></p>

                    <p><label for="birthdate">Date de naissance:</label>
                        <input type="date" name="birthdate" id="birthdate" size="30" maxlength="10" />
                        <span class="error"><?= isset($errorsArray['birthdate']) ? $errorsArray['birthdate'] : ''; ?></span></p>

                    <p><label for="phone">Téléphone:</label>
                        <input type="text" name="phone" id="phone" value="<?= isset($_POST['phone']) ? $patientObj->phone : ''; ?>" size="30" maxlength="10" />
                        <span class="error"><?= isset($errorsArray['phone']) ? $errorsArray['phone'] : ''; ?></span></p>

                    <p><label for="mail">Email:</label>
                        <input type="email" name="mail" id="mail" value="<?= isset($_POST['mail']) ? $patientObj->mail : ''; ?>" size="30" maxlength="50" />
                        <span class="error"><?= isset($errorsArray['mail']) ? $errorsArray['mail'] : ''; ?></span></p>

                    <input id="button" type="submit" class=sendButton name="sendButton" value="Envoyer" />
                </form>
            <?php } else { ?>
            <div><?= 'Le patient ' . $patientObj->lastname . ' - ' . $patientObj->firstname . ' a bien été enregistré.' ?></div>
            <div><a href="index.php" class="btn btn-primary">Home</a></div>
            <div><a href="form_patient.php" class="btn btn-primary">Ajouter un nouveau patient</a></div>
            <?php } ?>
        
           
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>       
    </body>
</html>
