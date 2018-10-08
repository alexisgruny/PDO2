<?php
$patient = NEW patients();
$allPatients = $patient->showPatientsList();

$regexDate = '/^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01])$/';
$regexHour = '/^([0-2][0-9]):([0-5][0-9])$/';

//tableau d'erreur
$formError = array();

if (isset($_POST['submit'])) {
    $newAppointment = NEW appointments();
    $newAppointment->idPatients = $_POST['idPatients'];
    if (!empty($_POST['dateH'])) {
        if (preg_match($regexDate, $_POST['dateH'])) {
            $dateH = htmlspecialchars($_POST['dateH']);
        } else {
            $formError['dateH'] = 'Saisie invalide';
        }
    } else {
        $formError['dateH'] = 'Champs obligatoire';
    }
    if (!empty($_POST['hour'])) {
        if (preg_match($regexHour, $_POST['hour'])) {
            $hour = htmlspecialchars($_POST['hour']);
            $newAppointment->dateHour = $dateH.' '.$hour;
        } else {
            $formError['hour'] = 'Saisie invalide';
        }
    } else {
        $formError['hour'] = 'Champs obligatoire';
    }
    if (count($formError) == 0) {
        if (!$newAppointment->addAppointment()) {
            $formError['submit'] = 'Il y a eu un problème';
        }
    }
}

?>
