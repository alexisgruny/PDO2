<?php
include '../model/modelDatabase.php';
include '../model/modelPatient.php';
include '../model/modelRendez-vous.php';
include '../controller/controllerProfilPatients.php';
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
            <h1 class="text-center card yellow-card ml-5 mr-5 mt-2 font-title font-weight-bold">Profil du patient</h1>
            <?php
            if (isset($_POST['submit']) && (count($formError) == 0)) {
                ?> <p class="color-success"> Votre modification a étais prise en compte </p> <?php
            } else {
                foreach ($allPatients as $allPatients) {
                    if ($allPatients['id'] == $_GET['id']) {
                        ?>
                        <form action="/view/profilPatients.php?id=<?= $allPatients['id'] ?>" method="POST" class="col-md-6 offset-md-3 font-weight-bold font-text">
                            <div class="form-group">
                                <label for="lastname">Nom</label>
                                <input class="form-control"  id="lastname" type="text" name="lastname" value="<?= $allPatients['lastname'] ?>" />
                                <p class="text-danger"><?= isset($formError['lastname']) ? $formError['lastname'] : ''; ?></p>
                                <label for="firstname">Prénom</label>
                                <input class="form-control" id="firstname" type="text" name="firstname" value="<?= $allPatients['firstname'] ?>" />
                                <p class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : ''; ?></p>
                                <label for="birthdate">Date de naissance</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $allPatients['birthdate'] ?>" />
                                <p class="text-danger"><?= isset($formError['birthdate']) ? $formError['birthdate'] : ''; ?></p>
                                <label for="mail">Email</label>
                                <input class="form-control" id="mail" type="text" name="mail" value="<?= $allPatients['mail'] ?>" />
                                <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                                <label for="phone">Téléphone</label>
                                <input class="form-control" id="phone" name="phone" value="<?= $allPatients['phone'] ?>" />
                                <p class="text-danger"><?= isset($formError['phone']) ? $formError['phone'] : ''; ?></p>
                                <input class="w-100 card yellow-card mt-5 font-title font-weight-bold" type="submit" value="Modifier" name="submit"/>
                            </div>
                        </form>
                        <h2 class="text-center card ml-5 mr-5 mt-5 font-weight-bold col-md-6 ">Rendez-vous</h2>
                        <table class="table table-striped table-light text-center mt-5 ml-5 col-md-6 border">
                            <thead>
                                <tr>
                                    <th colspan="2">Date et heure</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php foreach ($appointmentInfoList AS $appointmentInfoDetail) { ?>
                                    <tr>
                                        <td colspan="2"> <?= $appointmentInfoDetail->dateHour ?> </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    }
                }
            }
            ?>
            <a href="patientList.php" class="btn btn-primary btn-lg active yellow-text col-md-12 " role="button" aria-pressed="true">Retour patients</a>
        </div>
        <?php include 'footer.php' ?>
        <?php include 'scriptLink.php' ?>
    </body>
</html>

