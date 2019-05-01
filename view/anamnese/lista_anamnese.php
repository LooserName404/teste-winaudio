<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anamnese <?= $paciente->getNome() ?></title>
</head>
<body>
    <table class="table table-sm">
        <tr class="thead-light">
            <th>Nº do paciente</th>
            <td><?= $paciente->getId_paciente() ?></td>
        </tr>
        <tr class="thead-light">
            <th>Nome</th>
            <td><?= $paciente->getNome() ?></td>
        </tr>
        <tr class="thead-light">
            <th>CPF</th>
            <td><?= $paciente->getCpf() ?></td>
        </tr>
        <tr class="thead-light">
            <th>Data de Nascimento</th>
            <td><?= $paciente->getDt_nascimento() ?></td>
        </tr>
    </table>
    <br>
    <form action="controller.php" method="post">
        <input type="hidden" name="id_paciente" value="<?= $paciente->getId_paciente() ?>">
        <button type="submit" name="action" value="new" class="btn btn-primary">Cadastrar</button>
    </form>
    <table class="table">
        <caption>Anamneses</caption>
        <?php if(count($arrAnamnese) > 0) {?>
            <tr>
                <th>Nrº da Anamnese</th>
                <th>Anamnese</th>
                <th>Resposta</th>
                <th>Ações</th>
            </tr>
            <?php foreach($arrAnamnese as $anamnese) {?>
                <tr>
                    <td><?= $anamnese->getNr_anamnese() ?></td>
                    <td><?= $anamnese->getDesc_anamnese() ?></td>
                    <td><?= $anamnese->getResposta() == 1 ? 'Sim' : 'Não' ?></td>
                    <td>
                    <form action="controller.php" method="post">
                        <input type="hidden" name="nr_anamnese" value="<?= $anamnese->getNr_anamnese() ?>">
                        <input type="hidden" name="id_paciente" value="<?= $anamnese->getId_paciente() ?>">
                        <button type="submit" name="action" class="btn btn-outline-primary" value="update"><i class="fas fa-edit"></i></button>
                        <button type="submit" name="action" class="btn btn-outline-warning" value="info"><i class="fas fa-eye"></i></button>
                        <button type="submit" name="action" class="btn btn-outline-danger" value="delete"><i class="fas fa-trash"></i></button>
                    </form>
                    </td>
                </tr>
            <?php }?>
        <?php } else {?>
            <tr>
                <td>Nenhum registro encontrado.</td>
            </tr>
        <?php }?>
    </table>
</body>
</html>