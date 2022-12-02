<?php

require_once '../../conexao.php';
require_once '../model/usuario.dao.php';

// Instanciar objeto DAO
$usuarioDAO = new UsuarioDAO($pdo);

// Recebe a ação

$action = @$_REQUEST['action'];
$view = 'list_usuario.php';// View default

// Decidir qual ação será tomada
if($action == 'novo') {
    
    if(@$_POST['senha'] == @$_POST['confirmar_senha']){
        $pessoaDAO->insert(@$_POST);
        $view = '../view_usuario/principal.php';

        $id = $pessoaDAO->getUsuarioByEmail(@$_POST['email'])->id;
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = @$_POST['nome'];

        header('location: '.$view);
    }else{
        $message = "As duas senhas devem ser iguais";
        $view = "../view_user/cadastro.html";
    require_once($view);
    }

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
    
} else if($action == "login") {
    $email = @$_POST['email'];

    $usuario = $pessoaDAO->getUsuarioByEmail($email);

    if(empty($user)){
        $message = "Digite um email válido";
        $view = "../view_usuario/login.php";
        require_once($view);
    }else{
        if(@$_POST['pass'] == $usuario->senha){
            //iniciar a sessão
            $_SESSION['id'] = $usuario->id;
            $_SESSION['nome'] = $usuario->nome;
            //$view = @$url;
            header('location: ../view_usuario/reserva.html');
        }else{
            $message = "Senha incorreta";
            $view = "../view_usuario/login.php";
            require_once($view);
            //exibir que o usuário digitou uma senha errada
        }
    }
    
}else if($action == "logout"){
    session_destroy();
    header('location: ../view_usuario/index.php');
}

if($view == 'list_usuario.php') {
    // Buscar as pessoas no Banco de Dados
    $usuarios = $usuarioDAO->getAll();

    //print_r($pessoas);
}

require_once($view); // Abrindo uma view

?>