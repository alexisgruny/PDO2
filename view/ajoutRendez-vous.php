<?php
include '../model/modelDatabase.php';
include '../model/modelPatient.php';
include '../model/modelRendez-vous.php';
include '../controller/controllerAjoutRendez-vous.php';
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
            if (isset($_POST['submit']) && (count($formError) == 0)) {
                ?>
                <div class="alert alert-success mt-5" role="alert">Rendez-vous enregistré</div>
                <a href="index.php" class="card col-md-4 offset-md-4 yellow-card mt-5 text-center" role="button" aria-pressed="true">  -> Accueil <-  </a>
                <?php
                ;
            } else {
                ?>   
                <h1 class="text-center card yellow-card ml-5 mr-5 mt-2 font-title font-weight-bold">Crée un rendez-vous</h1>
                <form action="/view/ajoutRendez-vous.php" method="POST">
                    <div class="form-group col-md-6 offset-md-3  font-text font-weight-bold">

                        <label for="dateH" class="mt-4">Date</label>
                        <!--stock la saisie dans le champ-->
                        <input type="date" class="form-control is-valid" name="dateH" id="dateH" <?= isset($dateH) ? 'value="' . $dateH . '"' : '' ?> />
                        <!--affiche sous le champs le texte d'erreur-->
                        <?php if (isset($formError['dateH'])) { ?>
                            <p class="text-danger"> <?= $formError['dateH'] ?></p>
                        <?php } ?>

                        <label for="hour" class="mt-4">Heure</label>
                        <input type="time" class="form-control is-valid" name="hour" id="hour" <?= isset($hour) ? 'value="' . $hour . '"' : '' ?> />
                        <?php if (isset($formError['hour'])) { ?>
                            <p class="text-danger"> <?= $formError['hour'] ?></p>
                        <?php } ?>

                        <label for="idPatients" class="mt-4">Patients</label>
                        <select class="custom-select" name="idPatients" id="idPatients">
                            <?php foreach ($allPatients as $allPatients) { ?>
                                <option value="<?= $allPatients['id'] ?>" > <?= $allPatients['firstname'] . ' ' . $allPatients['lastname'] ?></option>
                            <?php }
                            ?>
                        </select>
                        <input class="w-100 card yellow-card mt-5 font-title font-weight-bold" type="submit" value="Ajouter" name="submit" />  
                        <p class="text-danger"> <?= isset($formError['submit']) ? $formError['submit'] : ''; ?></p>
                    </div>                            
                </form>
                <?php
                ;
            }
            ?>
        </div> 
        <?php include 'footer.php' ?>

        <?php include 'scriptLink.php' ?>
    </body>
</html>

