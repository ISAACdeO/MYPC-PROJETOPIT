<?php

class TecnicoController {
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $tecnico = isset($_POST['tecnico']) ? $_POST['tecnico'] : null;            $senha = $_POST['senha'];

            // Verifica se o campo tecnico está vazio
            if (empty($tecnico)) {
                echo "O campo técnico não pode estar vazio.";
                return;
            }

            $tecnicoModel = new TecnicoModel();
            // Criptografa a senha antes de cadastrar
            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
            if ($tecnicoModel->cadastrar($nome, $email, $tecnico, $senhaCriptografada)) {
                echo "Cadastro realizado com sucesso!";
                header('Location: index_tecnicos.php?action=login');
                exit();
            } else {
                echo "Erro ao cadastrar. O email pode já estar em uso.";
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $tecnicoModel = new TecnicoModel();
            $resultado = $tecnicoModel->validarLogin($email, $senha);

            if ($resultado) {
                session_start();
                $_SESSION['tecnico'] = $resultado; 
                header('Location: Views/Homes_Tecnicos.php'); 
                exit();
            } else {
                echo "Email ou senha incorretos.";
            }
        }
    }
}
?>
