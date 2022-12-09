<?php

class ReservaDAO {
    private $pdo;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    function getAll() {
        $sql = "SELECT * from tb_reserva";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    function getById($id) {
        $sql = "SELECT * FROM tb_reserva WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();
        return $stmt->fetchObject();
    }

    function insert($post,$id_usuario,$qtd_pessoas,$valor_reserva,$data_entrada,$data_saida) {

        $sql = "INSERT INTO tb_reserva (
            id_usuario, id_acomodacao, data_entrada, data_saida, qtd_pessoas, valor_reserva) 
            VALUES (:id_usuario,:id_acomodacao,:data_entrada,:data_saida,:qtd_pessoas,:valor_reserva)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->bindValue(':id_acomodacao', $post['id_acomodacao']);
        $stmt->bindValue(':data_entrada', $data_entrada);
        $stmt->bindValue(':data_saida', $data_saida);
        $stmt->bindValue(':qtd_pessoas', $qtd_pessoas);
        $stmt->bindValue(':valor_reserva', $valor_reserva);
        return $stmt->execute();
    }

    function getAllDatas($id_acomodacao){
        $sql = "SELECT data_entrada, data_saida FROM tb_reserva
            WHERE id_acomodacao = :id_acomodacao";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id_acomodacao", $id_acomodacao);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    function delete($id) {
        $sql = "DELETE FROM tb_reserva WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();

        return $stmt->rowCount();
    }
}
?>