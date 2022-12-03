<?php

require_once '../../conexao.php';
require_once '../model/acomodacao.dao.php';
echo "Outro teste";
// Instanciar objeto DAO
$acomodacaoDAO = new AcomodacaoDAO($pdo);

// Recebe a ação
$action = @$_REQUEST['action'];
$view = 'list_acomodacao.php';// View default
echo $action;
// Decidir qual ação será tomada
if($action == 'novo') {
    $view = 'list_acomodacao.php';
    try {
        $res;
        if(!@$_REQUEST['id']){ // Insert
            $res = $acomodacaoDAO->insert(@$_POST);
            echo "ASFWEADGDGFFAD";
        }
        else // Update
            $res = $acomodacaoDAO->update(@$_POST);
            
        if(!$res) {
            $view = 'form_acomodacao.php';
            echo "Erro ao salvar acomodação";
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
    //header('location:'.$view);

} else if($action == 'editar') {
    if(@$_REQUEST['id']) {
        $view = 'form_acomodacao.php';
        $acomodacao = $acomodacaoDAO->getById($_REQUEST['id']);
        require_once($view);
    } else {
        $message = "A acomocação não está cadastrada";
    }

} else if($action == 'deletar') {
    
    $view = '../view_adm/list_acom.php';
    $id = @$_REQUEST['id'];
    if($id) {
        if($acomodacaoDAO->delete($id) > 0)
            $message = "Acomodação deletada com sucesso.";
        else
            $message = "Nenhuma acomodação foi deletada.";
    } else 
        $message = "Informe o código da acomodação para deletar.";

    //$ra = $acomodacaoDAO->delete($id);
    header('location:'.$view);

} else if($action == "procurar"){
    echo "DEntro de procurar e antes de";
    require_once("ctrl_reserva.php");
    $acomodacoes = $acomodacaoDAO->getByAllInfo(@$_POST);
    echo "Dentro de procurar de ctrl_acom";
    $dataEntrada = $_POST['data_entrada'];
    $dataSaida = $_POST['data_saida'];

    foreach($acomodacoes as $index=> $acomodacao){
        $reservas = $reservaDAO->getAllDatas($acomodacao->id);
        foreach($reservas as $index2=> $reserva){
            echo $reserva->data_entrada;
            if($dataEntrada >= $reserva->data_entrada && $dataEntrada < $reserva->data_saida){
                unset($acomodacoes[$index]);
            }
            if($dataSaida > $reserva->data_entrada && $dataSaida <= $reserva->data_saida){
                unset($acomodacoes[$index]);
            }
        }
    }
    $view = "../view_usuario/reserva.php";
    require_once($view);
}

if($view == 'list_acomodacao.php') {
    echo "dentro";
    // Buscar as pessoas no Banco de Dados
    $acomodacoes = $acomodacaoDAO->getAll();
    require_once($view);
}

//require_once($view); // Abrindo uma viewS

?>