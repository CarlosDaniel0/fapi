<?php
// Buscar e Retornar em JSON notas
include('../../admin/conexao.php');

$ano = $_POST['ano'];
$tabela = $_POST['tabela'];

$query = "SELECT * FROM $tabela WHERE ano = $ano";
$result = mysqli_query($conexao, $query);
$linhas = mysqli_num_rows($result);

$res = array();
while ($notas = mysqli_fetch_assoc($result)) {
    // Seleciona todos as notas a serem apresentadas
    $valores = array();
    $valores['id'] = $notas['id_nota'];
    $valores['nota'] = $notas['nota'];
    $valores['titulo'] = $notas['titulo'];
    $valores['linhas'] = $linhas;

    // Com o id da nota
    // Seleciona os documentos que pertencem a essa nota
    $id = $notas['id_nota'];
    $query_documentos = "SELECT a.id_arquivo, a.nome, a.arquivo, a.data  FROM arquivos_notas AS a 
        INNER JOIN notas_has_arquivos AS n on (a.id_arquivo = n.id_arquivo) 
        WHERE n.id_nota = $id ";

    $result_documentos = mysqli_query($conexao, $query_documentos);

    $docs = array();
    while ($documentos = mysqli_fetch_assoc($result_documentos)) {
        $dados  = array(
            "nome" => $documentos['nome'],
            "arquivo" => $documentos['arquivo'],
            "id_documento" => $documentos['id_arquivo'],
            
        );

        $docs[] = $dados;
    }

    $valores['documentos'] = $docs;
    $res[] = $valores;

    
}   




echo json_encode($res);
?>