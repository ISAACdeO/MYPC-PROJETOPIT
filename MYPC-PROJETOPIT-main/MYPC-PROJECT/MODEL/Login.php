<?php

class login{
    private $conn;
    public $table_name = 'usuarios';

    public $idusuario;
    public $nome;
    public $email;
    public $usuario;
    public $senha;
    public $logado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function Cadastrar()
    {

        $query = "INSERT INTO " . $this->table_name . " (nome, email, usuario, senha, logado) VALUES (:nome, :email, :usuario, :senha, 1)";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->usuario = htmlspecialchars(strip_tags($this->usuario));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':senha', $this->senha);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function Deslogar(){
        try {
            // Desativar o modo de atualização segura
            $this->conn->exec("SET SQL_SAFE_UPDATES = 0");

            // Atualizar a tabela para definir logado como 0 para todos os usuários logados
            $query = "UPDATE " . $this->table_name . " SET logado = 0 WHERE logado = 1";
            $stmt = $this->conn->prepare($query);

            if ($stmt->execute()) {
                // Reativar o modo de atualização segura
                $this->conn->exec("SET SQL_SAFE_UPDATES = 1");
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

}

?>