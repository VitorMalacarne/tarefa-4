<?php

require_once '../conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];

//"INSERT INTO livros(titulo_livro,cod_isbn,autor_livro,nome_editora,qtd_paginas) VALUES(:titulo_livro,:cod_isbn,:autor_livro,:nome_editora,:qtd_paginas)";



$sql = "INSERT INTO tb_usuario (
    nome,
    email,
    senha,
    telefone
    ) VALUES(
    :nome,
    :email,
    :senha,
    :telefone
    )";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);
$stmt->bindParam(':telefone', $telefone);
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