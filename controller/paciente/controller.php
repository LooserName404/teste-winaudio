<?php

require_once('../../config/config.php');

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

if (array_key_exists('action', $_POST)) {
    switch ($_POST['action']) {
        case 'new':
            $post_action = 'insert';
            require_once '../../view/paciente/inserir_paciente.php';
            break;
        case 'insert':
            if (!$paciente->getNome() || !$paciente->getCpf() || !$paciente->getDt_nascimento()) {
                $post_action = 'insert';
                echo 'Preencha todos os campos!';
                require_once '../../view/paciente/inserir_paciente.php';
                exit;
            }

            if (!$pacienteDAO->insert($paciente)) {
                echo $_SESSION['error']->getMessage();
            }
            header('Location: controller.php', true, 301);
            break;
        case 'update':
            $post_action = 'change';
            $paciente = $pacienteDAO->read($paciente);
            require_once '../../view/paciente/inserir_paciente.php';
            break;
        case 'change':
            if (!$paciente->getNome() || !$paciente->getCpf() || !$paciente->getDt_nascimento()) {
                $post_action = 'change';
                echo 'Preencha todos os campos!';
                require_once '../../view/paciente/inserir_paciente.php';
                exit;
            }
            if (!$pacienteDAO->update($paciente)) {
                echo $_SESSION['error']->getMessage();
            }
            header('Location: controller.php', true, 301);
            break;
        case 'delete':
            if (!$pacienteDAO->delete($paciente)) {
                echo $_SESSION['error']->getMessage();
            }
            header('Location: controller.php', true, 301);
            break;
        case 'anamnese':
            header('Location: ../anamnese/controller.php', true, 301);
            exit;
            break;
    }
} else {
    $arrPacientes = array();
    $arrPacientes = $pacienteDAO->listAll();
    require_once '../../view/paciente/lista_pacientes.php';
}
