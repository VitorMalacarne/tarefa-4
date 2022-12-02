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

        if($tipo_acomodacao == 'todos'){
            $sql = "SELECT * FROM tb_acomodacao WHERE qtd_pessoas >= :qtd_pessoas";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":qtd_pessoas", $post['qtd_adultos'] + $post['qtd_criancas']);
            
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        $sql = "SELECT * FROM tb_acomodacao WHERE qtd_pessoas >= :qtd_pessoas AND tipo_acomodacao = :tipo_acomodacao";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":qtd_pessoas", $post['qtd_adultos'] + $post['qtd_criancas']);
        $stmt->bindValue(":tipo_acomodacao",$tipo_acomodacao);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    function insert($post) {

        $id_tarifa = 1;
        if($post['tipo_apartamento'] == 'triplo'){
            $id_tarifa = 2;            
        } else if($post['tipo_apartamento'] == 'familia'){
            $id_tarifa = 3;
        }
        if($post['tipo_acomodacao'] == 'luxo'){
            $id_tarifa += 3;
        }

        $sql = "INSERT INTO tb_acomodacao (
            id_tarifa, qtd_camas_casal, qtd_camas_solteiro, qtd_pessoas, tipo_acomodacao, tipo_apartamento) 
            VALUES (:id_tarifa,:qtd_camas_casal,:qtd_camas_solteiro,:qtd_pessoas,:tipo_acomodacao,:tipo_apartamento)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_tarifa', $id_tarifa);
        $stmt->bindValue(':qtd_camas_casal', $post['qtd_camas_casal']);
        $stmt->bindValue(':qtd_camas_solteiro', $post['qtd_camas_solteiro']);
        $stmt->bindValue(':qtd_pessoas', ($post['qtd_camas_casal'] * 2 + $post['qtd_camas_solteiro']));
        $stmt->bindValue(':tipo_acomodacao', $post['tipo_acomodacao']);
        $stmt->bindValue(':tipo_apartamento', $post['tipo_apartamento']);
        echo "Tá aqui";
        return $stmt->execute();
    }

    function update($post) {

        $id_tarifa = 1;
        if($post['tipo_apartamento'] == 'triplo'){
            $id_tarifa = 2;
        } else if($post['tipo_apartamento'] == 'familia'){
            $id_tarifa = 3;
        }
        if($post['tipo_acomodacao'] == 'luxo'){
            $id_tarifa += 3;
        }

        $sql = 'UPDATE tb_acomodacao 
            SET id_tarifa = :id_tarifa, qtd_camas_casal = :qtd_camas_casal, qtd_camas_solteiro = :qtd_camas_solteiro, qtd_pessoas = :qtd_pessoas, tipo_acomodacao = :tipo_acomodacao, tipo_apartamento = :tipo_apartamento
            WHERE id = :id';

        foreach($post as $index => $teste){
            echo $teste;
        }
        echo $id_tarifa;

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_tarifa', $id_tarifa);
        $stmt->bindValue(':qtd_camas_casal', $post['qtd_camas_casal']);
        $stmt->bindValue(':qtd_camas_solteiro', $post['qtd_camas_solteiro']);
        $stmt->bindValue(':qtd_pessoas', ($post['qtd_camas_casal'] * 2 + $post['qtd_camas_solteiro']));
        $stmt->bindValue(':tipo_acomodacao', $post['tipo_acomodacao']);
        $stmt->bindValue(':tipo_apartamento', $post['tipo_apartamento']);
        //$stmt->bindValue(':id', $post['id']);
        
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