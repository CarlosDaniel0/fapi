<?php 

    include('conexao.php');
    
    $body = array();

    $query = "INSERT INTO notas(nota, titulo, ano) VALUES ('{$_POST['nota']}', '{$_POST['titulo']}', {$_POST['ano']})";
    
    if ($conexao->query($query)) {
        $id = mysqli_insert_id($conexao);

        $body['response'] = "success";
        $body['last_id'] = $id;

        echo json_encode($body);
    } else {
        echo json_encode('fail');
    }
?>