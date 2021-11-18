<?php
    require_once 'Classes/usuarios.php';
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
  <div id="corpoCad">  
    <h1>Cadastrar</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
        <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
        <input type="email" name="email" placeholder="Usuário" maxlength="40">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="password" name="con_senha" placeholder="Confirmar Senha" maxlength="15">
        <input type="submit" value="Cadastrar">
    </form>
  </div> 
<?php
/////verificar se a pessoa clicou no botão
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmmarSenha = addslashes($_POST['con_senha']);
    
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmmarSenha))
    {
        $u->conectar("projeto_login","localhost","root","");
         if($u->msgERRO == "")///se está tudo ok
            {
                if($senha == $confirmmarSenha)
                {
                if($u->cadastrar($nome,$telefone,$email,$senha))
                {
                    ?>
                    <div id="msg-sucesso"> "Cadastrado com sucesso !!!"</div>
                
                    <?php
                } 
                    else
                    {
                        ?>
                    <div class="msg-erro"> "Email já cadastrado !!!"</div>
                    <?php
                        
                    }
            }
            else
            {
                ?>
                    <div class="msg-erro"> "Senha e Conformar senha não conferem !!!"</div>
                    <?php
            }
        } else
        {
                     ?>
                    <div class="msg-erro"> 
                        <?php echo "ERRO: ".$u->msgERRO;?>
                    </div>
                    <?php
        }    
     }
    else
    {
        ?>
        <div class="msg-erro"> "Preencha todos os campos !!!"</div>
        <?php
    }
                   
}
?>   
</body>
</html>