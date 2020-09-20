<?php
// Buscar e Retornar em JSON notas
include('../../vendor/admin/conexao.php');
function data($data) {
    return date("d/m/Y", strtotime($data));
}

$ano = $_POST['ano'];
$tabela = $_POST['tabela'];

$query = "SELECT * FROM $tabela WHERE ano = $ano";
$result = mysqli_query($conexao, $query);
$linhas = mysqli_num_rows($result);

$res = array();
while ($dados = mysqli_fetch_assoc($result)) {
    // Seleciona todos as notas a serem apresentadas
    $valores = array();
    $valores['id'] = $dados['id'];
    $valores['nome'] = $dados['nome'];
    $valores['ano'] = $dados['ano'];
    $valores['data'] = data($dados['data']);
    $valores['documento'] = $dados['documento'];

    $res[] = $valores;

    
}   




echo json_encode($res);
?>