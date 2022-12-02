<?php

require_once '../../conexao.php';
require_once '../model/usuario.dao.php';
@session_start();

// Instanciar objeto DAO
$usuarioDAO = new UsuarioDAO($pdo);

// Recebe a ação

$action = @$_REQUEST['action'];
$view = 'list_usuario.php';// View default
echo "TESTE";
// Decidir qual ação será tomada
if(@$action == 'novo') {
    echo "TESTE";
    
    if(@$_POST['senha'] == @$_POST['confirmar_senha']){
        
        if(empty($usuarioDAO->getUsuarioByEmail(@$_POST['email']))){
            
            $usuarioDAO->insert(@$_POST);
            $view = '../view_usuario/principal.php';
            
            $id = $usuarioDAO->getUsuarioByEmail(@$_POST['email'])->id;
            echo $id;
            $_SESSION['id'] = $id;
            $_SESSION['nome'] = @$_POST['nome'];
            
            header('location: '.$view);
            
        }
        $message = "O email ".$_POST['email']." já está sendo utilizado, escolha outro";
        require_once('../view_usuario/cadastro.php');
    }else{
        $message = "As duas senhas devem ser iguais";
        $view = "../view_usuario/cadastro.php";
    require_once($view);
    }

} else if(@$action == 'deletar') {
    $id = @$_REQUEST['id'];

    if($id) {
        if($usuarioDAO->delete($id) > 0)
            $message = "Pessoa deletada com sucesso.";
        else
            $message = "Nenhuma pessoa foi deletada.";
    } else 
        $message = "Informe o código da pessoa para deletar.";
    
} else if(@$action == "login") {
    $email = @$_POST['email'];

    $usuario = $usuarioDAO->getUsuarioByEmail($email);

    if(empty($usuario)){
        $message = "Digite um email válido";
        $view = "../view_usuario/login.php";
        require_once($view);
    }else{
        if(@$_POST['senha'] == $usuario->senha){
            //iniciar a sessão
            $_SESSION['id'] = $usuario->id;
            $_SESSION['nome'] = $usuario->nome;
            //$view = @$url;
            header('location: ../view_usuario/principal.php');
        }else{
            $message = "Senha incorreta";
            $view = "../view_usuario/login.php";
            require_once($view);
            //exibir que o usuário digitou uma senha errada
        }
    }
    
}else if(@$action == "logout"){
    session_destroy();
    echo "efefefefe";
    header('location: ../view_usuario/principal.php');
}

if($view == 'list_usuario.php') {
    // Buscar as pessoas no Banco de Dados
    $usuarios = $usuarioDAO->getAll();

    //print_r($pessoas);
}

require_once($view); // Abrindo uma view

?>