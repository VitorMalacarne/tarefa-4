<?php

    class TarifaDAO{
        private $pdo;

        function __construct($pdo){
            $this->pdo = $pdo;
        }

        function insert($post){
            $sql = "INSERT INTO tb_tarifa (
                preco, preco_adulto, preco_crianca)
                VALUES (:preco, :preco_adulto, :preco_crianca);";
                
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':preco', $post['preco']);
            $stmt->bindValue(':preco_adulto', $post['preco_adulto']);
            $stmt->bindValue(':preco_crianca', $post['preco_crianca']);
            return $stmt->execute();
        }

        function getAll(){
            $sql = "SELECT * FROM tb_tarifa";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        function delete($id){
            $sql = "DELETE FROM tb_tarifa WHERE id = ?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);

            $stmt->execute();

            return $stmt->rowCount();
        }

        function getById($id){
            $sql = "SELECT * FROM tb_tarifa WHERE id = ?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id);

            $stmt->execute();

            return $stmt->fetchObject();
        }

        function update($tarifa){
            $sql = "UPDATE tb_tarifa
            SET preco = :preco, preco_adulto = :preco_adulto, preco_crianca = :preco_crianca
            WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':preco', $tarifa['preco']);
            $stmt->bindValue(':preco_adulto', $tarifa['preco_adulto']);
            $stmt->bindValue(':preco_crianca', $tarifa['preco_crianca']);
            $stmt->bindValue(':id', $tarifa['id']);

            return $stmt->execute();
        }
    }
?>