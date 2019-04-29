<?php

class Paciente {
    private $id_paciente;
    private $cpf;
    private $nome;
    private $dt_nascimento;

    public function getId_paciente(){
        return $this->id_paciente;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getDt_nascimento(){
        return $this->dt_nascimento;
    }

    public function setId_paciente($id_paciente){
        $this->id_paciente = $id_paciente;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setDt_nascimento($dt_nascimento){
        $this->dt_nascimento = $dt_nascimento;
    }

}