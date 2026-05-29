<?php
    include "config.php";
    session_start();

    if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
        // Redireciona de volta para a tela de login
        header("Location: register.php"); // Altere para o nome do seu arquivo de login
        exit();
    }

    $id_usuario = $_SESSION['userid'];
    $nome_usuario = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto - Tela Inicial</title>
</head>
<body>
    <h1>Bem-Vindo Cliente</h1>
    <h2>Nome: <?php echo htmlspecialchars($nome_usuario['nome']); ?></h2>
    <p>Seu ID de usuário é: <strong><?php echo $id_usuario; ?></strong></p>
    <a href="register.php">Clique aqui para a tela de login/registro</a>
</form>
</body>
</html>