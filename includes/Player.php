<?php
require_once __DIR__ . '/../config/Database.php';

class Player {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Fonction pour inserer des donnes.
     */
    public function insert($table, $data) {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(array_values($data));
    }

    /**
     * Fonction pour selectionner des donner.
     */
    public function select($table, $columns = '*', $where = null, $params = []) {
        $sql = "SELECT $columns FROM $table";

        if ($where) {
            $sql .= " WHERE $where";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fonction pour mettre a jour des donner.
     */
    public function update($table, $data, $where, $params) {
        $set = implode(',', array_map(fn($col) => "$col = ?", array_keys($data)));

        $sql = "UPDATE $table SET $set WHERE $where";
        $stmt = $this->pdo->prepare($sql);

        $allParams = array_merge(array_values($data), $params);
        return $stmt->execute($allParams);
    }

    /**
     * Fonction pour supprimer des donneer.
     */
    public function delete($table, $where, $params) {
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($params);
    }

    /**
     * inserer un joueur.
     */
    public function createPlayer($data) {
        return $this->insert('Players', $data);
    }

    /**
     * recupere un ou plusieur joueur.
     */
    public function getPlayer($player_id = null) {
        $where = $player_id ? 'player_id = ?' : null;
        $params = $player_id ? [$player_id] : [];
        return $this->select('Players', '*', $where, $params);
    }

    /**
     * mettre a jour un player.
     */
    public function updatePlayer($player_id, $data) {
        $where = 'player_id = ?';
        $params = [$player_id];
        return $this->update('Players', $data, $where, $params);
    }

    /**
     * supprimer un players.
     */
    public function deletePlayer($player_id) {
        $where = 'player_id = ?';
        $params = [$player_id];
        return $this->delete('Players', $where, $params);
    }
}

?>
