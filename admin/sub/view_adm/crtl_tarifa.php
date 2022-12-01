<?php
    require_once('../../conexao.php');
    require_once('../model/tarifa.dao.php');

    $tarifaDAO = new TarifaDAO($pdo);


    $action = @$_REQUEST['action'];
    $view = '../view_adm/list_tarifas.php';

    if($action == "novo"){
        if(!$_REQUEST['id']){
            $tarifaDAO->createTarifa(@$_POST);
        }else{
            $tarifaDAO->update(@$_POST);
        }
        
        $view = '../view_adm/list_tarifas.php';

        header('location:'.$view);
    }else if($action == "deletar"){
        $id = @$_REQUEST['id'];

        $ra = $tarifaDAO->delete($id);

        // print_r($id);
        // print_r($ra);

        // if($ra > 0){
        //     //ações após excluir um usuário;
        //     print_r("removeu");
        // }else{
        //     print_r("n removeu");
        //     //tratar quando ngm for excluido
        // }

        $view = '../view_adm/list_tarifas.php';

        header('location:'.$view);
    }else if($action == "editar"){
        if(@$_REQUEST['id']){
            $view = "../view_adm/form_tarifas.php";
            $tarifa = $tarifaDAO->getTarifaById($_REQUEST['id']);
            require_once($view);
        }
    }

    if($view == '../view_adm/list_tarifas.php'){
        $tarifas = $tarifaDAO->getAll();
    }

    //require_once($view);
?>