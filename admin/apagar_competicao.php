<?php
    session_start();
    include('conexao.php');
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $imagem = filter_input(INPUT_GET, 'documento', FILTER_SANITIZE_STRING);

    if (!empty($id)) {
        $result =  "DELETE FROM competicoes WHERE  id = '$id'";
        $resultado_noticia = mysqli_query($conexao, $result);
    
        if (isset($arquivo)) {
            unlink('../files/documents/' . $documento);
        }
        if (mysqli_affected_rows($conexao)) {
            $_SESSION['sucesso'] = true;
            header('Location: competicoes');
        } else {
            $_SESSION['falha'] = true;
            header('Location: competicoes');
        }
    } else {
        $_SESSION['erro'] = true;
        header('Location: competicoes');
    }
?>