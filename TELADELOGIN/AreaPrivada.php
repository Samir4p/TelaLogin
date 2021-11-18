<?php
    session_start();
    if(!isset($_SESSION['idusuario']))
    {
        header("location: index.php");
        exit;
    }

?>


SEJA BEMMMMMMMMM VINDO !!!!!
<a href="sair.php">Sair</a>