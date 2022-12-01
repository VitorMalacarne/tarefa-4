<?php

require_once '../../conexao.php';
require_once '../model/acomodacao.dao.php';

// Instanciar objeto DAO
$acomodacaoDAO = new AcomodacaoDAO($pdo);

// Recebe a ação

$action = @$_REQUEST['action'];
$view = 'list_acomodacao.php';// View default

// Decidir qual ação será tomada
if($action == 'novo') {
    $view = 'form_acomodacao.php';
} else if($action == 'editar') {
    if(@$_REQUEST['id']) {
        $view = 'form_acomodacao.php';
        $acomodacao = $acomodacaoDAO->getById($_REQUEST['id']);
    } else {
        $message = "A acomocação não está cadastrada";
    }

} else if($action == 'deletar') {
    $id = @$_REQUEST['id'];

    if($id) {
        if($acomodacaoDAO->delete($id) > 0)
            $message = "Acomodação deletada com sucesso.";
        else
            $message = "Nenhuma acomodação foi deletada.";
    } else 
        $message = "Informe o código da acomodação para deletar.";
    

} else if($action == 'salvar') {
    try {
        $res;
        if( !@$_REQUEST['id']){ // Insert
            echo 'É o que2?';
            echo $_POST['qtd_camas_casal'];
            $res = $acomodacaoDAO->insert($_POST);
        }
        else // Update
            $res = $acomodacaoDAO->update($_POST);
            
        if(!$res) {
            echo 'Como não salvou?';
            $view = 'form_acomodacao.php';
            
            $message = "Erro ao salvar acomodação";
        } else{
            $message = "Salvo com sucesso";
            echo 'Salvou!';
        }

    } catch (\Throwable $th) {
        //throw $th;
        $view = 'form_acomodacao.php';
        $message = "Falha ao salvar acomodação. Detalhes do erro: " . $th->getMessage(); 
    }
} 

if($view == 'list_acomodacao.php') {
    // Buscar as pessoas no Banco de Dados
    $acomodacoes = $acomodacaoDAO->getAll();
}

require_once($view); // Abrindo uma viewS