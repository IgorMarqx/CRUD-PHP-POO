<?php
session_start();
require './conexao.php';
require './dao/UsuarioDAOMySQL.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuarioDao->delete($id);
}

header("Location: index.php");
exit;
