<?php
    $host="localhost";
    $dbname = "mercado2";
    $user = "root";
    $pass = "senai";

    try{
        $pdo=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //echo "Conexão OK";
    }catch(PDOException $e){
        die("Erro: ".$e->getMessage());
    }
?>