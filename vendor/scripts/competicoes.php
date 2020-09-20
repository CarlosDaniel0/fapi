<?php 
    // Buscar e Retornar em JSON notas
    include('../../vendor/admin/conexao.php');

    $ano = $_POST['ano'];

    // Query de consulta com formatação de campos
    // Necessita de correção futuramente
    $query = "SELECT id, competicao, DATE_FORMAT(periodo_de, '%d/%m/%Y') as periodo_de,  
    DATE_FORMAT(periodo_ate, '%d/%m/%Y') as periodo_ate, DATE_FORMAT(inscricoes_de, '%d/%m/%Y') as inscricoes_de,
    DATE_FORMAT(inscricoes_ate, '%d/%m/%Y') as inscricoes_ate, cidade, documento FROM competicoes WHERE ano = $ano";
    $result = mysqli_query($conexao, $query);

    $res = array();
    while ($dados = mysqli_fetch_assoc($result)) {
        // Seleciona todos as notas a serem apresentadas
        $valores = array();
        $valores['id'] = $dados['id'];
        $valores['competicao'] = $dados['competicao'];
        $valores['periodo'] = array(
            "de" => $dados['periodo_de'], 
            "ate" => $dados['periodo_ate']);

        $valores['inscricoes'] = array(
            "de" => $dados['inscricoes_de'], 
            "ate" => $dados['inscricoes_ate']);

        $valores['cidade'] = $dados['cidade'];
        $valores['documento'] = $dados['documento'];

        $res[] = $valores;
    } 

    echo json_encode($res);
?>