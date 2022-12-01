<?php

require_once '../../conexao.php';
require_once '../model/usuario.dao.php';

// Instanciar objeto DAO
$usuarioDAO = new UsuarioDAO($pdo);

// Recebe a ação

$action = @$_REQUEST['action'];
$view = 'list.php';// View default

// Decidir qual ação será tomada
if($action == 'novo') {
    $view = './../view_usuario/cadastro.html';
} else if($action == 'editar') {
    if(@$_REQUEST['id']) {
        $view = './../view_usario/cadastro.html';
        $usuario = $usuarioDAO->getById($_REQUEST['id']);
    } else {
        $message = "A pessoa não está cadastrada";
    }

} else if($action == 'deletar') {
    $id = @$_REQUEST['id'];

    if($id) {
        if($usuarioDAO->delete($id) > 0)
            $message = "Pessoa deletada com sucesso.";
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
            $view = '../view_usuario/cadastro.html';
            
            $message = "Erro ao salvar pessoa";
        } else
            $message = "Salvo com sucesso";

    } catch (\Throwable $th) {
        //throw $th;
        $view = '../view_usuario/cadastro.html';
        $message = "Falha ao salvar pessoa. Detalhes do erro: " . $th->getMessage(); 
    }

    
} 

if($view == 'list.php') {
    // Buscar as pessoas no Banco de Dados
    $usuarios = $usuarioDAO->getAll();

    //print_r($pessoas);
}

require_once($view); // Abrindo uma view