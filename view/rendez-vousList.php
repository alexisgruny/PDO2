<?php
include '../model/modelDatabase.php';
include '../model/modelRendez-vous.php';
include '../controller/controllerRendez-vousList.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <?php include 'CDN.php'; ?>
        <title>Liste des patients</title>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <div class="container-fluid">
            <h1 class="text-center card yellow-card ml-5 mr-5 mt-2 font-title font-weight-bold">Crée un rendez-vous</h1>
            <div class="row justify-content-center">
                <div class="col-md-6">  

                    <table class="table table-striped table-light text-center mt-5">
                        <thead>
                            <tr>
                                <th></th>
                                <th colspan="2">Rendez-vous par date et heure</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appointmentList as $appointmentDetail) { ?>
                                <tr>
                                    <td><a href="rendez-vousList.php?idrdv=<?= $appointmentDetail->id ?>" class="btn btn-danger" role="button" aria-pressed="true" >Supprimer<i class="far fa-trash-alt"></i></a></td>
                                    <td><p class="mt-2"> <?= $appointmentDetail->dateHour ?> </p></td>

                                    <td class="mt-5 text-center"> <a href="profilPatients.php?id=<?= $appointmentDetail->idPatients ?>"><p class="mt-1">Profil patient</p></a>
                                    <td class="mt-5 text-center"> <a href="rendez-vous.php?id=<?= $appointmentDetail->idPatients ?>"><p class="mt-1">Information</p></a>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>  
                    <a href="ajoutRendez-vous.php" class="btn btn-primary btn-lg active w-100 yellow-text" role="button" aria-pressed="true">Nouveau rendez-vous</a>
                </div>
            </div> 
        </div> 
        <?php
        include 'footer.php';
        include 'scriptLink.php';
        ?>

    </body>
</html>
