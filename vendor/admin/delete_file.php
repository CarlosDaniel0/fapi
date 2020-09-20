<?php
    include('conexao.php');
    $name = $_POST['name'];
    $tabela = $_POST['tabela'];
    $id = $_POST['id'];
    $coluna = $_POST['coluna'];

    unlink('../../files/documents/' . $name);

    $query = "UPDATE $tabela SET $coluna='' WHERE id = '{$id}'";
    $result = mysqli_query($conexao, $query);
    if (mysqli_affected_rows($conexao) == 1) {
        echo "Alterado com sucesso";
    } else {
        echo "Falha ao atualizar base de dados";
    }

    //echo json_encode($ret, JSON_PRETTY_PRINT);
?>