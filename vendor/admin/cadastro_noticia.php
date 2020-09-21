<?php
    session_start();
    include('conexao.php');

    /* Função para identificar caractesres especiais 
    *  para evitar quebra de sintaxe
    */
    function escape_mimic($inp) { 
        if(is_array($inp)) 
            return array_map(__METHOD__, $inp); 
    
        if(!empty($inp) && is_string($inp)) { 
            return str_replace(array("'"), array("\\'"), $inp); 
        } 
    
        return $inp; 
    } 

    /* Função para comprimir arquivos grandes 
    */
    function compress($source, $destination) {
        $tamanho = filesize($source);

        if ($tamanho > 1024 * 1024) {
            $info = getimagesize($source);
            $quality = 100;

            if ($tamanho < 3 * 1024 * 1024 ) {
                $quality = 65;
            } else if ($tamanho > 5 * 1024 * 1024) {
                $quality = 35;
            }
        
            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);
        
            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);
        
            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);
        
            imagejpeg($image, $destination, $quality);
            unlink($source);
            return True;
        }

        rename($source, $destination);
        return False;
    }
    
    // Recebe os valores de get para verificar condições abaixo
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $imagem = filter_input(INPUT_GET, 'imagem', FILTER_SANITIZE_STRING);
    $diretorio = "../../files/images/";

    // Excluir imagem
    if (isset($imagem) and isset($id)) {
        unlink($diretorio . $imagem);

        $query_update = "UPDATE noticia SET imagem='' WHERE id = '{$id}'";
        mysqli_query($conexao, $query_update);

        $_SESSION['img_apagada'] = true;
        header('Location: ../../admin/editor?noticia=' . $id);
        exit();
    } 

    // Editar conteúdo completo com nova imagem
    if (isset($id)) {
        $titulo = escape_mimic($_POST['titulo']);
        $autor = $_POST['autor'];
        $texto = escape_mimic($_POST['texto']);

        $extensao = "." . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $query_select = "SELECT imagem FROM noticia WHERE id = '{$id}'";
        $result = mysqli_query($conexao, $query_select);
        $imagem = mysqli_fetch_assoc($result);
        $novo_nome = $imagem['imagem'];
        $temp_name = md5(time()) . $extensao;
        if (isset($_FILES['imagem'])) {
            $nome_imagem = $imagem['imagem'] == '' ? pathinfo($_FILES['imagem']['name'], PATHINFO_FILENAME) . "_" . date('dmY') . "_" . time() : $imagem['imgame'];
            $novo_nome = strtolower($nome_imagem) . $extensao;
            
            move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$temp_name);
            compress($diretorio . $temp_name, $diretorio . $novo_nome);
        }

        $query_update = "UPDATE noticia SET titulo='{$titulo}',autor='{$autor}',corpo_noticia='{$texto}',imagem='{$novo_nome}' WHERE id = '{$id}'";
        $result = mysqli_query($conexao, $query_update);

        $_SESSION['sucesso_update'] = true;
        header('Location: ../../admin/editor?noticia=' . $id);
        exit();
    }

    // Cadastro de nova notícia
    if (empty($_POST['titulo']) || empty($_POST['autor']) || empty($_POST['texto'])) {
        $_SESSION['campos'] = true;
        header('Location: ../../admin/editor');
        exit();
    }

    if(isset($_FILES['imagem'])) {
        $titulo = escape_mimic($_POST['titulo']);
        $autor = $_POST['autor'];
        $texto =  escape_mimic($_POST['texto']);
        $extensao = "." . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION); //Pega extensão
        $temp_name = md5(time()) . $extensao;
        $novo_nome = pathinfo($_FILES['imagem']['name'], PATHINFO_FILENAME) . "_" . date('dmY') . "_" . time() . $extensao;
        

        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $temp_name);
        compress($diretorio . $temp_name, $diretorio . $novo_nome);
        
        $sql_query = "INSERT INTO noticia(titulo, autor, criado_em, imagem, corpo_noticia) VALUES ('{$titulo}','{$autor}',NOW(),'{$novo_nome}','{$texto}')";

        if ($conexao->query($sql_query)) {
            $_SESSION['sucesso_insert'] = true;
        }
        $conexao->close();
        header('Location: ../../admin/editor');
        exit();
    }
?>