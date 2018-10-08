<?php
include '../model/modelDatabase.php';
include '../model/modelPatient.php';
include '../controller/controllerForm.php';
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
            <h1 class="text-center card ml-5 mr-5 mt-2 font-weight-bold font-title yellow-card">Création d'une fiche patient</h1>
            <!--affiche les resultat si aucune érreur est compté dans le tableau-->
            <?php if (isset($_POST['submit']) && (count($formError) == 0)) { ?>
                <p class="text-center font-weight-bold">Votre formulaire a bien étais envoyé</p>
                <!--Sinon affiche le formulaire-->
            <?php } else { ?>
                <form action="/view/newPatientForm.php" method="POST">
                    <div class="form-group col-md-6 offset-md-3 font-text font-weight-bold">
                        <label for="lastname">Nom</label>
                        <input class="form-control"  id="lastname" type="text" name="lastname" value="<?= isset($formInstance->lastname) ? $formInstance->lastname : '' ?>" />
                        <p class="text-danger"><?= isset($formError['lastname']) ? $formError['lastname'] : ''; ?></p>
                        <label for="firstname">Prénom</label>
                        <input class="form-control" id="firstname" type="text" name="firstname" value="<?= isset($formInstance->firstname) ? $formInstance->firstname : '' ?>" />
                        <p class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : ''; ?></p>
                        <label for="birthdate">Date de naissance</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= isset($formInstance->birthdate) ? $formInstance->birthdate : '' ?>" />
                        <p class="text-danger"><?= isset($formError['birthdate']) ? $formError['birthdate'] : ''; ?></p>
                        <label for="mail">Email</label>
                        <input class="form-control" id="mail" type="text" name="mail" value="<?= isset($formInstance->mail) ? $formInstance->mail : '' ?>" />
                        <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                        <label for="phone">Téléphone</label>
                        <input class="form-control" id="phone" name="phone" value="<?= isset($formInstance->phone) ? $formInstance->phone : '' ?>" />
                        <p class="text-danger"><?= isset($formError['phone']) ? $formError['phone'] : ''; ?></p>
                        <input class="w-100 card yellow-card mt-5 font-title font-weight-bold" type="submit" value="Envoyer" name="submit"/>
                    </div>
                </form>
            </div>
        <?php } ?>
        <?php include 'footer.php' ?>
        <?php include 'scriptLink.php' ?>
    </body>
</html>
