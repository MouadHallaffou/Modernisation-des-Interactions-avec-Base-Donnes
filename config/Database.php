<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'fut_db';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function connect() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}
?>
