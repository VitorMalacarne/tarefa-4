<?php

class UsuarioDAO {
    private $pdo;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Método para obter todas as pessoas cadastradas
     * no banco de dados.
     * 
     * Return: Lista de pessoas
     */
    function getAll() {
        $sql = "SELECT * from tb_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Buscar uma pessoa pelo ID
     * 
     * Return: Objeto pessoa.
     */
    function getById($id) {
        $sql = "SELECT * FROM tb_usuario WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function insert($post) {
        $sql = "INSERT INTO tb_usuario (
            nome, email, senha, telefone)
            VALUES (:nome,:email,:senha,:telefone)";
        
        $stmt = $this->$pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':senha', $senha);
        return $stmt->execute();
    }

    function update($post) {
        $sql = 'UPDATE tb_usuario SET 
            nome = :nome,
            email = :email,
            telefone = :telefone,
            senha = :senha
            WHERE id = :id';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $post['nome']);
        $stmt->bindValue(':email', $post['email']);
        $stmt->bindValue(':telefone', $post['telefone']);
        $stmt->bindValue(':senha', $post['senha']);
        $stmt->bindValue(':id', $post['id']);

        return $stmt->execute();
    }

    /**
     * Deletar uma pessoa do banco de dados.
     * 
     * Return: quantidade de linhas apagadas.
     */
    function delete($id) {
        $sql = "DELETE FROM tb_usuario WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();

        return $stmt->rowCount();
    }

}