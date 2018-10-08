<?php
//déclarationd e l'instance  clients
$patientsInstance = new patients();
//déclaration de la variable allClients qui contien l'instaciation de $clientsInstance avec la methode getAllClients
$allPatients = $patientsInstance->showPatientsList();
if (!isset($_POST['search'])) {
    $patientPage = NEW patients();
    $patientPageList = $patientPage->showPatientInfoList();

} else {
    $patientJoint = NEW patients();
    $patientJoint->searchName = $_POST['searchName'];
    $patientJointList = $patientJoint->getPatientJointList();
}
?>
