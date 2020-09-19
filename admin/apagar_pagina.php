<?php
    session_start();
    include('conexao.php');
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if (!empty($id)) {
        $result =  "DELETE FROM paginas WHERE  id = '$id'";
        $resultado_noticia = mysqli_query($conexao, $result);
    
        if (mysqli_affected_rows($conexao)) {
            $_SESSION['sucesso'] = true;
            header('Location: gerir-paginas');
        } else {
            $_SESSION['falha'] = true;
            header('Location: gerir-paginas');
        }
    } else {
        $_SESSION['erro'] = true;
        header('Location: gerir-paginas');
    }
?>