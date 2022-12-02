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

    function getByAllInfo($post){
        echo "Dentro de acomodacao.dao";

        $tipo_acomodacao = $post['tipo_acomodacao'];

        $sql = "SELECT * FROM tb_acomodacao WHERE qtd_pessoas >= :qtd_pessoas AND tipo_acomodacao = :tipo_acomodacao";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":qtd_pessoas", $post['qtd_adultos'] + $post['qtd_criancas']);
        $stmt->bindValue(":tipo_acomodacao",$tipo_acomodacao);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    function insert($post) {
        $tipo_acomodacao = "";
        $tipo_apartamento = "";
        if($post['id_tarifa']>3){
            $tipo_acomodacao = "Luxo";
        }else{
            $tipo_acomodacao = "Standard";
        }
        if($post['id_tarifa'] % 3 == 0){
            $tipo_apartamento = "Familia";
        }else if($acom['id_tarifa'] % 2 == 0){
            $tipo_apartamento = "Triplo";
        }else{
            $tipo_apartamento = "Duplo";
        }

        $sql = "INSERT INTO tb_acomodacao (
            qtd_camas_casal, qtd_camas_solteiro, qtd_pessoas, tipo_acomodacao, tipo_apartamento, id_tarifa) 
            VALUES (:qtd_camas_casal,:qtd_camas_solteiro,:qtd_pessoas,:tipo_acomodacao,:tipo_apartamento,:id_tarifa)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':qtd_camas_casal', $post['qtd_camas_casal']);
        $stmt->bindValue(':qtd_camas_solteiro', $post['qtd_camas_solteiro']);
        $stmt->bindValue(':qtd_pessoas', ($post['qtd_camas_casal'] * 2 + $post['qtd_camas_solteiro']));
        $stmt->bindValue(':tipo_acomodacao', $tipo_acomodacao);
        $stmt->bindValue(':tipo_apartamento', $tipo_apartamento);
        $stmt->bindValue(':tipo_apartamento', $post['id_tarifa']);
        return $stmt->execute();
    }

    function update($post) {

        $tipo_acomodacao = "";
        $tipo_apartamento = "";
        if($post['id_tarifa']>3){
            $tipo_acomodacao = "Luxo";
        }else{
            $tipo_acomodacao = "Standard";
        }
        if($post['id_tarifa'] % 3 == 0){
            $tipo_apartamento = "Familia";
        }else if($acom['id_tarifa'] % 2 == 0){
            $tipo_apartamento = "Triplo";
        }else{
            $tipo_apartamento = "Duplo";
        }

        $sql = "UPDATE tb_acomodacao SET 
            qtd_camas_casal = :qtd_camas_casal,
            qtd_camas_solteiro = :qtd_camas_solteiro,
            tipo_acomodacao = :tipo_acomodacao,
            tipo_apartamento = :tipo_apartamento
            WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':qtd_camas_casal', $post['qtd_camas_casal']);
        $stmt->bindValue(':qtd_camas_solteiro', $post['qtd_camas_solteiro']);
        $stmt->bindValue(':qtd_pessoas', ($post['qtd_camas_casal'] * 2 + $post['qtd_camas_solteiro']));
        $stmt->bindValue(':tipo_acomodacao', $tipo_acomodacao);
        $stmt->bindValue(':tipo_apartamento', $tipo_apartamento);
        $stmt->bindValue(':tipo_apartamento', $post['id_tarifa']);
        
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
?>