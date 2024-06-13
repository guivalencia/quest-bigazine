<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
    $servidor = "localhost";
    $usuario = "root";
    $senha = "P@ssw0rdbanco";
    $banco = "quest";
    $conecta = mysqli_connect($servidor, $usuario, $senha, $banco);

    if(mysqli_connect_errno()){
        die("conexão falhou " . mysqli_conect_errno());
    }
?>