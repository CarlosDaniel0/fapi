<?php
    ini_set('default_charset', 'UTF-8');
    
    define('HOST', 'localhost');
    define('USUARIO', 'daniel');
    define('SENHA', 'root');
    define('DB', 'fapi');
    
    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die("Não foi possível conectar");

    $conexao->query("SET NAMES utf8");
?>