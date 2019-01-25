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
            <button id="retour" onclick="(window.location = '../index.php')">Acceuil</button> 
            <button id="retour" onclick="(window.location = '../view/liste-patient.php')">liste patient</button>
        </div>
        <h1 id="title">Profil patients</h1>

        <div class="container-fluid  profilFormdiv">

            <?php
            if (!$ifIdexist) {
                ?>
                <p>Le patient n'existe pas</p>

            <?php } else {
                ?>
                <p><?= $modificationOK ? 'Modification effectuée' : '' ?></p>
                <div>
                    <form id="formprofil" method="POST" action="">
                        <p><label for="lastname">Nom:</label>
                            <input  name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : $profil->lastname ?>" />
                            <span class="error"><?= isset($errorsArray['lastname']) ? $errorsArray['lastname'] : ''; ?></span></p>

                        <p><label for="firstname">Prénom:</label>
                            <input  name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : $profil->firstname ?>" />
                            <span class="error"><?= isset($errorsArray['firstname']) ? $errorsArray['firstname'] : ''; ?></span></p>

                        <p><label for="birthdate">Date de naissance:</label>
                            <input name="birthdate" type="date" value="<?= isset($_POST['birthdate']) ? $_POST['birthdate'] : $profil->birthdate ?>" />
                            <span class="error"><?= isset($errorsArray['birthdate']) ? $errorsArray['birthdate'] : ''; ?></span></p>

                        <p><label for="phone">Téléphone:</label>
                            <input name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : $profil->phone ?>" />
                            <span class="error"><?= isset($errorsArray['phone']) ? $errorsArray['phone'] : ''; ?></span></p>

                        <p><label for="mail">mail:</label>
                            <input name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : $profil->mail ?>" />
                            <span class="error"><?= isset($errorsArray['mail']) ? $errorsArray['mail'] : ''; ?></span></p>
                        <div class="row">
                            <div class="col-lg-12">
                        <input id="button" type="submit" class="homeButton" name="modif" value="modifier mon profil" />
                        </div>
                        </div>
                    </form>
                </div>
                <div>
                    <?php
                    foreach ($rdvsurprofil as $rdvshow) {
                        ?>
                        <div class="container-fluid rdvok">
                            <h2 class="titleRDV">RDV du patient: <br /> <?= $profil->lastname ?> - <?= $profil->firstname ?> </h2>
                             <table class="tablerdvprofil">
                                <tr>
                                    <th>Date</th>
                                    <td> <?= $rdvshow->date ?></td>
                                </tr>
                                <tr>
                                    <th>Heure</th>
                                    <td>  <?= $rdvshow->time ?></td>
                                </tr>
                            </table>
                           
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    </body>
</html>
