<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <a href="../paciente/controller.php" class="btn btn-primary back-arrow"><i class="fas fa-arrow-left fa-fw"></i></a>
    <h1>Cadastrar Paciente</h1>
    <?php require_once './../../view/alertbox.php' ?>
    <div class="content">
        <form class="form-list" action="../../controller/paciente/controller.php" method="post">
            <input type="hidden" name="id_paciente" value="<?= $paciente->getId_paciente() ?>">
            <input type="text" name="nome" placeholder="Nome" value="<?= $paciente->getNome() ?>">
            <input type="text" maxlength="11" placeholder="CPF" name="cpf" value="<?= $paciente->getCpf() ?>">
            <input type="text" placeholder="Data de Nascimento" onfocus="(this.type='date')" onblur="(this.type='text')" name="dt_nascimento" min="1900-01-01" value="<?= $paciente->getDt_nascimento() ?>">
            <button type="submit" name="action" class="btn-primary" id="action" value="<?= $post_action ?>">Salvar</button>
        </form>
    </div>
</body>