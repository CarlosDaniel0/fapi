<?php 
    /*                              **** AVISO ****
    *   Qualquer alteração feita nesse script modificará todas as páginas do site
    */ 
    $hoje = date('Y');
    
    if ($hoje > 2020) {
        $hoje = " - " . date('Y');
    } else { 
        $hoje = '';
    }

    // Imagens e Logomarcas
    $dir = "img/";
    $imagens = array(
        "logo" => "logo.png",
        "cbat" => "CBAT.png",
        "caixa" => "Patrocinador.png",
        "governo" => "governo.png",
    );



    // Footer
    $copyright = "Copyright ©2020" . $hoje . " Federação de Atletismo do Piauí - Todos os direitos reservados";
    $rua = "Conjunto Agrovila Paulo Roberto, N°28 - Bairro Cachoeira";
    $cidade = "Monsenhor Gil / PI - CEP: 64.450-000";

    $url_developer = "https://github.com/carlosdaniel0/";
?>