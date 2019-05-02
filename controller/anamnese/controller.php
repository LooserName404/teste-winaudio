<?php

require_once '../../config/config.php';

$anamnese = new Anamnese();
if (array_key_exists('id_paciente', $_GET)) {
    $anamnese->setId_paciente($_GET['id_paciente']);
} elseif (array_key_exists('id_paciente', $_POST)) {
    $anamnese->setId_paciente($_POST['id_paciente']);
} else {
    echo "Erro ao tentar selecionar o paciente";
    exit;
}
if (array_key_exists('nr_anamnese', $_POST)) {
    $anamnese->setNr_anamnese($_POST['nr_anamnese']);
}
if (array_key_exists('desc_anamnese', $_POST)) {
    $anamnese->setDesc_anamnese($_POST['desc_anamnese']);
}
if (array_key_exists('resposta', $_POST)) {
    $anamnese->setResposta($_POST['resposta']);
}

$paciente = new Paciente();
$pacienteDAO = new PacienteDAO();
$paciente->setId_paciente($anamnese->getId_paciente());
$paciente = $pacienteDAO->read($paciente);

$anamneseDAO = new AnamneseDAO();

$msg_success = '';
$msg_error = '';

if (array_key_exists('action', $_POST)) {
    switch ($_POST['action']) {
        case 'new':
            $post_action = 'insert';
            require_once '../../view/anamnese/inserir_anamnese.php';
            break;
        case 'insert':
            if ($anamnese->getDesc_anamnese() == '' || $anamnese->getResposta() == '') {
                $post_action = 'insert';
                $msg_error .= 'Preencha todos os campos!';
                require_once '../../view/anamnese/inserir_anamnese.php';
                exit;
            }

            if (!$anamneseDAO->insert($anamnese)) {
                $msg_error .= 'Erro ao tentar inserir o registro: ' .  $_SESSION['error']->getMessage();
                require_once '../../view/anamnese/inserir_anamnese.php';
            } else {
                $msg_success .= 'Anamnese cadastrada com sucesso';
                $arrAnamnese = array();
                $arrAnamnese = $anamneseDAO->listAll($anamnese);
                require_once '../../view/anamnese/lista_anamnese.php';
            }
            break;
        case 'update':
            $post_action = 'change';
            $anamnese = $anamneseDAO->read($anamnese);
            require_once '../../view/anamnese/inserir_anamnese.php';
            break;
        case 'change':
            if ($anamnese->getDesc_anamnese() == '' || $anamnese->getResposta() == '') {
                $post_action = 'change';
                $msg_error .= 'Preencha todos os campos!';
                require_once '../../view/anamnese/inserir_anamnese.php';
                exit;
            } else {
                $msg_success .= 'Anamnese alterada com sucesso';
                $arrAnamnese = array();
                $arrAnamnese = $anamneseDAO->listAll($anamnese);
                require_once '../../view/anamnese/lista_anamnese.php';
            }
            break;
        case 'delete':
            if (!$anamneseDAO->delete($anamnese)) {
                $msg_error .= 'Erro ao tentar excluir o registro' . $_SESSION['error']->getMessage();
            } else {
                $msg_success .= 'Anamnese excluída com sucesso';
                $arrAnamnese = array();
                $arrAnamnese = $anamneseDAO->listAll($anamnese);
                require_once '../../view/anamnese/lista_anamnese.php';
            }
            break;
        case 'info':
            $anamnese = $anamneseDAO->read($anamnese);
            require_once '../../view/anamnese/info_anamnese.php';
            break;
    }
} else {
    $arrAnamnese = array();
    $arrAnamnese = $anamneseDAO->listAll($anamnese);
    require_once '../../view/anamnese/lista_anamnese.php';
}