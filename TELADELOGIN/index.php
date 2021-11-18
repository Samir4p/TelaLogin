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
    <title>Document</title>
</head>
<body>
  
  <div id="corpo">  
    <h1>Entrar</h1>
    <form method="POST" >
        <input type="email" name="email" placeholder="Usuário">
        <input type="password" name="senha" placeholder="Senha">
        <input type="submit" placeholder="ACESSAR">
        <a href="cadastrar.php">Ainda não é inscrito ?<strong>Cadastre-se !!</strong><br>
        <a href="recuperarSenha.php">Esqueceu sua senha<strong>Recupere Aqui !!</strong>
       
    </form>
  </div>  
  <?php
  if(isset($_POST['email']))
  {            
      $email = addslashes($_POST['email']);
      $senha = addslashes($_POST['senha']); 
      if(!empty($email) && !empty($senha))
      { 
          $u->conectar("projeto_login","localhost","root","");
            if($u->mggErro == "")
           {
            if($u->logar($email, $senha))
            {
                header("location: AreaPrivada.php");
            }
                else
                {
                  ?>
                  <div class="mss-erro"> Email e/ou senha estão incorretos !</div>
                    <?php
                }
            }
        else
        {
            ?>
            <div class="mss-erro"> <?php echo"Erros: ".$u->msgERRO;?></div>
              <?php

        }
      }
              
      else
      {
        ?>
        <div class="mss-erro"> Preencha todos os campos !!!</div>
          <?php 
      }
    
}
  ?>
</body>
</html>