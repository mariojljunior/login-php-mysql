<?php

class Usuario{

    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        global $msgErro;

        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host.";usuario=".$usuario.";senha=".$senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha){
        global $pdo;

        //verificar se já existe o email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->blindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;//já está cadastrado
        }else{//Caso não, Cadastrar.
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->blindValue(":n",$nome);
            $sql->blindValue(":t",$telefone);
            $sql->blindValue(":e",$email);
            $sql->blindValue(":s",$senha);
            $sql->execute();
            return true;
        }
    }

    public function logar($email, $senha){
        global $pdo;
        //verificar se o email e senha estão cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->blindValue(":e",$email);
        $sql->blindValue(":s",$senha);
        $sql->execute();
        if($sql->rowCount() > 0){
            //entra no sistema (sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true;//logado com sucesso
        }else{
            return false;//não foi possível logar
        }
    }
}


?>