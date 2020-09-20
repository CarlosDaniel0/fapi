<?php
    include('conexao.php');

    $res = array();

    $documento = $_POST['documento'];
    $id = $_POST['id_arquivo'];
    $id_origem = $_POST['id_origem'];
    $tabela = $_POST['tabela'];
    $tabela_relacionamento = $_POST['relacionamento'];
    $coluna_origem = $_POST['coluna_origem'];
    $coluna_id = $_POST['coluna_id'];
    $campos_relacionamento = '';

    foreach($_POST['campos'] as $campo => $valor) {
        if ($campos_relacionamento != '') {
            $campos_relacionamento .= ',';
        }
        $campos_relacionamento .= $valor;
    }

    // Apagar todos os documentos relacionados ao ID Pai
    if($_POST['all'] == 'true') {
        $query_select_files = "SELECT a.id_arquivo, a.nome, a.arquivo, a.data  FROM arquivos_notas AS a 
        INNER JOIN notas_has_arquivos AS n on (a.id_arquivo = n.id_arquivo) 
        WHERE n.id_nota = $id_origem ";

        $query_multiple_delete = "DELETE FROM $tabela WHERE $coluna_id = ";

        $result = mysqli_query($conexao, $query_select_files);

        while($documentos = mysqli_fetch_assoc($result)) {
            unlink('../../files/documents/' . $documentos['nome']);
            mysqli_query($conexao, $query_multiple_delete . $documentos['id_arquivo']);
        }
        $res[] = "Arquivos apagado do servidor e da base de dados";

        $query_relacionamento = 'DELETE FROM $tabela_relacionamento WHERE $coluna_origem = $id_origem';
        if($conexao->query($query_relacionamento)) {
            $res[] = 'Arquivos apagado da tabela de relacionamento';
        };

        echo json_encode($res, JSON_PRETTY_PRINT);
        exit();
    }


    //exit();
    $query_origem = "DELETE FROM $tabela WHERE $coluna_id = $id";
    $query_relacionamento = "DELETE FROM $tabela_relacionamento WHERE $coluna_origem = $id_origem AND $coluna_id = $id";

    $resultado_delete = mysqli_query($conexao, $query_origem);

    if($conexao->query($query_origem)) {
        unlink('../../files/documents/' . $documento);
        if($conexao->query($query_relacionamento)) {
            $res[] = 'arquivo apagado da tabela de relacionamento';
        }
        $res[] = 'arquivo apagado da tabela de origem';
    } else {
        $res[] = "Falha na operação.";
    }
    echo json_encode($res, JSON_PRETTY_PRINT);
?>