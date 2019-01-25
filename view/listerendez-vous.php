<?php
include_once('../controller/controllerlisterendez-vous.php');
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
            <button id="retour" onclick="(window.location = '/view/liste-patient.php')">liste patients</button>
            <div><a href="ajout-rendezvous.php" class="btn btn-primary">Prendre un nouveau RDV</a></div>
        </div>

        <h1 id="title">RDV</h1>
        <div class="container tableauRDV">
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>RDV</th>
                    <th>Téléphone</th>
                    <th>Mail</th>
                </tr>
                <?php
                foreach ($rdv as $dateheureRDV) {
                    ?>
                    <tr>
                        <td><?= $dateheureRDV->id ?></td>
                        <td><?= $dateheureRDV->lastname ?></td>
                        <td><?= $dateheureRDV->firstname ?></td>
                        <td>Le: <?= $dateheureRDV->date ?> 
                            à:  <?= $dateheureRDV->time ?>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample<?= $dateheureRDV->id ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                + d'infos
                            </a>
                            <div class="collapse" id="collapseExample<?= $dateheureRDV->id ?>">
                                <ul>
                                    <li>date: <?= $dateheureRDV->date ?> </li>
                                    <li>Heure: <?= $dateheureRDV->time ?> </li>
                                </ul>
                            </div>
                            <button class="btn btn-primary" onclick="(window.location = 'rendez-vous.php?id=<?= $dateheureRDV->id ?>')">Modifier</button>
                            <a href="listerendez-vous.php?id=<?= $dateheureRDV->id ?>"  name="deleteRDV"><button>Supprimer le RDV</button></a>
                        </td>
                        <td><?= $dateheureRDV->phone ?></td>
                        <td><?= $dateheureRDV->mail ?></td>
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
