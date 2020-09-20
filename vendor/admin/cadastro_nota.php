<?php
    session_start();
    include('conexao.php');

    
    // Recebe os valores de get para verificar condições abaixo
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Editar conteúdo
    if (isset($id)) {
        $nota = $_POST['nota'];
        $ano = $_POST['ano'];
        $titulo = $_POST['titulo'];

        $query_update = "UPDATE notas SET nota='{$nota}',titulo='{$titulo}',ano='{$ano}' WHERE id_nota = '{$id}'";
        $result = mysqli_query($conexao, $query_update);

        $_SESSION['sucesso_update'] = true;
        header('Location: ../../admin/editor-notas?id=' . $id);
        exit();
    }
?>