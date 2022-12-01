<?php

require_once '../../conexao.php';
require_once '../model/reserva.dao.php';

// Instanciar objeto DAO
$reservaDAO = new ReservaDAO($pdo);

// Recebe a ação

$action = @$_REQUEST['action'];
$view = 'list_reserva.php';// View default

// Decidir qual ação será tomada
if($action == 'novo') {
    $view = '../view_usuario/reserva.html';
} else if($action == 'editar') {
    if(@$_REQUEST['id']) {
        $view = '../view_usuario/reserva.html';
        $reserva = $reservaDAO->getById($_REQUEST['id']);
    } else {
        $message = "A reserva não está cadastrada";
    }

} else if($action == 'deletar') {
    $id = @$_REQUEST['id'];

    if($id) {
        if($reservaDAO->delete($id) > 0)
            $message = "Reserva deletada com sucesso.";
        else
            $message = "Nenhuma reserva foi deletada.";
    } else 
        $message = "Informe o código da reserva para deletar.";
    
} else if($action == 'salvar') {
    try {
        $res;
        if( !@$_REQUEST['id']){ // Insert
            $res = $reservaDAO->insert($_POST);
        }
        else // Update
            $res = $reservaDAO->update($_POST);
            
        if(!$res) {
            $view = '../view_usuario/reserva.html';
            $message = "Erro ao salvar reserva";
        } else{
            $message = "Salvo com sucesso";
        }

    } catch (\Throwable $th) {
        //throw $th;
        $view = '../view_usuario/reserva.html';
        $message = "Falha ao salvar reserva. Detalhes do erro: " . $th->getMessage(); 
    }
} 

if($view == 'list_reserva.php') {
    // Buscar as pessoas no Banco de Dados
    $reservas = $reservaDAO->getAll();
}

require_once($view); // Abrindo uma view