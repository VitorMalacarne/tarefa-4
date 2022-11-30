<?php

require_once '../conexao.php';

@$qtd_camas_casal = $_POST['qtd_camas_casal'];
@$qtd_camas_solteiro = $_POST['qtd_camas_solteiro'];
@$tipo_acomodacao = $_POST['tipo_acomodacao'];
@$tipo_apartamento = $_POST['tipo_apartamento'];

//"INSERT INTO livros(titulo_livro,cod_isbn,autor_livro,nome_editora,qtd_paginas) VALUES(:titulo_livro,:cod_isbn,:autor_livro,:nome_editora,:qtd_paginas)";

//Gerenciar acomodações: visualizar, cadastrar, atualizar e deletar;


$sql = "INSERT INTO tb_acomodacao (
    qtd_camas_casal,
    qtd_camas_solteiro,
    tipo_acomodacao,
    tipo_apartamento 
    ) VALUES(
    :qtd_camas_casal,
    :qtd_camas_solteiro,
    :tipo_acomodacao,
    :tipo_apartamento
    )";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':qtd_camas_casal', $qtd_camas_casal);
$stmt->bindParam(':qtd_camas_solteiro', $qtd_camas_solteiro);
$stmt->bindParam(':tipo_acomodacao', $tipo_acomodacao);
$stmt->bindParam(':tipo_apartamento', $tipo_apartamento);
if($stmt->execute()){
    echo "Pessoa cadastrada com sucesso!";
}
else{
    echo "Ocorreu um erro na inclusão de registro";
    print_r($stmt->errorInfo());
}




/*
if($stmt->execute()){
    echo "Pessoa cadastrada com sucesso!";
} else {
    echo "Ocorreu um erro no cadastro";
    print_r($stmt->errorInfo());
}*/
/*
    $result = $pdo->query($sql);
    print_r($result);

    if($result) echo "Pessoa inserida!";
    else echo "Falha do salvar pessoa";
*/

?>