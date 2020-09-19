<?php
    session_start();
    include_once("conexao.php");

    if((isset($_POST['email'])) && (isset($_POST['senha']))) {
        $usuario = mysqli_real_escape_string($conn, $_POST['email']); // Escapar de caracteres especiais, como aspas, previnindo SQL Injection
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        $senha = md5($senha);

        $sql = "SELECT * FROM usuarios WHERE login = '$usuario' AND senha = '$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);

        if(empty($resultado)) {
            $_SESSION['loginErro'] = "Usuário ou Senha Inválido";
            header("Location: index.php");
        } elseif(isset($resultado)) {
            $_SESSION['usuario'] = $usuario;
            header("Location: dashboard.php");
        } else {
            $_SESSION['loginErro'] = "Usuário ou Senha Inválidos";
            header("Location: index.php");
        }
    } else {
        $_SESSION['loginErro'] = "Usuário ou Senha inválidos";
        header("Location: index.php");
    }
?>