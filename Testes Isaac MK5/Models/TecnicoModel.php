<?php

class TecnicoModel {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConnection();
    }

    public function cadastrar($nome, $email, $tecnico, $senha) {
        // Prepara a inserção
        $stmt = $this->conexao->prepare("INSERT INTO tecnicos (nome, email, tecnico, senha) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $tecnico, $senha);
        return $stmt->execute();
    }

    public function validarLogin($email, $senha) {
        $stmt = $this->conexao->prepare("SELECT * FROM tecnicos WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $tecnico = $resultado->fetch_assoc();

        // Verifica se a senha informada corresponde à senha armazenada
        if ($tecnico && password_verify($senha, $tecnico['senha'])) {
            return $tecnico; // Retorna os dados do técnico
        }

        return false; // Retorna falso se a validação falhar
    }
}
?>
