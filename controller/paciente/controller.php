<?php

require_once '../../config/config.php' ;

$paciente = new Paciente();
if (array_key_exists('id_paciente', $_POST)) {
    $paciente->setId_paciente(htmlentities($_POST['id_paciente']));
}
if (array_key_exists('nome', $_POST)) {
    $paciente->setNome(htmlentities($_POST['nome']));
}
if (array_key_exists('cpf', $_POST)) {
    $paciente->setCpf(htmlentities($_POST['cpf']));
}
if (array_key_exists('dt_nascimento', $_POST)) {
    $paciente->setDt_nascimento(htmlentities($_POST['dt_nascimento']));
}

$pacienteDAO = new PacienteDAO();

$msg_success = '';
$msg_error = '';

if (array_key_exists('action', $_POST)) {
    switch ($_POST['action']) {
        case 'new':
            $post_action = 'insert';
            require_once '../../view/paciente/inserir_paciente.php';
            break;
        case 'insert':
            if (!$paciente->getNome() || !$paciente->getCpf() || !$paciente->getDt_nascimento()) {
                $post_action = 'insert';
                $msg_error .= 'Preencha todos os campos!';
                require_once '../../view/paciente/inserir_paciente.php';
                exit;
            }

            if (!$pacienteDAO->insert($paciente)) {
                $msg_error .= 'Erro ao tentar inserir o registro: ' .  $_SESSION['error']->getMessage();
                require_once '../../view/paciente/inserir_paciente.php';
            } else {
                $msg_success .= 'Paciente cadastrado com sucesso';
                $arrPacientes = array();
                $arrPacientes = $pacienteDAO->listAll();
                require_once '../../view/paciente/lista_paciente.php';
            }
            break;
        case 'update':
            $post_action = 'change';
            $paciente = $pacienteDAO->read($paciente);
            require_once '../../view/paciente/inserir_paciente.php';
            break;
        case 'change':
            if (!$paciente->getNome() || !$paciente->getCpf() || !$paciente->getDt_nascimento()) {
                $post_action = 'change';
                $msg_error .= 'Preencha todos os campos!';
                require_once '../../view/paciente/inserir_paciente.php';
                exit;
            }
            if (!$pacienteDAO->update($paciente)) {
                $msg_error .= 'Erro ao tentar atualizar o registro: ' .  $_SESSION['error']->getMessage();
                require_once '../../view/paciente/inserir_paciente.php';
            } else {
                $msg_success .= 'Paciente alterado com sucesso';
                $arrPacientes = array();
                $arrPacientes = $pacienteDAO->listAll();
                require_once '../../view/paciente/lista_paciente.php';
            }
            break;
        case 'delete':
            if (!$pacienteDAO->delete($paciente)) {
                $msg_error .= 'Erro ao tentar excluir o registro' . $_SESSION['error']->getMessage();
            } else {
                $msg_success .= 'Paciente excluído com sucesso';
                $arrPacientes = array();
                $arrPacientes = $pacienteDAO->listAll();
                require_once '../../view/paciente/lista_paciente.php';
            }
            break;
        case 'anamnese':
            $id_paciente = $_POST['id_paciente'];
            header('Location: ../anamnese/controller.php?id_paciente=' . $id_paciente, true, 301);
            exit;
            break;
    }
} else {
    $arrPacientes = array();
    $arrPacientes = $pacienteDAO->listAll();
    require_once '../../view/paciente/lista_paciente.php';
}
