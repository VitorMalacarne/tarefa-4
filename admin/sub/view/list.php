<?php
require_once '../../conexao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de usuários</title>
    </head>
    <body>
        <h2>Lista de usuários cadastrados</h2>
        <?php
        $stmt_count = $pdo->prepare("SELECT COUNT(*) AS total FROM tb_usuario");
        $stmt_count->execute();
        $stmt = $pdo->prepare("SELECT id,nome,email,senha,telefone FROM tb_usuario ORDER BY nome");
        $stmt->execute();
        $total = $stmt_count->fetchColumn();
        if ($total > 0): ?>
        <table border=1>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Telefone</th>
                    <th>Opções para o cadastro</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($resultado = $stmt->fetch(pdo::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $resultado['id'] ?></td>
                    <td><?php echo $resultado['nome'] ?></td>
                    <td><?php echo $resultado['email'] ?></td>
                    <td><?php echo $resultado['senha'] ?></td>
                    <td><?php echo $resultado['telefone'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $resultado['id'] ?>">Alterar</a>
                        <a href="delete.php?id=<?php echo $resultado['id'] ?>" onclick="return confirm('Tem certeza de que deseja excluir o registro?');">Excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
                </tbody>
                </table>
                <p>Total de usuários cadastrados: <?php echo $total ?></p>
                <?php else: ?>
                    <p>Não há usuário cadastrado</p>
                    <?php endif; ?>
    </body>
</html>