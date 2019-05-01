<?php

class Anamnese
{
    private $nr_anamnese;
    private $id_paciente;
    private $desc_anamnese;
    private $resposta;

    public function getNr_anamnese()
    {
        return $this->nr_anamnese;
    }

    public function getId_paciente()
    {
        return $this->id_paciente;
    }

    public function getDesc_anamnese()
    {
        return $this->desc_anamnese;
    }

    public function getResposta()
    {
        return $this->resposta;
    }

    public function setNr_anamnese($nr_anamnese)
    {
        $this->nr_anamnese =  $nr_anamnese;
    }

    public function setId_paciente($id_paciente)
    {
        $this->id_paciente = $id_paciente;
    }

    public function setDesc_anamnese($desc_anamnese)
    {
        $this->desc_anamnese = $desc_anamnese;
    }

    public function setResposta($resposta)
    {
        $this->resposta = $resposta;
    }

    public function __toString()
    {
        return json_encode([
            'nr_anamnese' => $this->nr_anamnese,
            'id_paciente' => $this->id_paciente,
            'desc_anamnese' => $this->desc_anamnese,
            'resposta' => $this->resposta
        ]);
    }
}
