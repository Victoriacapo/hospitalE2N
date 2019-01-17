<?php
include_once('../controller/controllerprofil-patient.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/style.css">
        <title>profil-patient</title>
    </head>
    <body>
        <div>
            <button id="retour" onclick="(window.location = '../index.php')">Retour</button> 
            <button id="retour" onclick="(window.location = '../view/liste-patient.php')">liste patient</button>
        </div>
        <h1 id="title">Profil patients</h1>

        <div class="container-fluid profilForm">
            
            <?php
            if (!$ifIdexist) {
                ?>
                <p>Le patient n'existe pas</p>
                
            <?php } else {
                ?>
                <p><?= $modificationOK ? 'Modification effectuée' : '' ?></p>
                <form method="POST" action="">
                    <p><label for="lastname">Nom:</label>
                        <input  name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : $profil->lastname?>" />
                        <span class="error"><?= isset($errorsArray['lastname']) ? $errorsArray['lastname'] : ''; ?></span></p>
                    <p><label for="firstname">Prénom:</label>
                        <input  name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : $profil->firstname?>" />
                        <span class="error"><?= isset($errorsArray['firstname']) ? $errorsArray['firstname'] : ''; ?></span></p>
                    <p><label for="birthdate">Date de naissance:</label>
                        <input name="birthdate" value="<?= isset($_POST['birthdate']) ? $_POST['birthdate'] : $profil->birthdate?>" />
                        <span class="error"><?= isset($errorsArray['birthdate']) ? $errorsArray['birthdate'] : ''; ?></span></p>
                    <p><label for="phone">Téléphone:</label>
                        <input name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : $profil->phone ?>" />
                        <span class="error"><?= isset($errorsArray['phone']) ? $errorsArray['phone'] : ''; ?></span></p>
                    <p><label for="mail">mail:</label>
                        <input name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] :$profil->mail ?>" />
                        <span class="error"><?= isset($errorsArray['mail']) ? $errorsArray['mail'] : ''; ?></span></p>
                    <input id="button" type="submit" class="modif" name="modif" value="modifier" />
                </form>
            <?php } ?>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    </body>
</html>
