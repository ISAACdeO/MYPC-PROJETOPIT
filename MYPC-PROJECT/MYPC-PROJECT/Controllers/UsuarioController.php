<?php

class UsuarioController {
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioModel = new UsuarioModel();
            if ($usuarioModel->cadastrar($nome, $email, $senha)) {
                echo "Cadastro realizado com sucesso!";
                header('Location: index.php?action=login');
                exit();
            } else {
                echo "Erro ao cadastrar.";
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioModel = new UsuarioModel();
            $resultado = $usuarioModel->validarLogin($email, $senha);

            if ($resultado) {
                session_start();
                $_SESSION['usuario'] = $resultado; 
                header('Location: Views/Homes.php'); 
                exit();
            } else {
                echo "Email ou senha incorretos.";
            }
        }
    }
}
?>
