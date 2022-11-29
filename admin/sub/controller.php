<?php

require_once '../conexao.php';

$sql = 'INSERT INTO tb_reserva (
    id_usuario
    id_acomodacao
    data_entrada
    data_saida
    qtd_hospedes 	
    valor_reserva 
    ) VALUE (
    "1",
    "1",
    "'. $_POST['daen']. '",
    "'. $_POST['dasa']. '",
    "'. $_POST['quanad']. '",
    "'. $_POST['quancr']. '",
    )';

    /*$result = $_conn->query($sql);
    print_r($result);

    if($result) echo "Pessoa inserida!";
    else echo "Falha do salvar pessoa";
*/

?>