<?php
    //Exemplo de criação de SESSION

    // Obtendo o nome de um usuário
    $user = @$_REQUEST['usuario'];

    if(!@$user) {
        echo "Usuário não existe";
        exit;
    }

    // Inicializa a sessão
    session_start();

    // Armazenando dados na sessão do cliente (navegador)
    $_SESSION['classiauto.user'] = $user;

    echo "Sessão criada para o usuário " . $user;

    // COPIADO E COLADO DA PASTA CLASSIAUTO-V2

?>