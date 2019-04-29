<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <table class='table-paciente'>
        <caption>Lista de Pacientes</caption>
        <?php if(count($arrPaciente) > 0) {?>
            <tr>
                <th>Nrº Paciente</th>
                <th>CPF</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th></th>
            </tr>
            <?php foreach($arrPaciente as $paciente) {?>
                <tr>
                    <td><?= $paciente->getId_paciente() ?></td>
                    <td><?= $paciente->getCpf() ?></td>
                    <td><?= $paciente->getNome() ?></td>
                    <td><?= $paciente->getDt_nascimento() ?></td>
                    <td><button>Ver anamneses</button></td>
                </tr>
            <?php } ?>
        <?php } else {?>
            <td>Nenhum paciente encontrado</td>
        <?php } ?>

    </table>
</body>
</html>