<?php

class UsuarioModel {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConnection();
    }

    public function cadastrar($nome, $email, $usuario, $senha) {
        $stmt = $this->conexao->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $usuario, $senha);
        return $stmt->execute();
    }

    public function validarLogin($email, $senha) {
        $stmt = $this->conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $resultado = $stmt->get_result();

        return $resultado->fetch_assoc(); 
    }
}
?>
