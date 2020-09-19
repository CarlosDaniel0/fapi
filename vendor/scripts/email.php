<?php 
    session_start();
    if(isset($_POST['email']) && !empty($_POST['email'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    $to = "email@teste.com";
    $body = "Nome: " . $nome . "\r\n"
    . "Email: " . $email . "\r\n"
    . "Mensagem: " . $mensagem;
    
    $header = "FROM:email@teste.com" . "\r\n" 
    . "Reply-To:" . $email
    . "X-Mailer:PHP/" . phpversion();
    
    if (mail($to, $assunto, $body, $header)) {
        $_SESSION['success'] = true;
    } else {
        $_SESSION['fail'] = true;
    }

    header("Location: ../../contato");
    exit();
    }
    $_SESSION['false'] = true;
    header("Location: ../../contato");
?>