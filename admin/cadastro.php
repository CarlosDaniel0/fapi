<?php 
session_start();

include('conexao.php');

if(empty($_POST['nome']) || empty($_POST['sobrenome'])|| empty($_POST['email']) || empty($_POST['senha'])) {
    $_SESSION['campos'] = true;
    header('Location: register.php');
    exit();
} 

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$sobrenome = mysqli_real_escape_string($conexao, trim($_POST['sobrenome']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(MD5($_POST['senha'])));

$sql = "SELECT COUNT(*) AS total FROM usuario WHERE usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: register');
    exit();
}

$sql = "INSERT INTO usuario (nome, sobrenome, usuario, senha, data_cadastro) VALUES ('$nome','$sobrenome','$usuario', '$senha', NOW())";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}

$conexao->close();
header('Location: register');
exit();


?>