<?php 
    include('../../admin/conexao.php');
    function data($data) {
        return date("d/m/Y", strtotime($data));
    }

    // Receber a requisicao de pesquisa
    $requestData = $_REQUEST;

    // Indície da coluna na tabela visualizar resultado 
    $columns = array(
        array( '0' => 'cbat' ),
        array( '1' => 'nome' ),
        array( '2' => 'data_registro' ),
        array( '3' => 'entidade' ),
    );

    // Query para obter quantidade de registros
    $query_paginas = "SELECT * FROM treinadores";
    $resultado_paginas = mysqli_query($conexao, $query_paginas);
    $quantidade_linhas = mysqli_num_rows($resultado_paginas);

    // Query para obter registros
    $query_registros = "SELECT * FROM treinadores WHERE 1 = 1";
    // Caso haja parâmetros de pesquisa
    if (!empty($requestData['search']['value'])) {
        $query_registros .= " AND (cbat LIKE '" . $requestData['search']['value'] . "%' ";
        $query_registros .= " OR nome LIKE '" . $requestData['search']['value'] . "%' "; 
        $query_registros .= " OR data_registro LIKE '" . $requestData['search']['value'] . "%' "; 
        $query_registros .= " OR entidade LIKE '" . $requestData['search']['value'] . "%' )"; 
    }

    $resultado_registros = mysqli_query($conexao, $query_registros);
    $total_registros = mysqli_fetch_assoc($resultado_registros);

    // Ordenar resultados
    $query_registros .= " ORDER BY " . $columns[$requestData['order'][0]['column']][$requestData['order'][0]['column']] . " " .
    $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] .
    " ";

    $resultado_registros = mysqli_query($conexao, $query_registros);
    $dados = array();
    while ($row_registros = mysqli_fetch_array($resultado_registros)) {
        $dado = array();
        $dado[] = $row_registros["cbat"];
        $dado[] = $row_registros["nome"];
        $dado[] = data($row_registros["data_registro"]);
        $dado[] = $row_registros["entidade"];

        $dados[] = $dado;
    }

    // Retorna registros para o DataTable em JSON
    $json_data = array(
        "draw" => intval($requestData['draw']), // Para cada requisição é enviado um número como parametro
        "recordsTotal" => intval($quantidade_linhas), // Quantidade de registros no banco
        "recordsFiltered" => intval($total_registros), // Total de registros quando houver registros
        "data" => $dados // Array de dados completo dos dados retornados da tabela
    );

    echo json_encode($json_data);
?>