<?php
    session_start();
    include('conexao.php');
    
    $dados = $_POST;
    $tabela = $_POST['tabela'];
    $campos = '';
    $valores = '';

    // Cria campos para query
    foreach($dados as $chave => $valor) {
        if ($chave != 'tabela') {
            if(!empty($campos)) {
                $campos .= ',';
            }
            if(!empty($valores)) {
                $valores .= ',';
            }
            if($chave == 'ano' or $chave == 'data') {
                $valores .= $dados[$chave];
                $campos .= $chave;
            } else {
                $valores .= "'" . $dados[$chave] . "'";
                $campos .= $chave;
            }
        }
    }

    $query_insert = "INSERT INTO $tabela($campos) VALUES ($valores)";
    echo $query_insert;
    if ($conexao->query($query_insert)) {
       echo "Sucesso!";
        $_SESSION['sucesso_insert'] = true;
        exit();
    } else {
        echo "Falha!";
        $_SESSION['falha_insert'] = true;
        exit();
   }
?>