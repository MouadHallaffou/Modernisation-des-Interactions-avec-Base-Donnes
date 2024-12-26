<?php
require_once 'Database.php';

class Player {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function insertPlayer($name, $photo, $position, $rating, $pace, $shooting, $passing, $dribbling, $defending, $physical) {
        try {
            if (!in_array($position, ['GK', 'CBR', 'CBL', 'LB', 'RB', 'CML', 'CM', 'CMR', 'LW', 'RW', 'ST'])) {
                throw new Exception("Invalid position value.");
            }

            if ($rating < 10 || $rating > 99 || $pace < 10 || $pace > 99 || $shooting < 10 || $shooting > 99 ||
                $passing < 10 || $passing > 99 || $dribbling < 10 || $dribbling > 99 ||
                $defending < 10 || $defending > 99 || $physical < 10 || $physical > 99) {
                throw new Exception("Values must be between 10 and 99.");
            }

            $query = "INSERT INTO Players (name_player, photo, position, rating, pace, shooting, passing, dribbling, defending, physical)
                      VALUES (:name_player, :photo, :position, :rating, :pace, :shooting, :passing, :dribbling, :defending, :physical)";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':name_player', $name);
            $stmt->bindParam(':photo', $photo);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':pace', $pace);
            $stmt->bindParam(':shooting', $shooting);
            $stmt->bindParam(':passing', $passing);
            $stmt->bindParam(':dribbling', $dribbling);
            $stmt->bindParam(':defending', $defending);
            $stmt->bindParam(':physical', $physical);

            $stmt->execute();
            // echo "Player inserted successfully.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getPlayers() {
        $sql = "SELECT * FROM Players";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
