<?php

class ReservaDAO {
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
        $sql = "SELECT * from tb_reserva";
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
        $sql = "SELECT * FROM tb_reserva WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();
        return $stmt->fetchObject();
    }

    function insert($post) {
        $sql = "INSERT INTO tb_reserva (
            id_usuario, id_acomodacao, data_entrada, data_saida, qtd_adultos, qtd_criancas, valor_reserva) 
            VALUES (:id_usuario,:id_acomodacao,:data_entrada,:data_saida,:qtd_adultos,:qtd_criancas,:valor_reserva)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_usuario', $post['id_usuario']);
        $stmt->bindValue(':id_acomodacao', $post['id_acomodacao']);
        $stmt->bindValue(':data_entrada', $post['data_entrada']);
        $stmt->bindValue(':data_saida', $post['data_saida']);
        $stmt->bindValue(':qtd_adultos', $post['qtd_adultos']);
        $stmt->bindValue(':qtd_criancas', $post['qtd_criancas']);
        $stmt->bindValue(':valor_reserva', $post['valor_reserva']);
        return $stmt->execute();
    }

    function update($post) {
        $sql = 'UPDATE tb_acomodacao SET 
            id_usuario = :id_usuario,
            id_acomodacao = :id_acomodacao,
            data_entrada = :data_entrada,
            data_saida = :data_saida,
            qtd_adultos = :qtd_adultos,
            qtd_criancas = :qtd_criancas,
            valor_reserva = :valor_reserva
            WHERE id = :id';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_usuario', $post['id_usuario']);
        $stmt->bindValue(':id_acomodacao', $post['id_acomodacao']);
        $stmt->bindValue(':data_entrada', $post['data_entrada']);
        $stmt->bindValue(':data_saida', $post['data_saida']);
        $stmt->bindValue(':qtd_adultos', $post['qtd_adultos']);
        $stmt->bindValue(':qtd_criancas', $post['qtd_criancas']);
        $stmt->bindValue(':valor_reserva', $post['valor_reserva']);
        $stmt->bindValue(':id', $post['id']);

        return $stmt->execute();
    }

    /**
     * Deletar uma pessoa do banco de dados.
     * 
     * Return: quantidade de linhas apagadas.
     */
    function delete($id) {
        $sql = "DELETE FROM tb_reserva WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();

        return $stmt->rowCount();
    }

}
