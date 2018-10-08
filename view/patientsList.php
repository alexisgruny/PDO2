<?php
include '../model/modelDatabase.php';
include '../model/modelPatient.php';
include '../controller/controllerPatientsList.php';
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
            <h1 class="text-center card yellow-card ml-5 mr-5 mt-2 font-weight-bold font-title">Listes de patients</h1>
            <div class="row justify-content-center">
                <div class="col-md-6">  
                    <form action="patientsList.php" method="POST" class="form-inline">
                        <input type="text" placeholder="Nom" name="searchName" />
                        <input class="card yellow accent-3 ml-3" type="submit" name="search" value="Rechercher" />
                </form>

                    <table class="table table-striped table-light text-center mt-5">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Lien profil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['search'])) {
                                foreach ($patientJointList as $patientJointDetail) {
                                    ?>
                                    <tr>
                                        <td class="mt-5 text-center"> <?= $patientJointDetail->lastname ?> </td>
                                        <td class="mt-5 text-center"> <?= $patientJointDetail->firstname ?> </td>

                                        <td class="mt-5 text-center"><a href="profilPatients.php?id=<?= $patientJointDetail->id ?>">Detail profil</a></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                foreach ($allPatients as $allPatients) {
                                    ?>
                                    <tr>
                                        <td class="mt-5 text-center"><?= $allPatients['lastname'] ?></td>
                                        <td class="mt-5 text-center"><?= $allPatients['firstname'] ?></td>
                                        <td class="mt-5 text-center"><a href="profilPatients.php?id=<?= $allPatients['id'] ?>">Detail profil</a></td>
                                    </tr>
                            <?php } }
                                ?>
                            </tbody>
                        </table>  
                        <a href="/view/newPatientForm.php" class="btn btn-primary btn-lg active w-100 yellow-text" role="button" aria-pressed="true">Crée une fiche patient </a>
                    </div>
                </div> 
            </div>
            <?php include 'footer.php' ?>
    <?php include 'scriptLink.php' ?>
    </body>
</html>