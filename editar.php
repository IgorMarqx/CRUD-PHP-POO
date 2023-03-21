<?php
session_start();
require './conexao.php';
require './dao/UsuarioDAOMySQL.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$usuario = false;
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuario = $usuarioDao->findByID($id);
}

if ($usuario === false) {
    $_SESSION['msg'] = "Usuário não encontrado!";
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <h1>Editar Usuario</h1>

        <?php if (isset($_SESSION['msgFalse'])) : ?>
            <div class="alert alert-danger mt-2" role="alert">
                <?php echo $_SESSION['msgFalse'];
                unset($_SESSION['msgFalse']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="editar_action.php?id=<?= $id ?>">

            <label for="">
                <input type="hidden" name="id" value="<?= $usuario->getId($id); ?>">
                Nome<br>
                <input type="text" name="name" value="<?= $usuario->getNome(); ?>">
            </label>

            <br>
            <br>

            <label for="">
                E-mail<br>
                <input type="text" name="email" value="<?= $usuario->getEmail(); ?>">
            </label>

            <br>
            <br>

            <input type="submit" value="Alterar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>