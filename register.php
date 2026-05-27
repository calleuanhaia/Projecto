<?php
    include "config.php";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];

        try{
            $cadastrar="INSERT INTO clientes (nome,email,senha,cpf) VALUES ('$nome','$email','$senha','$cpf')";
            $env=$pdo->prepare($cadastrar);
            $env->execute();

            header("Location: inicial.php");
            exit();
        } catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Registro (Clientes)</title>
</head>
<body>
    <h1>Tela de Registro (Clientes)</h1>
    <form method="POST" action="register.php">
        <label>Nome: </label>
        <input type="text" id="nome" name="nome" placeholder="Digite seu nome">
        <br><br>
        <label>Email: </label>
        <input type="email" id="email" name="email" placeholder="Digite seu email">
        <br><br>
        <label>Senha: </label>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
        <br><br>
        <label>CPF: </label>
        <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
        <br><br>
        <button type="submit" id="btn">Enviar</button>
    </form>
</body>
</html>