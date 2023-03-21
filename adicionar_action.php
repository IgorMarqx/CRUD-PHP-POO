<?php
session_start();
require './conexao.php';
require './dao/UsuarioDAOMySQL.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $email) {

    if($usuarioDao->findByEmail($email) === false){
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);

        $usuarioDao->create($novoUsuario);

        $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
        header('Location: index.php');
        exit;
    }else{
        $_SESSION['msg'] = "Já possui um email cadastrado com o mesmo nome!";
        header('Location: adicionar.php');
        exit;
    }
} else {
    $_SESSION['msg'] = "Campo nome ou e-mail vazios ou incorretos!";
    header('Location: adicionar.php');
    exit;
}
