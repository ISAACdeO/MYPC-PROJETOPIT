<?php
class Comment {
    private $conn;
    private $table_name = "comentarios";

    public $id;
    public $conteudo;
    public $data_comentario;
    public $usuario_id;
    public $topico_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (conteudo, data_comentario, usuario_id, topico_id) VALUES (?, NOW(), ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sii", $this->conteudo, $this->usuario_id, $this->topico_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function readByTopic() {
        $query = "SELECT id, conteudo, data_comentario FROM " . $this->table_name . " WHERE topico_id = ? ORDER BY data_comentario DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->topico_id);
        $stmt->execute();
        return $stmt->get_result(); 
    }
}
?>
