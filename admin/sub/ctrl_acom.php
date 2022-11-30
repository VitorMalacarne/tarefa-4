<?php

require_once '../conexao.php';
require_once 'model/acomodacao.dao.php';

// Instanciar objeto DAO
$acomodacaoDAO = new AcomodacaoDAO($pdo);

// Recebe a ação

$action = @$_REQUEST['action'];
$view = 'view_adm/list_acomodacao.php';// View default

// Decidir qual ação será tomada
if($action == 'novo') {
    $view = 'view_adm/form_acomodacao.php';
} else if($action == 'editar') {
    if(@$_REQUEST['id']) {
        $view = 'view_adm/form_acomodacao.php';
        $usuario = $usuarioDAO->getById($_REQUEST['id']);
    } else {
        $message = "A acomocação não está cadastrada";
    }

} else if($action == 'deletar') {
    $id = @$_REQUEST['id'];

    if($id) {
        if($usuarioDAO->delete($id) > 0)
            $message = "Acomodação deletada com sucesso.";
        else
            $message = "Nenhuma pessoa foi deletada.";
    } else 
        $message = "Informe o código da pessoa para deletar.";
    

} else if($action == 'salvar') {
    try {
        $res;
        if( !@$_REQUEST['id']) // Insert
            $res = $usuarioDAO->insert($_POST);
        else // Update
            $res = $usuarioDAO->update($_POST);
            
        if(!$res) {
            $view = 'view_usuario/cadastro';
            
            $message = "Erro ao salvar pessoa";
        } else
            $message = "Salvo com sucesso";

    } catch (\Throwable $th) {
        //throw $th;
        $view = 'view_usuario/cadastro';
        $message = "Falha ao salvar pessoa. Detalhes do erro: " . $th->getMessage(); 
    }

    
} 

if($view == 'view_adm/list_acomodacao.php') {
    // Buscar as pessoas no Banco de Dados
    $usuarios = $usuarioDAO->getAll();

    //print_r($pessoas);
}

require_once($view); // Abrindo uma view