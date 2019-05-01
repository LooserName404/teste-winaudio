<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anamnese <?= $paciente->getNome() ?></title>
</head>
<body>
    <div class="container">
        <table class="table table-sm">
            <tr class="thead-light">
                <th>Nº do paciente</th>
                <td><?= $paciente->getId_paciente() ?></td>
                <th>Nome</th>
                <td><?= $paciente->getNome() ?></td>
            </tr>
            
            <tr class="thead-light">
                <th>CPF</th>
                <td><?= $paciente->getCpf() ?></td>
                <th>Data de Nascimento</th>
                <td><?= $paciente->getDt_nascimento() ?></td>
            </tr>
            <tr>
                <td colspan="4">
                    Anamnese
                </td>
            </tr>
            <tr class="thead-light">
                <th colspan="2">Nº da anamnese</th>
                <td colspan="2"><?= $anamnese->getNr_anamnese() ?></td>
            </tr>
            <tr class="thead-light">
                <th colspan="2">Anamnese</th>
                <td colspan="2"><?= $anamnese->getDesc_anamnese() ?></td>
            </tr>
            <tr class="thead-light">
                <th colspan="2">Resposta</th>
                <td colspan="2"><?= $anamnese->getResposta() == 1 ? 'Sim' : 'Não' ?></td>
            </tr>
        </table>
    </div>
</body>
</html>