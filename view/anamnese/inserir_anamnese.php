<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anamnese <?= $paciente->getNome() ?></title>
</head>
<body>
    <a href="controller.php?id_paciente=<?= $anamnese->getId_paciente() ?>" class="btn btn-primary back-arrow"><i class="fas fa-arrow-left fa-fw"></i></a>
    <h1>Cadastrar Anamnese</h1>
    <?php require_once './../../view/alertbox.php' ?>
    <div class="content">
        <table class="list">
            <caption>Informações do Paciente</caption>
            <tr>
                <th>Nº do paciente</th>
                <td><?= $paciente->getId_paciente() ?></td>
            </tr>
            <tr>
                <th>Nome</th>
                <td><?= $paciente->getNome() ?></td>
            </tr>
            <tr>
                <th>CPF</th>
                <td><?= cpfFormatado($paciente->getCpf()) ?></td>
            </tr>
            <tr>
                <th>Data de Nascimento</th>
                <td><?= date("d/m/Y", strtotime($paciente->getDt_nascimento())) ?></td>
            </tr>
        </table>
        <br>
        <form action="../../controller/anamnese/controller.php" class="form-list" method="post">
            <input type="hidden" name="nr_anamnese" value="<?= $anamnese->getNr_anamnese() ?>">
            <input type="hidden" name="id_paciente" value="<?= $anamnese->getId_paciente() ?>">
            <textarea placeholder="Anamnese" id="desc_anamnese" rows="3" cols="100" name="desc_anamnese"><?= $anamnese->getDesc_anamnese() ?></textarea>
            <div>
                Resposta:
                <input type="radio" name="resposta" id="resposta_sim" value="1" <?= $anamnese->getResposta() == 1 ? 'checked' : '' ?>><label for="resposta_sim">Sim</label>
                <input type="radio" name="resposta" id="resposta_nao" value="0" <?= $anamnese->getResposta() == 0 ? 'checked' : '' ?>><label for="resposta_nao">Não</label>
            </div>
            <button type="submit" name="action" class="btn-primary" value="<?= $post_action ?>">Salvar</button>
        </form>
    </div>
</body>