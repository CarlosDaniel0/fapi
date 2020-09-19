<?php
    session_start();
    include('conexao.php');
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if (!empty($id)) {
            $query_select_files = "SELECT a.id_arquivo, a.nome, a.arquivo, a.data  FROM arquivos_notas AS a 
            INNER JOIN notas_has_arquivos AS n on (a.id_arquivo = n.id_arquivo) 
            WHERE n.id_nota = $id";
    
            $query_multiple_delete = "DELETE FROM arquivos_notas WHERE id_arquivo = ";
    
            $result = mysqli_query($conexao, $query_select_files);
    
            while($documentos = mysqli_fetch_assoc($result)) {
                unlink('../files/documents/' . $documentos['arquivo']);
                mysqli_query($conexao, $query_multiple_delete . $documentos['id_arquivo']);
            }
            $res[] = "Arquivos apagado do servidor e da base de dados";
    
            $query_relacionamento = 'DELETE FROM notas_has_arquivos  WHERE id_nota = $id';
            if($conexao->query($query_relacionamento)) {
                $res[] = 'Arquivos apagado da tabela de relacionamento';
            };

            $result =  "DELETE FROM notas WHERE id_nota = '$id'";
            $resultado_nota = mysqli_query($conexao, $result);

            $_SESSION['sucesso'] = true;
            header('Location: notas');
    } else {
        $_SESSION['erro'] = true;
        header('Location: notas');
    }
?>