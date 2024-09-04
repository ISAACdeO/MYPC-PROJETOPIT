<?php

namespace App\Controllers;

use App\Models\BuildModel;

class BuildController
{
    private $model;

    public function __construct()
    {
        $this->model = new BuildModel();
    }

    public function showOrcamentoForm()
    {
        include '../view/OrçamentoBuild.php';
    }

    public function processOrcamento()
    {
        $budget = $_GET['preco'];

        // Busca os componentes dentro do orçamento
        $components = $this->model->getComponentsWithinBudget($budget);

        // Passa os componentes para a página de montagem
        include '../view/MontagemFinal.php';
    }

    public function saveBuild()
    {
        // Coleta dados do formulário
        $nomeBuild = $_POST['nome_build'];
        $idProcessador = $_POST['id_processador'];
        $idPlacaMae = $_POST['id_placa_mae'];
        $idMemoriaRam = $_POST['id_memoria_ram'];
        $idPlacaVideo = $_POST['id_placa_video'];
        $idFonte = $_POST['id_fonte'];

        $precoTotal = $this->model->calculateTotalPrice($idProcessador, $idPlacaMae, $idMemoriaRam, $idPlacaVideo, $idFonte);

        $this->model->saveBuild($nomeBuild, $idProcessador, $idPlacaMae, $idMemoriaRam, $idPlacaVideo, $idFonte, $precoTotal);

        header('Location: index_build.php?action=viewBuilds');
        exit();
    }


    public function getAllBuilds()
{
    $stmt = $this->db->query('SELECT * FROM build_pc');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function viewBuilds()
{
    $builds = $this->model->getAllBuilds();

    // Verifica se $builds contém dados
    if ($builds === false) {
        echo "Erro ao recuperar builds.";
        return;
    }

    include '../view/view_builds.php';
}

    
}
