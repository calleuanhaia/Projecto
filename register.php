<?php
    include "config.php";
    session_start();

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['btn_cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];

        try{
            $cadastrar="INSERT INTO clientes (nome,email,senha,cpf) VALUES ('$nome','$email','$senha','$cpf')";
            $env=$pdo->prepare($cadastrar);
            $env->execute();

            $_SESSION['userid'] = $pdo->lastInsertId();
            $_SESSION['username'] = $nome;

            header("Location: inicial.php");
            exit();
        } catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['btn_login'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try{
            $login = "SELECT id, nome FROM clientes WHERE email = $email AND senha = $senha";
            $env=$pdo->prepare($login);
            $env->execute();

            $usuario = $env->fetch(PDO::FETCH_ASSOC);

            if($usuario){
                $_SESSION['userid'] = $usuario['id'];
                $_SESSION['username'] = $usuario['nome'];

                header("Location: inicial.php");
                exit();
            } else {
                echo "<script>alert('Email ou senha incorretos!');</script>";
            }
        }catch(PDOException $e) {
            echo "Erro ao logar: " . $e->getMessage();
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
    <div id="nome_register">
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
            <button name="btn-login" type="submit" id="btn">Enviar</button>
            <br>
        </form>
        <button id="btn-login">Já possui uma conta? Por favor, clique aqui!</button>
    </div>
    <div id="nome_login" hidden="true">
        <form>
            <label>Nome: </label>
            <input type="text" id="nome_login" name="nome" placeholder="Digite seu nome">
            <br><br>
            <label>Email: </label>
            <input type="email" id="email_login" name="email" placeholder="Digite seu email">
            <br><br>
            <label>Senha:</label>
            <input type="password" id="senha_login" name="senha" placeholder="Digite sua senha"><br><br>
            <button name="btn-cadastrar" type="submit" id="btn_2">Enviar</button>
            <br>
        </form>
        <button id="btn-register">Não possui uma conta? Por favor, clique aqui</button>
    </div>
    <script src="functions.js"></script>
</body>
</html>