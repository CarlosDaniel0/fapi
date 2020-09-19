<?php 
    include('../conexao.php');
    session_start();

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<pre>";
    print_r($_FILES['arquivo']);
    echo "</pre>";

    // Gerar campos de insert ex: tabela(campo1, campo n, ..) VALUES ('valor 1', 'valor n', ...)
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $documento = filter_input(INPUT_GET, 'documento', FILTER_SANITIZE_STRING);

    $diretorio = '../../files/documents/';

    if(isset($id) and isset($documento)){
        unlink($diretorio . $documento);

        $query_update = "UPDATE competicoes SET documento = '' WHERE id = '{$id}'";

        if ($conexao->query($query_update)) {
            $_SESSION['delete_doc'] = true;
            header('Location: ../editor-competicoes?id=' . $id);
            exit();
        }
    }

    if (!empty($id)) {
        $update = '';
        foreach($_POST as $chave => $valor){
            if ($chave != 'id') {
                if (!empty($update)) {
                    $update .= ",";
                }
                if(empty($valor)) {
                    $update .= $chave . "=NULL";
                } else {
                    $update .= $chave . "=" . "'" . $valor . "'";
                }
            }
        }

        $extensao =  substr($_FILES['arquivo']['name'], -4);
        $nome =  pathinfo($_FILES['arquivo']['name'], PATHINFO_FILENAME) . "_" . date('dmY') . "_" . time() . $extensao;
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $nome)) {
            $update .= ",documento='" . $nome . "'";
        }
        $query_update = "UPDATE competicoes SET $update WHERE id = $id";
        echo $query_update;

        if ($conexao->query($query_update)) {
            $_SESSION['sucesso_update'] = True;
            header('Location: ../editor-competicoes?id=' . $id);
        } else {
            $_SESSION['erro'] = True;
            header('Location: ../editor-competicoes?id=' . $id);
        }
        exit();
        
    }

    $campos = '';
    $valores = '';
    foreach($_POST as $chave => $valor){
        if ($chave != 'id') {
            if (!empty($campos) or !empty($valores)) {
                $campos .= ',';
                $valores .= ',';
            }
            if (empty($valor)) {
                $valores .= "NULL";
            } else {
                $valores .= "'" . $valor . "'";
            }
            $campos .= $chave;
        }
    }

    $extensao =  substr($_FILES['arquivo']['name'], -4);
    $nome =  pathinfo($_FILES['arquivo']['name'], PATHINFO_FILENAME) . "_" . date('dmY') . "_" . time() . $extensao;
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $nome)){
        $campos .= ',documento';
        $valores .= ",'" . $nome . "'";
    }
    $query_insert = "INSERT INTO competicoes($campos) VALUES ($valores)";
    echo $query_insert;
    if ($conexao->query($query_insert)) {
        $_SESSION['sucesso_insert'] = True;
        header('Location: ../editor-competicoes');
    } else {
        $_SESSION['erro'] = True;
        header('Location: ../editor-competicoes');
    }
    //echo $nome;
?>

