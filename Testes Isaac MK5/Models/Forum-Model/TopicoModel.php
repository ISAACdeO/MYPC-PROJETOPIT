<?php

require_once 'config/Conexao.php';

class Topico {
    private $conn;
    private $table_name = "topicos";
    public $id;
    public $usuario_id;
    public $titulo;
    public $conteudo;
    public $data_criacao;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function criar() {
        $query = "INSERT INTO " . $this->table_name . " (usuario_id, titulo, conteudo) VALUES (:usuario_id, :titulo, :conteudo)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":usuario_id", $this->usuario_id);
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":conteudo", $this->conteudo);

        return $stmt->execute();
    }

    public function listar() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY data_criacao DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
