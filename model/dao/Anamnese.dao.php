<?php

class AnamneseDAO {
    public function insert(Anamnese $anamnese){
        $db = Sql::connect();
        $db->beginTransaction();
        $id_paciente = $anamnese->getId_paciente();
        try {
            $stmt = "SELECT @nr := Coalesce(Max(nr_anamnese),0) FROM anamnese WHERE id_paciente = :ID_PACIENTE";
            $res = $db->prepare($stmt);
            $res->bindParam(':ID_PACIENTE', $id_paciente);
            $res->execute();
            $obj = $res->fetch(PDO::FETCH_COLUMN);
            $nr_anamnese = $obj + 1;
            $stmt = "INSERT INTO anamnese (
                nr_anamnese,
                id_paciente,
                desc_anamnese,
                resposta
                ) 
            VALUES(
                :NR_ANAMNESE,
                :ID_PACIENTE,
                :DESC_ANAMNESE,
                :RESPOSTA
            )";
            $desc_anamnese = $anamnese->getDesc_anamnese();
            $resposta = $anamnese->getResposta();
            $res = $db->prepare($stmt);
            $res->bindParam(':NR_ANAMNESE', $nr_anamnese);
            $res->bindParam(':ID_PACIENTE', $id_paciente);
            $res->bindParam(':DESC_ANAMNESE', $desc_anamnese);
            $res->bindParam(':RESPOSTA', $resposta);
            $res->execute();
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e;
            return false;
        }
    }

    public function update(Anamnese $anamnese){
        $db = Sql::connect();
        $db->beginTransaction();
        try {
            $stmt = "UPDATE anamnese SET
                desc_anamnese = :DESC_ANAMNESE,
                resposta = :RESPOSTA
            WHERE id_paciente = :ID_PACIENTE AND nr_anamnese = :NR_ANAMNESE";
            $nr_anamnese = $anamnese->getNr_anamnese();
            $id_paciente = $anamnese->getId_paciente();
            $desc_anamnese = $anamnese->getDesc_anamnese();
            $resposta = $anamnese->getResposta();
            $res = $db->prepare($stmt);
            $res->bindParam(':NR_ANAMNESE', $nr_anamnese);
            $res->bindParam(':ID_PACIENTE', $id_paciente);
            $res->bindParam(':DESC_ANAMNESE', $desc_anamnese);
            $res->bindParam(':RESPOSTA', $resposta);
            $res->execute();
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e;
            return false;
        }
    }

    public function delete(Anamnese $anamnese){
        $db = Sql::connect();
        try {
            $stmt = "DELETE FROM anamnese WHERE id_paciente = :ID_PACIENTE AND nr_anamnese = :NR_ANAMNESE;
            UPDATE anamnese SET nr_anamnese = nr_anamnese - 1 WHERE id_paciente = :ID_PACIENTE AND nr_anamnese > :NR_ANAMNESE;";
            $nr_anamnese = $anamnese->getNr_anamnese();
            $id_paciente = $anamnese->getId_paciente();
            $res = $db->prepare($stmt);
            $res->bindParam(':NR_ANAMNESE', $nr_anamnese);
            $res->bindParam(':ID_PACIENTE', $id_paciente);
            $res->execute();
            return true;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e;
            return false;
        }
    }

    public function read(Anamnese $anamnese){
        $db = Sql::connect();
        try {
            $stmt = "SELECT * FROM anamnese WHERE id_paciente = :ID_PACIENTE AND nr_anamnese = :NR_ANAMNESE";
            $nr_anamnese = $anamnese->getNr_anamnese();
            $id_paciente = $anamnese->getId_paciente();
            $res = $db->prepare($stmt);
            $res->bindParam(':NR_ANAMNESE', $nr_anamnese);
            $res->bindParam(':ID_PACIENTE', $id_paciente);
            $res->execute();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e;
            return false;
        }
        $obj = $res->fetch(PDO::FETCH_OBJ);
        $anamnese = new Anamnese();
        $anamnese->setNr_anamnese($obj->nr_anamnese);
        $anamnese->setId_paciente($obj->id_paciente);
        $anamnese->setDesc_anamnese($obj->desc_anamnese);
        $anamnese->setResposta($obj->resposta);
        return $anamnese;
    }

    public function listAll(Anamnese $anamnese){
        $db = Sql::connect();
        try {
            $stmt = "SELECT * FROM anamnese WHERE id_paciente = :ID_PACIENTE";
            $id_paciente = $anamnese->getId_paciente();
            $res = $db->prepare($stmt);
            $res->bindParam(':ID_PACIENTE', $id_paciente);
            $res->execute();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e;
            return false;
        }
        $obj = $res->setFetchMode(PDO::FETCH_OBJ);
        $data = $res->fetchAll();
        $results = array();
        foreach ($data as $obj) {
            $anamnese = new Anamnese();
            $anamnese->setNr_anamnese($obj->nr_anamnese);
            $anamnese->setId_paciente($obj->id_paciente);
            $anamnese->setDesc_anamnese($obj->desc_anamnese);
            $anamnese->setResposta($obj->resposta);
            $results[] = $anamnese;
        }
        return $results;
    }
}