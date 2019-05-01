<?php

require_once('../../config/config.php');

$anamnese = new Anamnese();
if (array_key_exists('nr_anamnese', $_POST)) {
    $anamnese->setNr_anamnese($_POST['nr_anamnese']);
}
if (array_key_exists('id_paciente', $_POST)) {
    $anamnese->setId_paciente($_POST['id_paciente']);
}
if (array_key_exists('desc_anamnese', $_POST)) {
    $anamnese->setDesc_anamnese($_POST['desc_anamnese']);
}
if (array_key_exists('resposta', $_POST)) {
    $anamnese->setResposta($_POST['resposta']);
}
