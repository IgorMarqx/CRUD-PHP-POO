<?php
session_start();
require './conexao.php';
require './dao/UsuarioDAOMySQL.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $name && $email) {
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);

    $usuarioDao->update($usuario);

    header("Location: index.php");
    exit;

   
} else {
    $_SESSION['msgFalse'] = "Campo nome ou e-mail vazios ou incorretos!";
    header("Location: editar.php?id=$id");
    exit;
}

