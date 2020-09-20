<?php
    session_start();
    include('conexao.php');

    function format_date($data) {
        $data = explode("/", $data);
        return $data[2] . "-" . $data[1] . "-" . $data[0];
    }

    $id = $_POST['id'];
    $coluna_id = $_POST['coluna_id'];

    if (isset($id)) {
        $coluna = $_POST['coluna'];
        $conteudo = $_POST['conteudo'];
        $tabela = $_POST['tabela'];

        if($coluna == 'data_registro' || $coluna == 'data') {
            $conteudo = format_date($conteudo);
        }

        if (empty($coluna)) {
            $_SESSION['campos'] = true;
            exit();
        }

        $query_update = "UPDATE $tabela SET $coluna = '{$conteudo}' WHERE $coluna_id = '{$id}'";
        $result = mysqli_query($conexao, $query_update);
        
        //echo $query_update;
        //echo "Success";
        exit();
    }
?>