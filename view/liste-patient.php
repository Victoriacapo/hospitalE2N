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
            <button id="retour" onclick="(window.location = '../index.php')">Acceuil</button> <!--redirection php vers une autre page--> 
            <button id="retour" onclick="(window.location = '/view/listerendez-vous.php')">liste RDV</button>
            <button id="retour" onclick="(window.location = '/view/liste-patient.php')">liste patient</button>
        </div>

        <div> 
            <form class="form-inline my-2 my-lg-0" method="POST" action="liste-patient.php">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Rechercher" aria-label="Rechercher" />
                 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">X</button> <!--permet de rafraichir la page et m'afficher ma liste de patient. le type submit le permet-->
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="Ok">Ok</button>
            </form>
        </div>
        

        <h1 id="title">Liste patients</h1>
        <div class="container tableauRDV">
            <table>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th> </th>
                    <th>Infos RDV</th>
                    <th>supprimer patient</th>
                </tr>
                <?php
                foreach ($show as $patient) {
                    ?>
                    <tr>
                        <td><?= $patient->id ?></td>
                        <td><?= $patient->lastname ?></td>
                        <td><?= $patient->firstname ?></td>
                        <td>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample<?= $patient->id ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Profil
                            </a>
                            <button class="btn btn-primary" onclick="(window.location = 'profil-patient.php?id=<?= $patient->id; ?>')">Modifier</button>

                            <div class="collapse" id="collapseExample<?= $patient->id ?>">
                                <ul>
                                    <li>id: <?= $patient->id ?> </li>
                                    <li>Nom: <?= $patient->lastname ?> </li>
                                    <li>Prénom: <?= $patient->firstname ?> </li>
                                    <li>Date de naissance: <?= $patient->birthdate ?></li>
                                    <li>Téléphone: <?= $patient->phone ?></li>
                                    <li>Mail: <?= $patient->mail ?></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExampleok<?= $patient->id ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                infos RDV
                            </a>
                            <div class="collapse" id="collapseExampleok<?= $patient->id ?>">
                                <?php
                                foreach ($rdvsurprofil as $rdvshow) {
                                    ?>
                                    <ul>
                                        <li>date: <?= $rdvshow->date ?> </li>
                                        <li>heure: <?= $rdvshow->time ?> </li>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </div>
                        </td>
                        <td>
                            <a href="liste-patient.php?id=<?= $patient->id ?>" name="deletePatient"><button class="btn btn-primary">Supprimer le patient</button></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    </body>
</html>
