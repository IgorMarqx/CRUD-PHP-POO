<?php
    session_start();
?>

<h1>Adicionar Usuario</h1>

<?php if(isset($_SESSION['msg'])):
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
endif;?>

<form method="POST" action="adicionar_action.php">
    <label for="">
        Nome<br>
        <input type="text" name="name">
    </label>

    <br>
    <br>

    <label for="">
        E-mail<br>
        <input type="text" name="email">
    </label>

    <br>
    <br>

    <input type="submit" value="Adicionar">
</form>