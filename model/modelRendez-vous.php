<?php
//creation de la classe showTypes
class appointments extends database {

//liste des attributs
    public $id;
    public $dateHour;
    public $idPatients;

    //ajoute des rdv dans la base de données
    public function addAppointment() {
        // :xxx = marqueur nominatif (comme un parametre)
        $PDOResult = $this->db->prepare('INSERT INTO `appointments`(`dateHour`, `idPatients`)
         VALUES(:dateHour, :idPatients)');
        //bind value= attribut la valeur = protege des injection sql
        //
        $PDOResult->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $PDOResult->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);

        return $PDOResult->execute();
    }

    //affiche la liste des rdv
    public function getAppointmentList() {
        $isObjectResult = array();
        $PDOResult = $this->db->query('SELECT `id`, `dateHour`, `idPatients` FROM `appointments` ORDER BY `dateHour` ASC');
        // Vérifie que $PDOResult est un objet
        if (is_object($PDOResult)) {
            // Stocke la requête dans $PDOResult / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }

    //afficle les infos d'un patient set ses rdv
    public function getAppointmentInfoList() {
        $isObjectResult = array();
        $PDOResult = $this->db->prepare('SELECT `id`, `dateHour`, `idPatients` FROM `appointments` WHERE idPatients = :idPatients ORDER BY `dateHour` ASC');
        $PDOResult->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $PDOResult->execute();
        if (is_object($PDOResult)) {
            // Stocke la requête dans $PDOResult / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }

    //modif de donnée rdv
    public function updateAppointment() {
        $PDOResult = $this->db->prepare('UPDATE `appointments` SET `dateHour` = :dateHour WHERE `id` = :id');
        //bindvalue = attribut la valeur
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $PDOResult->execute();
        return $PDOResult;
    }

    //supprime une ligne rdv
    public function appointmentDelete() {
        $PDOResult = $this->db->prepare('DELETE FROM `appointments` WHERE `id` = :id OR `idPatients` = :idPatients');
        //bindvalue = attribut la valeur
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $PDOResult->execute();
        return $PDOResult;
    }
}
?>

