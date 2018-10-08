<?php
class patients extends database {

//liste des attributs
    public $id;
    public $lastname;
    public $firstname;
    public $mail;
    public $birthdate;
    public $phone;

//    public function testForm() {
////déclare ma variable request qui contient ma requéte SQL
//        $request = 'SELECT `mail`, `phone`'
//                . 'FROM `patients`'
//                . 'WHERE `phone` = \'' . $this->phone . '\' OR `mail` = \'' . $this->mail . '\'';
//        $testForm = $this->db->prepare($request);
//        if ($testForm->execute()) {
//            if ($testForm->fetch() == TRUE) {
//                return $bool = 1;
//            } else {
//                return $bool = 0;
//            }
//        }
//    }

    public function getForm() {
        $request = 'INSERT INTO `patients` ( `lastname`, `firstname`, `birthdate`, `phone`, `mail`)'
                . 'VALUES ( :lastname, :firstname, :birthdate, :phone, :mail)';
//prépare la requéte sql dans la database
        $getForm = $this->db->prepare($request);
        $getForm->bindValue(':lastname', $this->lastname);
        $getForm->bindValue(':firstname', $this->firstname);
        $getForm->bindValue(':birthdate', $this->birthdate);
        $getForm->bindValue(':phone', $this->phone);
        $getForm->bindValue(':mail', $this->mail);
// si la requéte est préparé , je l'execute
        $getForm->execute();
//et je retourne tout les résultat dans un tableau
    }

    public function showPatientsList() {
        $request = 'SELECT `id`, `firstname`, `lastname`, `birthdate`, `phone`, `mail` '
                . 'FROM `patients`';
        $getAllPatients = $this->db->prepare($request);
        if ($getAllPatients->execute()) {
            return $getAllPatients->fetchAll();
        }
    }
    public function modifPatient() {
        $request = 'UPDATE `patients` '
                . 'SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail '
                . 'WHERE `id` = :id ';
//prépare la requéte sql dans la database
        $getForm = $this->db->prepare($request);
        $getForm->bindValue(':lastname', $this->lastname);
        $getForm->bindValue(':firstname', $this->firstname);
        $getForm->bindValue(':birthdate', $this->birthdate);
        $getForm->bindValue(':phone', $this->phone);
        $getForm->bindValue(':mail', $this->mail);
        $getForm->bindValue(':id', $this->id);
// si la requéte est préparé , je l'execute
        $updatePatient = $getForm->execute();
//et je retourne tout les résultat dans un tableau
        return $updatePatient;
    }
    
    //supprime une ligne patients
    public function patientDelete() {
        $PDOResult = $this->dbconnexion->prepare('DELETE FROM `patients` WHERE `id` = :id');
        //bindvalue = attribut la valeur
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->execute();
        return $PDOResult;
    }

    //Affiche la liste des patients commencant par le champs de recherche
    public function getPatientJointList() {
        $isObjectResult = array();
        $searchName = htmlspecialchars($_POST['searchName']);
        var_dump($this->searchName);
        $searchName = $searchName . "%";
        $PDOResult = $this->db->prepare('SELECT `id`, `lastname`, `firstname` FROM `patients` WHERE `lastname` LIKE :search ORDER BY `lastname` ASC');
        $PDOResult->bindValue(':search', $this->searchName);
        $PDOResult->execute();
        // Vérifie que $PDOResult est un objet
        if (is_object($PDOResult)) {
            // Stocke la requête dans $PDOResult / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }
    public function showPatientInfoList() {
        $PDOResult = $this->db->prepare('SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` '
                . 'FROM `patients` '
                . 'WHERE id = :id');
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->execute();
        if (is_object($PDOResult)) {
            // Stocke la requête dans $PDOResult / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $PDOResult->fetch(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }
}

?>