<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de usuários</title>
        <link rel="stylesheet" type="text/css" href="../../../style.css">
    </head>
    <body>
        <header>
            <h1>POUSADA DAS CAPIVARAS - Administração</h1>
	        <br>
            <h2>Lista de tarifas cadastradas</h2>
        </header>

        
        <?php if(@$message) : ?>
            <div>
                <?= @$message ?>
            </div>
            <?php endif; ?>
            <div id="maindiv">
                <nav id="mainnav">
                    <ul>
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="ctrl_acom.php">Lista de acomodações</a></li>
                        <li><a href="ctrl_reserva.php?action=listar">Lista de reservas</a></li>
                        <li><a href="ctrl_tarifa.php" class="active">Lista de tarifas</a></li>
                        <li><a href="ctrl_usuario.php">Lista de usuários</a></li>
                        <li><a href="form_acomodacao.php">Formulário de acomodações</a></li>
                    </ul>
                </nav>
                <div class="phantomdiv"></div>
                <main>
                    <a href="ctrl_tarifa.php?action=novo">Cadastrar </a>
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
                        <a  href="ctrl_tarifa.php?action=editar&id=<?= $tarifa->id ?>">Alterar</a>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
                </table>
            </main>
        </div>
    </body>
</html>