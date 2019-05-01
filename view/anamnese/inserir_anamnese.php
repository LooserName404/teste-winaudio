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
        <form action="../../controller/anamnese/controller.php" method="post">
            <input type="hidden" name="id_paciente" value="<?= $anamnese->getId_paciente() ?>">
            <label for="desc_anamnese">Anamnese: <textarea id="desc_anamnese" rows="1" cols="100" name="desc_anamnese"><?= $anamnese->getDesc_anamnese() ?></textarea></label>
            <div>
                Resposta: 
                <input type="radio" name="resposta" id="resposta_sim" value="1"><label for="resposta_sim">Sim</label>
                <input type="radio" name="resposta" id="resposta_nao" value="0"><label for="resposta_nao">Não</label>
            </div>
            <button type="submit" name="action" value="<?= $post_action ?>">Salvar</button>
        </form>
    </div>
</body>