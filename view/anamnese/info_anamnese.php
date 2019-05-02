<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anamnese <?= $paciente->getNome() ?></title>
</head>
<body>
    <a href="controller.php?id_paciente=<?= $anamnese->getId_paciente() ?>" class="btn btn-primary back-arrow"><i class="fas fa-arrow-left fa-fw"></i></a>
    <h1>Detalhes</h1>
    <div class="content">
        <table class="list">
            <tr>
                <th>Nº do paciente</th>
                <td><?= $paciente->getId_paciente() ?></td>
                <th>Nome</th>
                <td><?= $paciente->getNome() ?></td>
            </tr>
            
            <tr>
                <th>CPF</th>
                <td><?= cpfFormatado($paciente->getCpf()) ?></td>
                <th>Data de Nascimento</th>
                <td><?= date("d/m/Y", strtotime($paciente->getDt_nascimento())) ?></td>
            </tr>
            <tr>
                <td colspan="4">
                    Anamnese
                </td>
            </tr>
            <tr>
                <th colspan="2">Nº da anamnese</th>
                <td colspan="2"><?= $anamnese->getNr_anamnese() ?></td>
            </tr>
            <tr>
                <th colspan="2">Anamnese</th>
                <td colspan="2"><?= $anamnese->getDesc_anamnese() ?></td>
            </tr>
            <tr>
                <th colspan="2">Resposta</th>
                <td colspan="2"><?= $anamnese->getResposta() == 1 ? 'Sim' : 'Não' ?></td>
            </tr>
        </table>
    </div>
</body>
</html>