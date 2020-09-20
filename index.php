<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Projeto Login</title>
</head>
<body>
    <div id="corpo-form">
        <h1>Entrar</h1>
        <form method="POST" action="processa.php">
            <input type="email" name="email" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="ACESSAR">
            <a href="cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se!</strong></a>
        </form>
    </div>

    <?php
    //verificar se a pessoa clicou no botão
    isset($_POST['nome']) {

        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);
        //verificar se está preenchido
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha){

        }
    }


    ?>
</body>
</html>