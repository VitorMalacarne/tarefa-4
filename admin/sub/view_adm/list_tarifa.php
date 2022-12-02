<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de usuários</title>
        <link rel="stylesheet" type="text/css" href="../../../style.css">
    </head>
    <body>
        <h2>Lista de tarifas cadastradas</h2>

        <a href="ctrl_tarifa.php?action=novo">Cadastrar </a>

        <?php if(@$message) : ?>
            <div>
                <?= @$message ?>
            </div>
        <?php endif; ?>
        <nav id="mainnav">
    		<ul>
                <li><a href="index.html">HOME</a></li>
    		    <li><a href="ctrl_acom.php">Lista de acomodações</a></li>
    		    <li><a href="ctrl_reserva.php">Lista de reservas</a></li>
    		    <li><a href="ctrl_tarifa.php">Lista de tarifas</a></li>
    		    <li><a href="ctrl_usuario.php">Lista de usuários</a></li>
    		    <li><a href="form_acomodacao.php">Formulário de acomodações</a></li>
    		    <li><a href="form_tarifa.php">Formulário de tarifas</a></li>
    		</ul>
    	</nav>

        <table border=1>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Preço padrão</th>
                    <th>Adicional de Adulto</th>
                    <th>Adicional de criança</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tarifas as $index => $tarifa): ?>
                <tr>
                    <td><?= $tarifa->id ?></td>
                    <td><?= $tarifa->preco ?></td>
                    <td><?= $tarifa->preco_adulto ?></td>
                    <td><?= $tarifa->preco_crianca ?></td>
                    <td>
                        <a  href="ctrl_acom.php?action=deletar&id=<?= $reserva->id ?> " onclick="return confirm('Tem certeza de que deseja excluir o registro?');">Excluir</a>
                        <a  href="ctrl_acom.php?action=editar&id=<?= $acomodacao->id ?>">Alterar</a>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
                </table>
    </body>
</html>