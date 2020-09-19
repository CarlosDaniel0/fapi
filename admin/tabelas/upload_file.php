<?php 
    ini_set('upload_max_filesize', '20M');
    header('Content-type: application/json');
    $file = $_FILES['file'];

    $ret = [];

    if (move_uploaded_file($file['tmp_name'], '../../files/documents/' . $file['name'])) {
        $ret["status"] = "success";
        $ret["path"] = '../files/documents/' . $file["name"];
        $ret["name"] = $file["name"];
    } else {
        $ret["status"] = "error";
        $ret["name"] = $file['name'];
    }

    echo json_encode($ret, JSON_PRETTY_PRINT);
?>