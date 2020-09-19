<?php 
    include('../../admin/conexao.php');

    // Receber a requisicao de pesquisa
    $requestData = $_REQUEST;

    // Indície da coluna na tabela visualizar resultado 
    $columns = array(
        array( '0' => 'cbat' ),
        array( '1' => 'nome' ),
        array( '2' => 'sexo' ),
        array( '3' => 'equipe' ),
        array( '4' => 'cidade' ),
    );

    // Query para obter quantidade de registros
    $query_paginas = "SELECT * FROM atletas";
    $resultado_paginas = mysqli_query($conexao, $query_paginas);
    $quantidade_linhas = mysqli_num_rows($resultado_paginas);

    // Query para obter registros
    $query_registros = "SELECT * FROM atletas WHERE 1 = 1";
    // Caso haja parâmetros de pesquisa
    if (!empty($requestData['search']['value'])) {
        $query_registros .= " AND (cbat LIKE '" . $requestData['search']['value'] . "%' ";
        $query_registros .= " OR nome LIKE '" . $requestData['search']['value'] . "%' "; 
        $query_registros .= " OR sexo LIKE '" . $requestData['search']['value'] . "%' "; 
        $query_registros .= " OR equipe LIKE '" . $requestData['search']['value'] . "%' )";
        $query_registros .= " OR idade LIKE '" . $requestData['search']['value'] . "%' )"; 
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
        $dado[] = $row_registros["sexo"];
        $dado[] = $row_registros["equipe"];
        $dado[] = $row_registros["idade"];

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