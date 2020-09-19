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
    
    // Recebe os valores de get para verificar condições abaixo
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Editar conteúdo
    if (isset($id)) {
        $titulo = $_POST['titulo'];
        $nome = strtolower( preg_replace('/[ -]+/', "-", 
        strtr(utf8_decode(trim($titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
        "aaaaeeiooouuncAAAAEEIOOOUUNC-")) );
        $pagina = escape_mimic($_POST['pagina']);

        $query_update = "UPDATE paginas SET nome='{$nome}',titulo='{$titulo}',pagina='{$pagina}',alterado=NOW() WHERE id = '{$id}'";
        $result = mysqli_query($conexao, $query_update);

        $_SESSION['sucesso_update'] = true;
        header('Location: editor-paginas?id=' . $id);
        exit();
    }

    // Cadastro de nova Página
    if (empty($_POST['titulo']) || empty($_POST['pagina'])) {
        $_SESSION['campos'] = true;
        header('Location: editor-paginas');
        exit();
    }

    $titulo = $_POST['titulo'];
    $nome = strtolower( preg_replace('/[ -]+/', "-", 
    strtr(utf8_decode(trim($titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
    "aaaaeeiooouuncAAAAEEIOOOUUNC-")) ); // Define o nome a ser usano na url do site
    $pagina = escape_mimic($_POST['pagina']);

    $sql_query = "INSERT INTO paginas(nome, titulo, pagina, data) VALUES ('{$nome}','{$titulo}','{$pagina}',NOW())";

    if ($conexao->query($sql_query)) {
        $_SESSION['sucesso_insert'] = true;
    }
    $conexao->close();
    header('Location: editor-paginas');
    exit();
?>