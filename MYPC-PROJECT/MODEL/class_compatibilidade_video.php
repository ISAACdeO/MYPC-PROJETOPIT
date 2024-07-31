<?php
class CompatibilidadePlacaVideo {
    private $pdo;
    private $placas_video_compativeis = [];
    private $processadores = [];

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->buscarProcessadores();
    }

    private function buscarProcessadores() {
        $queryProcessadores = "SELECT * FROM processadores";
        $stmtProcessadores = $this->pdo->prepare($queryProcessadores);
        $stmtProcessadores->execute();
        $this->processadores = $stmtProcessadores->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificarCompatibilidade($processador_id) {
        $query = "
            SELECT pv.id, pv.nome AS placa_video
            FROM compatibilidade_video cv
            JOIN placas_video pv ON cv.placa_video_id = pv.id
            WHERE cv.processador_id = :processador_id;
        ";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':processador_id', $processador_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->placas_video_compativeis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getPlacasVideoCompatíveis() {
        return $this->placas_video_compativeis;
    }

    public function getProcessadores() {
        return $this->processadores;
    }

    public function renderizarFormulario() {
        ?>
        <form id="compatibilidade-video-form" action="" method="POST">
            <label for="processador">Escolha um Processador:</label>
            <select name="processador_id" id="processador">
                <?php foreach ($this->processadores as $processador): ?>
                    <option value="<?= $processador['id'] ?>"><?= $processador['nome'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Ver Placas de Vídeo Compatíveis</button>
        </form>
        <?php
    }

    public function renderizarTabelaCompatibilidade() {
        if (!empty($this->placas_video_compativeis)) {
            echo '<h2>Placas de Vídeo Compatíveis:</h2>';
            echo '<table border="1"><tr><th>Placa de Vídeo</th></tr>';
            foreach ($this->placas_video_compativeis as $placa) {
                echo '<tr><td><a href="PagDesc_compatibilidade.php?id=' . $placa['id'] . '">' . $placa['placa_video'] . '</a></td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Nenhuma placa de vídeo compatível encontrada.</p>';
        }
    }
    
    
    

    public function renderizarMensagem($mensagem) {
        echo '<div class="mensagem">' . htmlspecialchars($mensagem) . '</div>';
    }
}
?>
