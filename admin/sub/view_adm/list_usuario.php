<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de usuários</title>
        <link rel="stylesheet" type="text/css" href="../../../style.css">
    </head>
    <body>
        <h2>Lista de usuários cadastrados</h2>

        <a href="ctrl_usuario.php?action=novo">Cadastrar usuário</a>

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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Telefone</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $index => $usuario): ?>
                <tr>
                    <td><?= $usuario->id ?></td>
                    <td><?= $usuario->nome ?></td>
                    <td><?= $usuario->email ?></td>
                    <td><?= $usuario->senha ?></td>
                    <td><?= $usuario->telefone ?></td>
                    <td>
                        <a  href="ctrl_usuario.php?action=editar&id=<?= $usuario->id ?>">Alterar</a>
                        <a  href="ctrl_usuario.php?action=deletar&id=<?= $usuario->id ?> " onclick="return confirm('Tem certeza de que deseja excluir o registro?');">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
                </table>
    </body>
</html>