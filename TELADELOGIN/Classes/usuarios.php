<?php

class Usuario
{
    private $pdo;
    public $msgERRO = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try
        {
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        }catch(PDOException $e)
        {
            $msgERRO = $e->getMessage();
        }
    }


    public function cadastrar($nome,$telefone,$email,$senha)
    { global $pdo;
        /////Verificar se ja está logado...  
        $sql = $pdo->prepare("SELECT idusuario FROM usuario WHERE email=:e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;   ///ja está cadastrado
        }
         else
        {
            $sql = $pdo->prepare("INSERT INTO usuario (nome, telefone, email, senha) VALUES (:n,:t, :e, :s)");
            $sql->bindValue(":n", $nome); 
            $sql->bindValue(":t", $telefone); 
            $sql->bindValue(":e", $email); 
            $sql->bindValue(":s", md5($senha)); 
            $sql->execute();
            return true;
        }
    
    }
   
    public function logar($email, $senha)
    {global $pdo;   /////variavel global
        $sql = $pdo->prepare("SELECT idusuario FROM usuario WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {///entrar na sessão
            $dado = $sql->fetch();
            session_start();
            $_SESSION['idusuario'] = $dado['idusuario'];
            return true;   ////cadastrado com sucesso
        }
        else
        {
            return false; ///não foi possivel logar
        }


    }
    
}