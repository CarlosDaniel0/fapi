<?php 
    include('../../vendor/admin/conexao.php');

    $ano = $_POST['ano'];
    $tabela = $_POST['tabela'];

    $query = "SELECT DISTINCT campo FROM $tabela";
    $result = mysqli_query($conexao, $query);
    
    $res = array();
    while($resultados = mysqli_fetch_array($result)) {
        $query_especifica = "SELECT nome, documento FROM $tabela WHERE campo = '{$resultados['campo']}' AND ano = $ano";
        $result_especifico = mysqli_query($conexao, $query_especifica);

        $campo = array();
        while($dados = mysqli_fetch_assoc($result_especifico)) {
            $dado = array();
            $dado["nome"] = $dados['nome']; 
            $dado["documento"] = $dados['documento']; 
            $campo[] = $dado;
        }
        $res[$resultados['campo']] = $campo;
    }

    echo json_encode($res, JSON_PRETTY_PRINT);
    
?>