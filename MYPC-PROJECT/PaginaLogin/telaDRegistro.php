<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST ,'btnCadUsuario',FILTER_SANITIZE_SPECIAL_CHARS);
if($btnCadUsuario){
    include_once('../MODEL/Conexao.php'); 
    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
   //var_dump($dados);
 $dados['senha']= password_hash($dados['senha'],PASSWORD_DEFAULT);

 $result_usuario = "INSERT INTO usuarios (nome,email,usuario,senha) VALUES (
                      '" .$dados['nome']."',
                      '" .$dados['email']."',
                      '" .$dados['usuario']."',
                      '" .$dados['senha']. "'
                       )";

 $resultado_usuario  = mysqli_query($conn, $result_usuario);    
 if(mysqli_insert_id($conn)){
    header("Location:telaDLogin.php");

 }else{
   $_SESSION['msg'] = "Erro ao cadastrar o usuario";
 }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
  

    <?php

   if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
   }
    
   
    ?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="telaDRegistro.css">
    <title>MYPC</title>
</head>

<body>
    <header>
        <h1 id="mypc">MYPC</h1>
        <nav>
            <a href="index.php" id="home">Home</a>
            <a href="telaDRegistro.php" id="cadastrar">Cadastrar</a>
            <a href="sobre-nos.php" id="sobreN">Sobre Nós</a>
            <a href="build.php" id="build">Build</a>
        </nav>
    </header>

    <div class="login-container">
        <h2>Registrar</h2>
        <form method="POST" action="">
             <label>Nome</label>
             <input type="text" name = "nome" placeholder="Digite o seu nome e o sobrenome"><br><br>

             <label>Email</label>
             <input type="text" name = "email" placeholder="Digite o seu email"><br><br>

            <label>Usuario</label>
            <input type="text" name = "usuario" placeholder="Digite o usuario"><br><br>

            <label>Senha</label>
            <input type="password" name = "senha" placeholder="Digite a senha"><br><br>

         <input type = "submit" name="btnCadUsuario" value="Cadastrar">

         Lembrou ?
         <a href="telaDLogin.php">Clique Aqui</a> para logar
        </form>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 MYPC. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>

</html>