<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E2N Hopital</title>
        <?php include 'view/CDN.php' ?>
    </head>
    <body>
        <?php include 'view/navbar.php' ?>
        <div class="container-fluid">
            <h1 class="text-center card yellow-card ml-5 mr-5 mt-2 font-title font-weight-bold">Bienvenue sur la page d'accueil de l'hopital E2N</h1>
            <div class="row">
                <div class="col-md-4 offset-md-1 card yellow-card mt-5 paddingcard">
                    <ul>
                        <li class="mt-3"><a href="/view/newPatientForm.php" class="font-text">Crée une fiche patient</a></li>
                        <li class="mt-3"><a href="/view/patientsList.php" class="font-text">Afficher la liste des patients</a></li>
                        <li class="mt-3"><a href="/view/rendez-vous.php" class="font-text">Prendre un rendez-vous</a></li>
                        <li class="mt-3"><a href="/view/rendez-vous.php" class="font-text">Afficher la liste des rendez-vous</a></li>
                    </ul>
                </div>
                <div class="card yellow-card col-md-4 offset-md-2 mt-5">
                    <ul>
                        <li><p class="font-weight-bold text-center font-text mt-3">Hopital E2N</p></li>
                        <li><img src="/assets/hp.jpg" class="card indexImg col-md-11 " /></li>
                        <li><p class="font-weight-bold text-center font-text mt-3">SpiderMan a l'Hopital E2N</p></li>
                        <li><img src="/assets/hp2.jpeg" class="card indexImg col-md-11 " /></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php include 'view/footer.php' ?>
        <?php include 'view/scriptLink.php' ?>
    </body>
</html>