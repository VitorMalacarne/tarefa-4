<?php
//  PAREI AQUIIIIIIII
require_once '../../conexao.php';
require_once '../model/reserva.dao.php';
@session_start();

// Instanciar objeto DAO
$reservaDAO = new ReservaDAO($pdo);

// Recebe a ação

$action = @$_REQUEST['action'];
$view = 'list_reserva.php';// View default

// Decidir qual ação será tomada
if($action == 'novo') {
    if(empty($_SESSION)){
        $view = "../view_usuario/login.php";
        require_once($view);
    }else{
        $id_tarifa = $_POST['id_tarifa'];
        require_once('crtl_tarifa.php');
        $tarifa = $tarifaDAO->getTarifaById($id_tarifa);

        $id_usuario = $_SESSION['id'];
        $qtd_pessoas = intval($_REQUEST['qtd_adultos']) + intval($_REQUEST['qtd_criancas']);
        $valor_reserva = $tarifa->valor_reserva + $tarifa->precoA * (intval($_REQUEST['qtd_adultos']) - 1) +  $tarifa->precoC * intval($_REQUEST['qtd_criancas']);

        $data_entrada = @$_REQUEST['data_entrada'];
        $data_saida = @$_REQUEST['data_saida'];
        echo $data_entrada;
        echo $data_saida;

        $reservaDAO->insert(@$_POST, $id_usuario, $qtd_pessoas, $valor_reserva, $data_entrada, $data_saida);

        $view = "../view_usuario/";
        header('location: ' . $view);
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
}

if($view == 'list_reserva.php') {
    // Buscar as pessoas no Banco de Dados
    $reservas = $reservaDAO->getAll();
}

require_once($view); // Abrindo uma view
?>