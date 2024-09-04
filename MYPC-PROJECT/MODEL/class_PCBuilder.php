<?php

namespace App\Models;

require_once 'Conexao.php'; // Certifique-se de que o caminho para Conexao.php está correto

class BuildModel
{
    private $db;

    public function __construct()
    {
        $conexao = new \Conexao(); // Instancia a classe Conexao
        $this->db = $conexao->getConnection(); // Pega a conexão ativa
    }

    public function getComponentsWithinBudget($budget)
    {
        $components = [];

        $stmt = $this->db->prepare('SELECT * FROM processador WHERE preco <= ?');
        $stmt->bind_param('d', $budget);
        $stmt->execute();
        $result = $stmt->get_result();
        $components['processadores'] = $result->fetch_all(MYSQLI_ASSOC);

        $stmt = $this->db->prepare('SELECT * FROM placa_mae WHERE preco <= ?');
        $stmt->bind_param('d', $budget);
        $stmt->execute();
        $result = $stmt->get_result();
        $components['placas_mae'] = $result->fetch_all(MYSQLI_ASSOC);

        $stmt = $this->db->prepare('SELECT * FROM memoria_ram WHERE preco <= ?');
        $stmt->bind_param('d', $budget);
        $stmt->execute();
        $result = $stmt->get_result();
        $components['memorias_ram'] = $result->fetch_all(MYSQLI_ASSOC);

        $stmt = $this->db->prepare('SELECT * FROM placa_video WHERE preco <= ?');
        $stmt->bind_param('d', $budget);
        $stmt->execute();
        $result = $stmt->get_result();
        $components['placas_video'] = $result->fetch_all(MYSQLI_ASSOC);

        $stmt = $this->db->prepare('SELECT * FROM fonte WHERE preco <= ?');
        $stmt->bind_param('d', $budget);
        $stmt->execute();
        $result = $stmt->get_result();
        $components['fontes'] = $result->fetch_all(MYSQLI_ASSOC);

        return $components;
    }

    public function calculateTotalPrice($idProcessador, $idPlacaMae, $idMemoriaRam, $idPlacaVideo, $idFonte)
    {
        $total = 0;

        $stmt = $this->db->prepare('SELECT preco FROM processador WHERE id = ?');
        $stmt->bind_param('i', $idProcessador);
        $stmt->execute();
        $stmt->bind_result($preco);
        $stmt->fetch();
        $total += $preco;
        $stmt->close();

        $stmt = $this->db->prepare('SELECT preco FROM placa_mae WHERE id = ?');
        $stmt->bind_param('i', $idPlacaMae);
        $stmt->execute();
        $stmt->bind_result($preco);
        $stmt->fetch();
        $total += $preco;
        $stmt->close();

        $stmt = $this->db->prepare('SELECT preco FROM memoria_ram WHERE id = ?');
        $stmt->bind_param('i', $idMemoriaRam);
        $stmt->execute();
        $stmt->bind_result($preco);
        $stmt->fetch();
        $total += $preco;
        $stmt->close();

        $stmt = $this->db->prepare('SELECT preco FROM placa_video WHERE id = ?');
        $stmt->bind_param('i', $idPlacaVideo);
        $stmt->execute();
        $stmt->bind_result($preco);
        $stmt->fetch();
        $total += $preco;
        $stmt->close();

        $stmt = $this->db->prepare('SELECT preco FROM fonte WHERE id = ?');
        $stmt->bind_param('i', $idFonte);
        $stmt->execute();
        $stmt->bind_result($preco);
        $stmt->fetch();
        $total += $preco;
        $stmt->close();

        return $total;
    }

    public function saveBuild($nomeBuild, $idProcessador, $idPlacaMae, $idMemoriaRam, $idPlacaVideo, $idFonte, $precoTotal)
    {
        $stmt = $this->db->prepare('INSERT INTO build_pc (nome_build, id_processador, id_placa_mae, id_memoria_ram, id_placa_video, id_fonte, preco_total) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('siiiiid', $nomeBuild, $idProcessador, $idPlacaMae, $idMemoriaRam, $idPlacaVideo, $idFonte, $precoTotal);
        $stmt->execute();
        $stmt->close();
    }

    public function getAllBuilds()
    {
        $stmt = $this->db->query('SELECT * FROM build_pc');
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
}

?>
