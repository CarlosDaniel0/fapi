<?php
    session_start();
    include('conexao.php');
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if (!empty($id)) {
            $query_select_files = "SELECT a.nome, a.id_arquivo FROM arquivos_eventos AS a
            INNER JOIN evento_has_arquivos AS e ON (a.id_arquivo = e.id_arquivo)
            WHERE e.id_evento = $id";
    
            $query_multiple_delete = "DELETE FROM arquivos_eventos WHERE id_arquivo = ";
    
            $result = mysqli_query($conexao, $query_select_files);
    
            while($documentos = mysqli_fetch_assoc($result)) {
                unlink('../../files/uploads/' . $documentos['nome']);
                mysqli_query($conexao, $query_multiple_delete . $documentos['id_arquivo']);
            }

            $res[] = "Arquivos apagado do servidor e da base de dados";
    
            $query_relacionamento = 'DELETE FROM evento_has_arquivos  WHERE id_nota = $id';
            if($conexao->query($query_relacionamento)) {
                $res[] = 'Arquivos apagado da tabela de relacionamento';
            };

            $result =  "DELETE FROM evento WHERE id_evento = '$id'";
            $resultado_nota = mysqli_query($conexao, $result);

            $_SESSION['sucesso'] = true;
            header('Location: ../../admin/solicitacoes');
    } else {
        $_SESSION['erro'] = true;
        header('Location: ../../admin/solicitacoes');
    }
?>