<?php
require_once "Classes/usuarios.php";
$u = new Usuario;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo.css">

    <title>Start4P│Recuperar Senha</title>
</head>

<body>
<div id="corpo">  
    <h1>Recuperar Senha</h1>
    <form method="POST" >
        <input type="email" name="email" placeholder=" Digite seu e-mail">
        <input type="submit" name="recuperar" value="Recuperar">
    </form>
  </div>  

</body>
</html>