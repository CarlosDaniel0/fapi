<?php
    if(!$_SESSION['usuario']) {
        header('Location: ../admin/index');
        exit();
    }
?>