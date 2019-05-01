<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <table class='table'>
        <caption>
            Lista de Pacientes
            <form action="controller.php" method="post">
                <button type="submit" name="action" class="btn btn-primary" value="new">Cadastrar</button>
            </form>
        </caption>
        <?php if (count($arrPacientes) > 0) {
    ?>
            <tr>
                <th>Nº do Paciente</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de nascimento</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($arrPacientes as $paciente) {
        ?>
                <tr>
                    <td><?= $paciente->getId_paciente() ?></td>
                    <td><?= $paciente->getNome()?></td>
                    <td><?= $paciente->getCpf()?></td>
                    <td><?= date("d/m/Y", strtotime($paciente->getDt_nascimento()))?></td>
                    <td>
                        <form action="controller.php" method="post">
                            <input type="hidden" name="id_paciente" value="<?= $paciente->getId_paciente() ?>">
                            <button type="submit" name="action" class="btn btn-outline-primary" value="update"><i class="fas fa-edit"></i></button>
                            <button type="submit" name="action" class="btn btn-outline-warning" value="anamnese"><i class="fas fa-file-medical-alt"></i></button>
                            <button type="submit" name="action" class="btn btn-outline-danger" value="delete"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php
    } ?>
        <?php
} else {
        ?>
            <tr>
                <td>Nenhum registro encontrado</td>
            </tr>
        <?php
    } ?>
    </table>
</body>
</html>