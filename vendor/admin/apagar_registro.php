<?php 
    session_start();
    include('conexao.php');
    $id = $_POST['id'];
    if (!empty($id)) {
        $tabela = $_POST['tabela'];
        $result =  "DELETE FROM $tabela WHERE  id = '$id'";
        $resultado_delete = mysqli_query($conexao, $result);
    
        if (mysqli_affected_rows($conexao)) {
            $_SESSION['sucesso_delet'] = true;
            echo "Deu certo";
            exit();
        } else {
            $_SESSION['falha_delet'] = true;
            echo "Deu errado";
            exit();
        }
    } else {
        $_SESSION['erro_delet'] = true;
        exit();
    }
?>