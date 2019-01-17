<!DOCTYPE html>
<html class="h-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/style.css">
        <title>Exercice 1 PDO - Partie 2 : Écrire des données     
            Consigne: Créer une page ajout-patient.php et y créer un formulaire permettant de créer un patient. 
            Elle doit être accessible depuis la page index.php</title>
    </head>
    <body class="h-100">
        <div id="mt" class="container">
            <div class="row">
                <div class="col-lg-12">
                    <button class="homeButton" onclick="(window.location = 'view/form_patient.php')">Ajout Patient</button> <!--redirection php vers une autre page--> 
                </div>   
                <div class="col-md-12">
                    <button class="homeButton" onclick="(window.location = 'view/liste-patient.php')">Afficher Patient</button> <!--redirection php vers une autre page--> 
                </div>
                <div class="col-md-12">
                    <button class="homeButton" onclick="(window.location = 'view/ajout-rendezvous.php')">ajout RDV</button> <!--redirection php vers une autre page--> 
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>         
    </body>
</html>
