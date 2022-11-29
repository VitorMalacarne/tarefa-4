<?php

    // Inicializar a sessão
    session_start();


    if( @$_SESSION['classiauto.user'] )
        echo "O usuário " . $_SESSION['classiauto.user'] . " está logado";
    else
        echo "Nenhum usuário está logado";

    // COPIADO E COLADO DA PASTA CLASSIAUTO-V2

?>