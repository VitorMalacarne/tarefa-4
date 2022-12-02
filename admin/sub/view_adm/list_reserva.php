<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de usuários</title>
        <link rel="stylesheet" type="text/css" href="../../../style.css">
    </head>
    <body>
        <h2>Lista de reservas cadastradas</h2>

        <a href="ctrl_reserva.php?action=novo">Cadastrar acomodação</a>

        <?php if(@$message) : ?>
            <div>
                <?= @$message ?>
            </div>
        <?php endif; ?>
        <nav id="mainnav">
    		<ul>
                <li><a href="index.html">HOME</a></li>
    		    <li><a href="ctrl_acom.php">Lista de acomodações</a></li>
    		    <li><a href="ctrl_reserva.php?action=listar" class="active">Lista de reservas</a></li>
    		    <li><a href="ctrl_tarifa.php">Lista de tarifas</a></li>
    		    <li><a href="ctrl_usuario.php">Lista de usuários</a></li>
    		    <li><a href="form_acomodacao.php">Formulário de acomodações</a></li>
    		</ul>
    	</nav>
        <div id="maindiv">
        <table border=1>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Usuário</th>
                    <th>Acomodações</th>
                    <th>Data de entrada</th>
                    <th>Data de saída</th>
                    <th>Quantidade de pessoas</th>
                    <th>Valor da reserva</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $index => $reserva): ?>
                <tr>
                    <td><?= $reserva->id ?></td>
                    <td><?= $reserva->user_id ?></td>
                    <td><?= $reserva->acom_id ?></td>
                    <td><?= $reserva->data_in ?></td>
                    <td><?= $reserva->data_out ?></td>
                    <td><?= $reserva->qtd_hospedes ?></td>
                    <td><?= $reserva->preco ?></td>
                    <td>
                        <a  href="ctrl_acom.php?action=deletar&id=<?= $reserva->id ?> " onclick="return confirm('Tem certeza de que deseja excluir o registro?');">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
                </table>
        </div>
    </body>
</html>