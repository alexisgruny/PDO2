<?php
include '../model/modelDatabase.php';
include '../model/modelPatient.php';
include '../model/modelRendez-vous.php';
include '../controller/controllerRendez-vous.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'CDN.php'; ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <div class="container-fluid">
            <?php
            if ((isset($_GET['idrdv'])) && (!isset($_POST['submitModify']))) {
                ?>   
                <h1 class="text-center card yellow-card ml-5 mr-5 mt-2 font-title font-weight-bold"> Modification du rendez-vous</h1>
                <form class="col-md-6 offset-md-3 font-text font-weight-bold" action="rendezvous.php?id=<?= $appointmentInfo->idPatients ?>&idrdv=<?= $_GET['idrdv'] ?>" method="POST">
                    <div class="form-group">

                        <label for="dateH" class="mt-3">Date</label>
                        <!--stock la saisie dans le champ-->
                        <input type="date" class="form-control is-valid" name="dateH" id="dateH"  />
                        <!--affiche sous le champs le texte d'erreur-->
                        <?php if (isset($formError['dateH'])) { ?>
                            <p class="text-danger"> <?= $formError['dateH'] ?></p>
                        <?php } ?>

                        <label for="hour" class="mt-3">Heure</label>
                        <input type="time" class="form-control is-valid" name="hour" id="hour"  />
                        <?php if (isset($formError['hour'])) { ?>
                            <p class="text-danger"> <?= $formError['hour'] ?></p>
                        <?php } ?>


                        <input class="w-100 card yellow-card mt-5 font-title font-weight-bold" type="submit" value="Enregistrer les modification" name="submitModify" />  
                        <p class="text-danger"> <?= isset($formError['submitModify']) ? $formError['submitModify'] : ''; ?></p>
                        <a href="rendez-vous.php?id=<?= $appointmentInfo->idPatients ?>" class="btn btn-primary btn-lg active w-100 yellow-text" role="button" aria-pressed="true">Retour</a>
                    </div>                            
                </form>
                <?php
            } else {
                ?>
                <h1 class="text-center card yellow-card ml-5 mr-5 mt-2 font-title font-weight-bold">Information du rendez-vous</h1>
                <div class="row justify-content-center">
                    <div class="col-md-6">  
                        <table class="table table-striped table-light text- mt-2 ml-2">
                            <tr>
                                <th scope="row">Nom</th>
                                <td><?= $patientInfoList->lastname ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Prénom</th>
                                <td><?= $patientInfoList->firstname ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Date de naissance</th>
                                <td><?= $patientInfoList->birthdate ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Téléphone</th>
                                <td><?= $patientInfoList->phone ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Mail</th>
                                <td><?= $patientInfoList->mail ?></td>
                            </tr>
                                <?php foreach ($appointmentInfoList AS $appointmentInfoDetail) { ?>
                                                        <tr> 
                                <th scope="row">Rendez-vous</th>
                                    <td> <?= $appointmentInfoDetail->dateHour ?> </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="rendez-vous.php?id=<?= $appointmentInfo->idPatients ?>&idrdv=<?= $appointmentInfoDetail->id ?>" class="btn btn-primary btn-lg active w-100 yellow-text" role="button" aria-pressed="true">Modifier le rendez-vous</a>
                                    </td>
                                </tr>
                                <?php } ?>
                        </table>  
                        <a href="rendez-vousList.php" class="btn btn-primary btn-lg active w-100 yellow-text" role="button" aria-pressed="true">Retour a la liste des rendez-vous</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div> 
        <?php include 'footer.php' ?>
        <?php include 'scriptLink.php' ?>
    </body>
</html>
