<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de usuários</title>
        <link rel="stylesheet" type="text/css" href="../../../style.css">
    </head>
    <body>
        <h2>Lista de acomodações cadastradas</h2>

        <a href="ctrl_reserva.php?action=novo">Cadastrar acomodação</a>

        <?php if(@$message) : ?>
            <div>
                <?= @$message ?>
            </div>
        <?php endif; ?>

        <table border=1>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Quantidade de camas de casal</th>
                    <th>Quantidade de camas de solteiro</th>
                    <th>Tipo de acomodação</th>
                    <th>Tipo de apartamento</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($acomodacoes as $index => $acomodacao): ?>
                <tr>
                    <td><?= $acomodacao->id ?></td>
                    <td><?= $acomodacao->qtd_camas_casal ?></td>
                    <td><?= $acomodacao->qtd_camas_solteiro ?></td>
                    <td><?= $acomodacao->tipo_acomodacao ?></td>
                    <td><?= $acomodacao->tipo_apartamento ?></td>
                    <td>
                        <a  href="ctrl_acom.php?action=editar&id=<?= $acomodacao->id ?>">Alterar</a>
                        <a  href="ctrl_acom.php?action=deletar&id=<?= $acomodacao->id ?> " onclick="return confirm('Tem certeza de que deseja excluir o registro?');">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
                </table>
    </body>
</html>