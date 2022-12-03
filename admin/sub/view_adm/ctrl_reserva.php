<?php

require_once '../../conexao.php';
require_once '../model/reserva.dao.php';
@session_start();

// Instanciar objeto DAO
$reservaDAO = new ReservaDAO($pdo);

// Recebe a ação

$action = @$_REQUEST['action'];
//$view = 'list_reserva.php';// View default

// Decidir qual ação será tomada
if($action == 'reservar') {
    
    $data_entrada = @$_REQUEST['data_entrada'];
    $data_saida = @$_REQUEST['data_saida'];
    if($data_entrada >= $data_saida){
        $message = "A data de entrada deve ser anterior à data de saída";
        $view = "../view_usuario/reserva.php";
        header('location: ' . $view);
    }
    $id_tarifa = @$_REQUEST['id_tarifa'];
    require_once('ctrl_tarifa.php');
    $tarifa = $tarifaDAO->getById($id_tarifa);
    echo "Depois de tarifadao";
    $reservas_mesmo_id = $reservaDAO->getAllDatas(@$_REQUEST['id_acomodacao']);
    foreach($reservas_mesmo_id as $index => $reserva_mesmo_id){
        if($reserva_mesmo_id['data_entrada'] >= $data_entrada && $reserva_mesmo_id['data_entrada'] < $data_saida){
            $message = "Conflito de datas!";
            $view = "../view_usuario/reserva.php";
            header('location: ' . $view);
        }
        if($reserva_mesmo_id['data_saida'] >= $data_entrada && $reserva_mesmo_id['data_saida'] < $data_saida){
            $message = "Conflito de datas!";
            $view = "../view_usuario/reserva.php";
            header('location: ' . $view);
        }
    }
    $id_usuario = $_SESSION['id'];
    $qtd_pessoas = intval($_REQUEST['qtd_adultos']) + intval($_REQUEST['qtd_criancas']);
    $valor_reserva = ($tarifa->preco + $tarifa->preco_adulto * (intval($_REQUEST['qtd_adultos']) - 1) + $tarifa->preco_crianca * intval($_REQUEST['qtd_criancas']));
    echo $data_entrada;
    echo $data_saida;
    $reservaDAO->insert(@$_POST, $id_usuario, $qtd_pessoas, $valor_reserva, $data_entrada, $data_saida);
    $view = "../view_usuario/principal.php";
    header('location: ' . $view);
    
} else if($action == 'deletar') {
    $id = @$_REQUEST['id'];

    if($id) {
        if($reservaDAO->delete($id) > 0)
            $message = "Reserva deletada com sucesso.";
        else
            $message = "Nenhuma reserva foi deletada.";
    } else 
        $message = "Informe o código da reserva para deletar.";   
} else

//if($view == 'list_reserva.php') {
    // Buscar as pessoas no Banco de Dados
$reservas = $reservaDAO->getAll();
//}

if($action == 'listar')
    require_once('list_reserva.php');

//require_once($view); // Abrindo uma view
?>