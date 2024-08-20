<?php
class CompatibilidadePlacaVideo {
    private $mysqli;
    private $placas_video_compativeis = [];
    private $processadores = [];

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
        $this->buscarProcessadores();
    }

    private function buscarProcessadores() {
        $queryProcessadores = "SELECT * FROM processadores";
        $result = $this->mysqli->query($queryProcessadores);

        if ($result) {
            $this->processadores = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "Erro ao buscar processadores: " . $this->mysqli->error;
        }
    }

    public function verificarCompatibilidade($processador_id) {
        $query = "
            SELECT pv.id, pv.nome AS placa_video
            FROM compatibilidade_video cv
            JOIN placas_video pv ON cv.placa_video_id = pv.id
            WHERE cv.processador_id = ?
        ";
    
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("i", $processador_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            $this->placas_video_compativeis = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "Erro ao verificar compatibilidade: " . $this->mysqli->error;
        }

        $stmt->close();
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
                    <option value="<?= htmlspecialchars($processador['id']) ?>"><?= htmlspecialchars($processador['nome']) ?></option>
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
                echo '<tr><td><a href="PagDesc_compatibilidade.php?id=' . htmlspecialchars($placa['id']) . '">' . htmlspecialchars($placa['placa_video']) . '</a></td></tr>';
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
