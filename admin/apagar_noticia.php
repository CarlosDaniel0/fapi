<?php
    session_start();
    include('conexao.php');
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $imagem = filter_input(INPUT_GET, 'imagem', FILTER_SANITIZE_STRING);

    if (!empty($id)) {
        $result =  "DELETE FROM noticia WHERE  id = '$id'";
        $resultado_noticia = mysqli_query($conexao, $result);
    
        if (isset($imagem)) {
            unlink('../files/images/' . $imagem);
        }
        if (mysqli_affected_rows($conexao)) {
            $_SESSION['sucesso'] = true;
            header('Location: dashboard');
        } else {
            $_SESSION['falha'] = true;
            header('Location: dashboard');
        }
    } else {
        $_SESSION['erro'] = true;
        header('Location: dashboard');
    }
?>