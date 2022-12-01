<?php

class AcomodacaoDAO {
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
        $sql = "SELECT * from tb_acomodacao";
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
        $sql = "SELECT * FROM tb_acomodacao WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();
        return $stmt->fetchObject();
    }

    function insert($post) {
        $sql = "INSERT INTO tb_acomodacao (
            qtd_camas_casal, qtd_camas_solteiro, tipo_acomodacao, tipo_apartamento) 
            VALUES (:qtd_camas_casal,:qtd_camas_solteiro,:tipo_acomodacao,:tipo_apartamento)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':qtd_camas_casal', $post['qtd_camas_casal']);
        $stmt->bindValue(':qtd_camas_solteiro', $post['qtd_camas_solteiro']);
        $stmt->bindValue(':tipo_acomodacao', $post['tipo_acomodacao']);
        $stmt->bindValue(':tipo_apartamento', $post['tipo_apartamento']);
        return $stmt->execute();
    }

    function update($post) {
        $sql = 'UPDATE tb_acomodacao SET 
            qtd_camas_casal = :qtd_camas_casal,
            qtd_camas_solteiro = :qtd_camas_solteiro,
            tipo_acomodacao = :tipo_acomodacao,
            tipo_apartamento = :tipo_apartamento
            WHERE id = :id';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':qtd_camas_casal', $post['qtd_camas_casal']);
        $stmt->bindValue(':qtd_camas_solteiro', $post['qtd_camas_solteiro']);
        $stmt->bindValue(':tipo_acomodacao', $post['tipo_acomodacao']);
        $stmt->bindValue(':tipo_apartamento', $post['tipo_apartamento']);
        $stmt->bindValue(':id', $post['id']);

        return $stmt->execute();
    }

    /**
     * Deletar uma pessoa do banco de dados.
     * 
     * Return: quantidade de linhas apagadas.
     */
    function delete($id) {
        $sql = "DELETE FROM tb_acomodacao WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();

        return $stmt->rowCount();
    }

}
