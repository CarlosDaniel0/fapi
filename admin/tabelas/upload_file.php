<?php 
    ini_set('upload_max_filesize', '20M');
    header('Content-type: application/json');
    $file = $_FILES['file'];

    $ret = [];
    $exetensao = substr($file["name"], -4);
    $nome = pathinfo($file["name"], PATHINFO_FILENAME) . "_" . date('dmY') . "_" . time() . $exetensao;

    if (move_uploaded_file($file['tmp_name'], '../../files/documents/' . $nome)) {
        $ret["status"] = "success";
        $ret["path"] = '../files/documents/' . $nome;
        $ret["name"] = $nome;
    } else {
        $ret["status"] = "error";
        $ret["name"] = $nome;
    }

    echo json_encode($ret, JSON_PRETTY_PRINT);
?>