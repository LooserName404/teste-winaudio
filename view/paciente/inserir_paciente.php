<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <form action="../../controller/paciente/controller.php" method="post">
        <input type="hidden" name="id_paciente" value="<?= $paciente->getId_paciente() ?>">
        <label for="nome">Nome: <input type="text" name="nome" value="<?= $paciente->getNome() ?>"></label><br>
        <label for="idade">CPF: <input type="text" maxlength="11" name="cpf" value="<?= $paciente->getCpf() ?>"></label><br>
        <label for="dt_nascimento">Data de nascimento: <input type="date" name="dt_nascimento" value="<?= $paciente->getDt_nascimento() ?>"></label><br>
        <input type="submit" name="action" id="action" value="<?= $post_action ?>">
    </form>
</body>