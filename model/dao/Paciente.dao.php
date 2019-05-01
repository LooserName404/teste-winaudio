<?php

class PacienteDAO {
    public function insert(Paciente $paciente){
        $db = Sql::connect();
        $db->beginTransaction();
        try {
            $stmt = "INSERT INTO paciente (
                cpf,
                nome,
                dt_nascimento
                ) 
            VALUES(
                :CPF,
                :NOME,
                :DT_NASCIMENTO
            )";
            $cpf = $paciente->getCpf();
            $nome = $paciente->getNome();
            $dt_nascimento = $paciente->getDt_nascimento();
            $res = $db->prepare($stmt);
            $res->bindParam(':CPF', $cpf);
            $res->bindParam(':NOME', $nome);
            $res->bindParam(':DT_NASCIMENTO', $dt_nascimento);
            $res->execute();
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e;
            return false;
        }
    }

    public function update(Paciente $paciente){
        $db = Sql::connect();
        $db->beginTransaction();
        try {
            $stmt = "UPDATE paciente SET
                cpf = :CPF,
                nome = :NOME,
                dt_nascimento = :DT_NASCIMENTO
            WHERE id_paciente = :ID";
            $id_paciente = $paciente->getId_paciente();
            $cpf = $paciente->getCpf();
            $nome = $paciente->getNome();
            $dt_nascimento = $paciente->getDt_nascimento();
            $res = $db->prepare($stmt);
            $res->bindParam(':ID', $id_paciente);
            $res->bindParam(':CPF', $cpf);
            $res->bindParam(':NOME', $nome);
            $res->bindParam(':DT_NASCIMENTO', $dt_nascimento);
            $res->execute();
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e;
            return false;
        }
    }

    public function delete(Paciente $paciente){
        $db = Sql::connect();
        try {
            $stmt = "DELETE FROM paciente WHERE id_paciente = :ID";
            $id_paciente = $paciente->getId_paciente();
            $res = $db->prepare($stmt);
            $res->bindParam(':ID', $id_paciente);
            $res->execute();
            return true;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e;
            return false;
        }
    }

    public function read(Paciente $paciente){
        $db = Sql::connect();
        try {
            $stmt = "SELECT * FROM paciente WHERE id_paciente = :ID";
            $id_paciente = $paciente->getId_paciente();
            $res = $db->prepare($stmt);
            $res->bindParam(':ID', $id_paciente);
            $res->execute();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e;
            return false;
        }
        $obj = $res->fetch(PDO::FETCH_OBJ);
        $paciente = new Paciente();
        $paciente->setId_paciente($obj->id_paciente);
        $paciente->setNome($obj->nome);
        $paciente->setCpf($obj->cpf);
        $paciente->setDt_nascimento($obj->dt_nascimento);
        return $paciente;
    }

    public function listAll(){
        $db = Sql::connect();
        try {
            $stmt = "SELECT * FROM paciente";
            
            $res = $db->prepare($stmt);
            $res->execute();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e;
            return false;
        }
        $obj = $res->setFetchMode(PDO::FETCH_OBJ);
        $data = $res->fetchAll();
        $results = array();
        foreach ($data as $obj) {
            $paciente = new Paciente();
            $paciente->setId_paciente($obj->id_paciente);
            $paciente->setNome($obj->nome);
            $paciente->setCpf($obj->cpf);
            $paciente->setDt_nascimento($obj->dt_nascimento);
            $results[] = $paciente;
        }
        return $results;
    }
}
