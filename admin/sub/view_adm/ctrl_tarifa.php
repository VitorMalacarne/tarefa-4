<?php
    require_once('../../conexao.php');
    require_once('../model/tarifa.dao.php');

    // Instanciar objeto DAO
    $tarifaDAO = new TarifaDAO($pdo);

    // Recebe a ação
    $action = @$_REQUEST['action'];
    $view = 'list_tarifa.php';

    if($action == "novo"){
        
        $view = 'list_tarifa.php';
        try {
            $res;
            if(!@$_REQUEST['id']){
                $res = $tarifaDAO->insert(@$_POST);
            }else{
                $res = $tarifaDAO->update(@$_POST);
            }
            if(!$res) {
                $view = 'form_tarifa.php';
                $message = "Erro ao salvar tarifa";
            } else{
                $message = "Salvo com sucesso";
                echo 'Salvou!';
            }
        
        } catch (\Throwable $th) {
            //throw $th;
            $view = 'form_acomodacao.php';
            $message = "Falha ao salvar acomodação. Detalhes do erro: " . $th->getMessage(); 
        }    
        header('location:'.$view);
    
    }else if($action == "deletar"){
        $view = 'list_tarifa.php';
        $id = @$_REQUEST['id'];
        if($id) {
            if($tarifaDAO->delete($id) > 0)
                $message = "Tarifa deletada com sucesso.";
            else
                $message = "Nenhuma tarida foi deletada.";
        } else 
            $message = "Informe o código da tarifa para deletar.";
    
        header('location:'.$view);
    }else if($action == "editar"){
        if(@$_REQUEST['id']){
            $view = "form_tarifa.php";
            $tarifa = $tarifaDAO->getById($_REQUEST['id']);
            require_once($view);
        }
    }

    if($view == 'list_tarifa.php'){
        $tarifas = $tarifaDAO->getAll();
    }
    require_once($view);
?>