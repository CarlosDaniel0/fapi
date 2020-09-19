<?php
    session_start();
    include('../../admin/conexao.php');

    // Consulta de distancia com o id passado pelo usuário
    $query = "SELECT distancia.nome FROM evento_distancia
        INNER JOIN distancia ON distancia.id_distancia = evento_distancia.id_distancia
        WHERE evento_distancia = 2";

    // campos e valores a serem inseridos na tabela
    $dados = $_POST;
    $valores = '';
    $campos = '';

    // Monta campos da tabela e valores a serem inseridos na tabela
    foreach ($dados as $chave => $valor) {
        if ($chave != 'distancia' and $chave != 'outro') {
            if($chave == 'hora') {
                $dados[$chave] .= ':00'; // Necessário para preencher o campo time
            }
            if (!empty($valores)) {
                $valores .= ',';
            }
            if (!empty($campos)) {
                $campos .= ',';
            }
            $valores .= "'" . $dados[$chave] . "'";
            $campos .= $chave;
        }
    }
    //                 Evento
    // Insere os dados do evento na tabela evento
    $query_insert_evento = "INSERT INTO evento($campos) VALUES ($valores)";
    $id = '';
    echo $query_insert_evento;
    if ($conexao->query($query_insert_evento)) {
        $id = mysqli_insert_id($conexao);
        echo "foi";
    }

    //                 Distancia
    // Gera a query que será usada na tabela de relacionamento entre distancia e evento
    $query_distancia = '';
    foreach ($dados['distancia'] as $chave => $valor) {
        if ($query_distancia != '') {
            $query_distancia .= ',';
        }
        $query_distancia .= "($id, $valor)";
    }
    // Ex (1,5),(1,4),(1,10)

    // Caso haja algo no campo outro
    if (!empty($_POST['outro'])) {
        // Transação para inserir campo outro na tabela distancia
        // ** Consultar diagrama de modelo entidade-relacionamento
        $conexao->begin_transaction();
        $conexao->query("INSERT INTO distancia(nome) VALUES ('{$_POST['outro']}')");
        $id_distancia = mysqli_insert_id($conexao);
        $conexao->query("INSERT INTO evento_has_distancia(id_evento, id_distancia) VALUES ($id, $id_distancia)");
        $conexao->commit();
    }
    
    // Insere os dados de id de evento e id de distancia na tabela de relacionamento
    $conexao->query("INSERT INTO evento_has_distancia(id_evento, id_distancia) VALUES $query_distancia");
    
    
    /*               Arquivos
    * Insere os arquivos na tabela arquivos e na tabela de relacionamento
    * ** Consultar diagrama de modelo entidade-relacionamento
    */ 

    $valores_arquivo = '';
    // Gera os valores que serão inseridos na tabela de relacionamento
    foreach($_FILES['arquivo']['name'] as $chave => $valor) {
        if(!empty($valor)) {
            // Adiciona data e hora para evitar sobreposição no servidor
            $extensao =  substr($valor, -4);
            $nome = pathinfo($valor, PATHINFO_FILENAME) . "_" . date('dmY') . "_" . time() . $extensao;
            // Move os arquivos da pasta temporárioa do PHP para a pasta de destino
            move_uploaded_file($_FILES['arquivo']['tmp_name'][$chave], "../../files/uploads/" . $nome);
            
            // Inicia a transação inserindo o nome do arquivo e a data de inserção
            $conexao->begin_transaction();
            $conexao->query("INSERT INTO arquivos_eventos(nome, data_criado) VALUES ('{$nome}', now())");
            $id_arquivo = mysqli_insert_id($conexao);
            $conexao->query("INSERT INTO evento_has_arquivos(id_evento, id_arquivo) VALUES ($id, $id_arquivo)");
            $conexao->commit();
            // Finaliza a transação com um commit
        } else {
            echo "Sem arquivos!";
        }
    }


    $_SESSION['success'] = true;
    header('Location: ../../solicitar-permit');
    exit();
?>