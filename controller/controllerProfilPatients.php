<?php
// appel le modelClients qui contient la classe database et clients
$patientsInstance = new patients();
//déclaration de la variable allClients qui contien l'instaciation de $clientsInstance avec la methode getAllClients
$allPatients = $patientsInstance->showPatientsList();

$appointmentInfo = NEW appointments();

$appointmentInfo->idPatients = $_GET['id'];
$appointmentInfoList = $appointmentInfo->getAppointmentInfoList();

$formInstance = new patients();
$formInstance->id = $_GET['id'];
//Déclaration des regex
//Déclaration regex numéro de téléphone
$regexPhoneNumber = '/^[0-9]{10}$/';
//Déclaration regex nom
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-]+$/';
//Déclaration regex date
$regexDate = '/^[\d]{4}-[\d]{2}-[\d]{2}$/';
//Déclaration regex texte
$regexText = '/^[0-9a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\ \.\,\?\:\!\']+$/';
//Déclaration regex adresse
$regexAddress = '/^[A-z0-9àáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
//Déclaration regex nombre et lettre
$regexNumberLetter = '/^[0-9A-z]+$/';
//déclaration d'un tableau d'érreur
$formError = array();
if (isset($_POST['lastname'])) {
    //déclarion de la variable lastname avec le htmlspecialchar qui change l'interprétation des balises par le code
    $formInstance->lastname = htmlspecialchars($_POST['lastname']);
    //test de la regex si elle est invalide
    if (!preg_match($regexName, $formInstance->lastname)) {
        //stocker dans le tableau le rapport d'érreur
        $formError['lastname'] = 'Saisie invalide.';
    }
    // verifie si le champs de nom et vide
    if (empty($formInstance->lastname)) {
        //stocker dans le tableau le rapport d'érreur
        $formError['lastname'] = 'Champ obligatoire.';
    }
}
if (isset($_POST['firstname'])) {
    $formInstance->firstname = htmlspecialchars($_POST['firstname']);
    if (!preg_match($regexName, $formInstance->firstname)) {
        $formError['firstname'] = 'Saisie invalide.';
    }
    if (empty($formInstance->firstname)) {
        $formError['firstname'] = 'Champ obligatoire.';
    }
}
if (isset($_POST['birthdate'])) {
    $formInstance->birthdate = htmlspecialchars($_POST['birthdate']);
    if (!preg_match($regexDate, $formInstance->birthdate)) {
        $formError['birthdate'] = 'Saisie invalide.';
    }
    if (empty($formInstance->birthdate)) {
        $formError['birthdate'] = 'Champ obligatoire.';
    }
}
if (isset($_POST['mail'])) {
    $formInstance->mail = htmlspecialchars($_POST['mail']);
    //le filtre permet de verifier l'email
    if (!FILTER_VAR($formInstance->mail, FILTER_VALIDATE_EMAIL)) {
        $formError['mail'] = 'Saisie invalide.';
    }
    if (empty($formInstance->mail)) {
        $formError['mail'] = 'Champ obligatoire.';
    }
}
if (isset($_POST['phone'])) {
    $formInstance->phone = htmlspecialchars($_POST['phone']);
    if (!preg_match($regexPhoneNumber, $formInstance->phone)) {
        $formError['phone'] = 'Saisie invalide.';
    }
    if (empty($formInstance->phone)) {
        $formError['phone'] = 'Champ obligatoire.';
    }
}
//déclaration de la variable allClients qui contien l'instaciation de $clientsInstance avec la methode getAllClients

if (isset($_POST['submit']) && (count($formError) == 0)) {
    $formInstance->modifPatient();
}
?>
