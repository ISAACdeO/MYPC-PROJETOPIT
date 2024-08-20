<?php
class CompatibilidadeComponentes {
    private $mysqli;
    private $placas_compativeis = [];
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
            SELECT pm.nome AS placa_mae
            FROM compatibilidade c
            JOIN placas_mae pm ON c.placa_mae_id = pm.id
            WHERE c.processador_id = ?
        ";

        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("i", $processador_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            $this->placas_compativeis = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "Erro ao verificar compatibilidade: " . $this->mysqli->error;
        }

        $stmt->close();
    }

    public function getPlacasCompatíveis() {
        return $this->placas_compativeis;
    }

    public function getProcessadores() {
        return $this->processadores;
    }

    public function renderizarFormulario() {
        ?>
        <form id="compatibilidade-form" action="" method="POST">
            <label for="processador">Escolha um Processador:</label>
            <select name="processador_id" id="processador">
                <?php foreach ($this->processadores as $processador): ?>
                    <option value="<?= $processador['id'] ?>"><?= $processador['nome'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Ver Placas-Mãe Compatíveis</button>
        </form>
        <?php
    }

    public function renderizarTabelaCompatibilidade() {
        if (!empty($this->placas_compativeis)) {
            echo '<h2>Placas-Mãe Compatíveis:</h2>';
            echo '<table border="1"><tr><th>Placa-Mãe</th></tr>';
            foreach ($this->placas_compativeis as $placa) {
                echo '<tr><td>' . htmlspecialchars($placa['placa_mae']) . '</td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Nenhuma placa-mãe compatível encontrada.</p>';
        }
    }

    public function renderizarMensagem($mensagem) {
        echo '<div class="mensagem">' . htmlspecialchars($mensagem) . '</div>';
    }
}
?>
