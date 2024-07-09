<?php

include_once 'MODEL/Login.php';

class LoginControler{
    private $db;
    private $usuarioss;

    public function __construct($db) {
        $this->db = $db;
        $this->usuarioss = new login ($db);
    }

    public function Cadastrar($nome, $email, $usuario, $senha){
        $this->usuarioss->nome = $nome;
        $this->usuarioss->email = $email;
        $this->usuarioss->usuario = $usuario;
        $this->usuarioss->senha = $senha;
        
        if($this->usuarioss->Cadastrar()) {
            return "Usuario Cadastrado.";
        } else {
            return "Não foi possível cadastrar.";
        }
    }

    public function readOne($idusuario) {
        $this->usuarioss->idusuario = $idusuario;
        $this->usuarioss->readOne();

        if($this->usuarioss->nome != null) {
            // Cria um array associativo com os detalhes do usuário
            $Usu_arr = array(
                "idusuario" => $this->usuarioss->id,
                "nome" => $this->usuarioss->nome,
                "email" => $this->usuarioss->email,
                "usuario" => $this->usuarioss->usuario,
                "senha" => $this->usuarioss->senha,
                "logado" => $this->usuarioss->logado
            );
            return $Usu_arr;
        } else {
            return "Usuário não localizado.";
        }
    }

    public function readAll() {
        $query = "SELECT idusuario, nome, email, usuario, senha, logado  FROM " . $this->usuarioss->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $usuarioss = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usuarioss;
    }

    public function Deslog($idusuario) {
        $this->usuarioss->idusuario = $idusuario;

        if($this->usuarioss->Deslogar()) {
            return "Deslogado.";
        } else {
            return "Nao foi possível deslogar.";
        }
    }

}
?>