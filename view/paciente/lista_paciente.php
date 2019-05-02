<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pacientes</title>
    </head>
    <body>
        <h1>Lista de Pacientes</h1>
        <form action="controller.php" class="btn-holder" method="post">
            <button type="submit" name="action" class="btn btn-primary" value="new">Cadastrar</button>
        </form>
        <div class="content">
            <?php if (count($arrPacientes) > 0) { ?>
                <?php foreach ($arrPacientes as $paciente) { ?>
                    <div class="card">
                        <span>Nº <?= $paciente->getId_paciente() ?></span>
                        <div class="nome"><?= $paciente->getNome() ?></div>
                        <div class="cpf"><?= cpfFormatado($paciente->getCpf()) ?></div>
                        <div class="dt_nascimento"><?= date("d/m/Y", strtotime($paciente->getDt_nascimento()))?></div>
                        <div class="actions">
                            <form action="controller.php" class="btn-holder" method="post">
                                <input type="hidden" name="id_paciente" value="<?= $paciente->getId_paciente() ?>">
                                <button type="submit" name="action" class="btn btn-primary outline" value="update"><i class="fas fa-edit fa-fw" title="Alterar paciente"></i></button>
                                <button type="submit" name="action" class="btn btn-warning outline" value="anamnese"><i class="fas fa-file-medical-alt fa-fw" title="Anamneses"></i></button>
                                <button type="submit" name="action" class="btn btn-danger outline" value="delete"><i class="fas fa-trash fa-fw" title="Remover paciente"></i></button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td>Nenhum registro encontrado</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>