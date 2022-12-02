<?php
class UsuarioDAO {
    private $pdo;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    function getAll() {
        $sql = "SELECT * from tb_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    function getUsuarioByEmail($email) {
        $sql = "SELECT * FROM tb_usuario WHERE email = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $email);

        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function insert($post) {
        $sql = "INSERT INTO tb_usuario (
            nome, email, senha, telefone)
            VALUES (:nome,:email,:senha,:telefone)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $post['nome']);
        $stmt->bindParam(':email', $post['email']);
        $stmt->bindParam(':telefone', $post['senha']);
        $stmt->bindParam(':senha', $post['telefone']);
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

    function delete($id) {
        $sql = "DELETE FROM tb_usuario WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();

        return $stmt->rowCount();
    }
}
?>