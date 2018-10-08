
<?php

$appointment = NEW appointments();
$appointmentList = $appointment->getAppointmentList();

if (isset($_GET['idrdv'])) {
    $deleteAppointment = NEW appointments();
    $deleteAppointment->id = $_GET['idrdv'];
    $deleteAppointmentDelete = $deleteAppointment->appointmentDelete();

    $appointment = NEW appointments();
    $appointmentList = $appointment->getAppointmentList();
}
?>
