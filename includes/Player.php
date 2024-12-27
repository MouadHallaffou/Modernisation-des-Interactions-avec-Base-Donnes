<?php
require_once __DIR__.'/../config/Database.php';
class Player {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // methode insert
    public function create($data) {
        $sql = "INSERT INTO Players (name_player, photo, position, rating, pace, shooting, passing, dribbling, defending, physical)
                VALUES (:name_player, :photo, :position, :rating, :pace, :shooting, :passing, :dribbling, :defending, :physical)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    // methode Afficher (afficher par id ou bien tout)
    public function read($player_id = null) {
        if ($player_id) {
            $sql = "SELECT * FROM Players WHERE player_id = :player_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['player_id' => $player_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $sql = "SELECT * FROM Players";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    // methode Modifier
    public function update($player_id, $data) {
        $sql = "UPDATE Players 
                SET name_player = :name_player, photo = :photo, position = :position, rating = :rating, pace = :pace,
                    shooting = :shooting, passing = :passing, dribbling = :dribbling, defending = :defending, physical = :physical
                WHERE player_id = :player_id";
        $stmt = $this->pdo->prepare($sql);
        $data['player_id'] = $player_id;
        return $stmt->execute($data);
    }

    // methode supprimer
    public function delete($player_id) {
        $sql = "DELETE FROM Players WHERE player_id = :player_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['player_id' => $player_id]);
    }
}
?>
