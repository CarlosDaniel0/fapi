<?php 
    session_start();
    include('conexao.php');

    print_r($_POST);

    $valores = "";
    $campos = "";
    $camposRelacionados = "";
    $idDeOrigem = '';

    foreach ($_POST as $chave => $valor) {
        if ($chave != 'idOrigem') {
            if (!empty($campos)) {
                $campos .= ',';
            }
            if (!empty($valores)) {
                $valores .= ',';
            }

            $campos .= $chave;
            $valores .= "'" . $valor . "'";
        } else {
            $idDeOrigem = $valor; // ID da tabela pai que utilizará os dados
        }
    }

    // Parte que insere o nome do arquivo no banco de dados correspondente
     $query_insert = "INSERT INTO arquivos_notas($campos) VALUES ($valores)";
     //echo $query_insert;
    if ($conexao->query($query_insert)) {
        $id_arquivo = mysqli_insert_id($conexao);
        $query_relacionamento = "INSERT INTO notas_has_arquivos(id_nota, id_arquivo) VALUES ($idDeOrigem,$id_arquivo)";
        
        //echo $query_relacionamento;
        // Atualiza a tabela de Relacionamento
        if ($conexao->query($query_relacionamento)) {
            echo "Registro efetuado na tabela de relacionamento\nSucesso!";
            // $_SESSION['sucesso_insert'] = true;
            // header('Location: ../clubes-filiados');
            exit();
        }
        echo "Falha ao atualizar relacionamento!";
    } else {
        echo "Falha!";
        // $_SESSION['falha_insert'] = true;
        // header('Location: ../clubes-filiados');
        exit();
    }
?>