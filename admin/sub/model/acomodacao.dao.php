<?php

class AcomodacaoDAO {
    private $pdo;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    function getAll() {
        $sql = "SELECT * from tb_acomodacao";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    function getById($id) {
        $sql = "SELECT * FROM tb_acomodacao WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();
        return $stmt->fetchObject();
    }

    /*function insert($pessoa) {
        $sql = 'INSERT INTO tb_pessoa (
                nome, email, telefone, nascimento, login, senha)
            VALUES (:nome, :email, :telefone, :nascimento, :login, :senha)';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $pessoa['nome']);
        $stmt->bindValue(':email', $pessoa['email']);
        $stmt->bindValue(':telefone', $pessoa['telefone']);
        $stmt->bindValue(':nascimento', $pessoa['nascimento']);
        $stmt->bindValue(':login', $pessoa['login']);
        $stmt->bindValue(':senha', $pessoa['senha']);

        return $stmt->execute();
    }*/

    /*function update($pessoa) {
        $sql = 'UPDATE tb_pessoa SET 
            nome = :nome,
            email = :email,
            telefone = :telefone,
            nascimento = :nascimento,
            login = :login
            WHERE id = :id';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $pessoa['nome']);
        $stmt->bindValue(':email', $pessoa['email']);
        $stmt->bindValue(':telefone', $pessoa['telefone']);
        $stmt->bindValue(':nascimento', $pessoa['nascimento']);
        $stmt->bindValue(':login', $pessoa['login']);
        $stmt->bindValue(':id', $pessoa['id']);

        return $stmt->execute();
    }*/

    /**
     * Deletar uma pessoa do banco de dados.
     * 
     * Return: quantidade de linhas apagadas.
     */
    /*function delete($id) {
        $sql = "DELETE FROM tb_pessoa WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();

        return $stmt->rowCount();
    }*/

}
