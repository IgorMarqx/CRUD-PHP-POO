<?php
session_start();

require './conexao.php';
require './dao/UsuarioDAOMySQL.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->readAll();

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
    <div class="container mt-2 ">
        <a class="btn btn-success" href="adicionar.php">Adicionar Usuário</a>


        <?php if (isset($_SESSION['msg'])) : ?>
            <div class="alert alert-success mt-2" role="alert">
                <?php echo $_SESSION['msg'];
                unset($_SESSION['msg']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['msgFalse'])) : ?>
            <div class="alert alert-danger mt-2" role="alert">
                <?php echo $_SESSION['msgFalse'];
                unset($_SESSION['msgFalse']); ?>
            </div>
        <?php endif; ?>

        <table class="table mt-2 table-hover" width="100%">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>Data de inserção/Alteração</th>
                <th>EDITAR</th>
                <th>EXCLUIR</th>
            </tr>

            <?php foreach ($lista as $dados) : ?>
                <tr>
                    <td><?= $dados->getId(); ?></td>
                    <td><?= $dados->getNome(); ?></td>
                    <td><?= $dados->getEmail(); ?></td>
                    <td><?= date("d/m/Y H:i", strtotime($dados->getData())) ?></td>
                    <td><a href="editar.php?id=<?= $dados->getId() ?>">Editar</a></td>
                    <td><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tem certeza que deseja excluir?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="color: red;">Atenção você estar excluindo esse usuário para sempre! Tem certeza disso?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="excluir.php?id=<?= $dados->getId() ?>">Excluir</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>